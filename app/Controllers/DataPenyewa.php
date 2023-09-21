<?php

namespace App\Controllers;

use App\Models\DataKamarModel;
use App\Models\DetailKamarPenyewaModel;
use App\Models\PembayaranModel;
use App\Models\PemesananModel;
use CodeIgniter\I18n\Time;

class DataPenyewa extends BaseController
{
    protected $detailkamarpenyewamodel;
    protected $pemesananModel;
    protected $pembayaranmodel;
    protected $datakamarmodel;

    public function __construct()
    {
        $this->detailkamarpenyewamodel = new DetailKamarPenyewaModel();
        $this->pemesananModel = new PemesananModel();
        $this->pembayaranmodel = new PembayaranModel();
        $this->datakamarmodel = new DataKamarModel();
    }

    public function lihat()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data =
            [
                'title' => 'Data Penyewa',
                'datapenyewa' => $this->detailkamarpenyewamodel->getDetailKamarPenyewaGroupByPenyewa($id_pemilik_kos),
                'datapenyewa2' => $this->detailkamarpenyewamodel->paginate(10, 'lihat_data_penyewa'),
                'pager' => $this->detailkamarpenyewamodel->pager,
                'nomor' => nomor($this->request->getVar('page_lihat_data_penyewa'), 10),
            ];
        // dd($data);
        return view('pemilik_kos/data_penyewa/lihat_data_penyewa', $data);
    }

    public function lanjutKos($id_detail)
    {
        $data =
            [
                'title' => 'Form Lanjut Kos',
                'datapenyewa' => $this->detailkamarpenyewamodel->getDetailKamarPenyewa($id_detail),
            ];
        // dd($data);
        return view('pemilik_kos/data_penyewa/form_lanjut_kos', $data);
    }

    public function simpanLanjutKos()
    {
        $prevDetail = $this->detailkamarpenyewamodel->getDetailKamarPenyewa($this->request->getVar('id_detail'));
        $nextDetailID = $this->detailkamarpenyewamodel->getNextID();
        $prev_tanggal_keluar = Time::parse($prevDetail['TANGGAL_KELUAR']);
        $next_tanggal_menempati = $prev_tanggal_keluar;
        $next_tanggal_keluar = $next_tanggal_menempati->addMonths(1);

        $dataDetail = [
            'id_detail' => $nextDetailID,
            'id_kamar' => $prevDetail['ID_KAMAR'],
            'id_penyewa' => $prevDetail['ID_PENYEWA'],
            'id_pemesanan' => $prevDetail['ID_PEMESANAN'],
            'tanggal_menempati' => $next_tanggal_menempati->format('Y-m-d'),
            'tanggal_keluar' => $next_tanggal_keluar->format('Y-m-d'),
        ];
        $this->detailkamarpenyewamodel->insert($dataDetail);

        $this->pemesananModel->setStatusPenyewa($prevDetail['ID_PEMESANAN'], 'Lanjut');
        // $this->pemesananModel->setStatusPemesanan($prevDetail['ID_PEMESANAN'], 'Sudah Membayar');

        $rules = [
            'bukti' => 'uploaded[bukti]|max_size[bukti,10240]|is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]',
        ];
        if ($this->validate($rules)) {
            $buktipembayaran = $this->request->getFile('bukti');
            $namafile = $buktipembayaran->getRandomName();
            $dataPembayaranBaru = [
                'id_penyewa' => $prevDetail['ID_PENYEWA'],
                'id_pemesanan' => $prevDetail['ID_PEMESANAN'],
                'metode_pembayaran' => $this->request->getVar('metode'),
                'tanggal_pembayaran' => $this->request->getVar('tanggal'),
                'no_rekening_penyewa' => $this->request->getVar('norekening'),
                'nama_rekening_penyewa' => $this->request->getVar('namarekening'),
                'bank_penyewa' => $this->request->getVar('bank'),
                'jumlah_pembayaran' => $this->request->getVar('jumlah'),
                'bukti_pembayaran' => $namafile,
            ];
            $this->pembayaranmodel->save($dataPembayaranBaru);
            $buktipembayaran->move('upload/bukti_pembayaran', $namafile);
            session()->setFlashdata('lanjut', 'Penyewa berhasil lanjut kos');
            return redirect()->to(base_url('data-penyewa'));
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Form Lanjut Kos';
            $data['datapenyewa'] = $prevDetail;
            echo view('/pemilik_kos/data_penyewa/form_lanjut_kos', $data);
        }
    }

    public function berhentiKos($id_pemesanan)
    {
        $this->pemesananModel->update(
            $id_pemesanan,
            [
                'status_penyewa' => 'Berhenti'
            ]
        );
        $id_kamar = $this->detailkamarpenyewamodel->getDetailKamarPenyewabyIDPemesanan2($id_pemesanan)[0]['ID_KAMAR'];
        $this->datakamarmodel->incrementStokKamar($id_kamar);
        //flash message
        session()->setFlashdata('berhenti', 'Status penyewa sudah berhenti kos');
        return redirect()->to(base_url('/data-penyewa'));
    }
}
