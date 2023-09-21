<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PemesananModel;
use App\Models\DataKamarModel;
use App\Models\DetailKamarPenyewaModel;
use App\Models\SaldoModel;
use CodeIgniter\HTTP\Request;
use DateTime;
use CodeIgniter\I18n\Time;
use DateInterval;
use PhpParser\Node\Expr\Cast\Double;

class Pembayaran extends BaseController
{
    protected $pembayaranmodel;
    protected $pemesananmodel;
    protected $datakamarmodel;
    protected $detailkamarpenyewamodel;
    protected $saldoModel;
    public function __construct()
    {
        $this->pembayaranmodel = new PembayaranModel();
        $this->pemesananmodel = new PemesananModel();
        $this->datakamarmodel = new DataKamarModel();
        $this->detailkamarpenyewamodel = new DetailKamarPenyewaModel();
        $this->saldoModel = new SaldoModel();
    }

    public function lihat()
    {
        $data =
            [
                'title' => 'Pembayaran',
                'pembayaran' => $this->pembayaranmodel->getPembayaran(),
                'pembayaran2' => $this->pembayaranmodel->paginate(10, 'lihat_pembayaran'),
                'pager' => $this->pembayaranmodel->pager,
                'nomor' => nomor($this->request->getVar('page_lihat_pembayaran'), 10),
            ];
        // dd($data);
        return view('admin/pembayaran/lihat_pembayaran', $data);
    }

    public function pembayaran()
    {
        $id_kamar = $this->request->getVar('id_kamar');
        $id_pemesanan = $this->pemesananmodel->getNextID();
        $id_kos = $this->request->getVar('id_kos');
        $id_kamar = $this->request->getVar('id_kamar');
        $datainsert = [
            'id_pemesanan' => $id_pemesanan,
            'id_kos' => $id_kos,
            'id_kamar' => $id_kamar,
            'id_penyewa' => (int)session()->get('id_penyewa'),
            'tanggal_input' => date('Y-m-d'),
            'tanggal_pemesanan' => $this->request->getVar('tanggal_pemesanan'),
            'total_pemesanan' => $this->request->getVar('total_pemesanan'),
            'status_pemesanan' => 'Belum Membayar'
        ];
        $this->pemesananmodel->save($datainsert);
        $id_detail_kamar = $this->detailkamarpenyewamodel->getNextID();
        $datadetailkamar = [
            'id_detail' => $id_detail_kamar,
            'id_kamar' => $id_kamar,
            'id_penyewa' => (int)session()->get('id_penyewa'),
            'id_pemesanan' => $id_pemesanan
        ];
        $this->detailkamarpenyewamodel->save($datadetailkamar);
        $data = [
            'id_pemesanan' => $this->pemesananmodel->getInsertID(),
            'id_kamar' => $id_kamar,
            'pemesanan' => $this->datakamarmodel->getDataKamarbyID($id_kamar)
        ];
        return view('penyewa/pembayaran', $data);
    }

    public function simpan_pembayaran()
    {
        $rules = [
            'bukti' => 'uploaded[bukti]|max_size[bukti,10240]|is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]'
        ];
        $buktipembayaran = $this->request->getFile('bukti');
        $id_kamar = $this->request->getVar('id_kamar');
        $namafile = $buktipembayaran->getRandomName();
        if ($this->validate($rules)) {
            $model = new PembayaranModel();
            $data = [
                "id_penyewa" => session()->get('id_penyewa'),
                "id_pemesanan" => $this->request->getVar('id_pemesanan'),
                "no_rekening_penyewa" => $this->request->getVar('norekening'),
                "nama_rekening_penyewa" => $this->request->getVar('namarekening'),
                "bank_penyewa" => $this->request->getVar('bank'),
                "metode_pembayaran" => $this->request->getVar('metode'),
                "jumlah_pembayaran" => $this->request->getVar('jumlah'),
                "tanggal_pembayaran" => date("Y-m-d"),
                "bukti_pembayaran" => $namafile,
            ];
            $buktipembayaran->move('upload/bukti_pembayaran', $namafile);
            $this->datakamarmodel->decrementStokKamar($id_kamar);
            $model->save($data);
            session()->setFlashdata('pembayaran', 'Pembayaran berhasil');
            return redirect()->to(base_url('penyewa/riwayat'));
        } else {
            $data['validation'] = $this->validator;
            echo view('/penyewa/pembayaran', $data);
        }
    }

    public function detail($id_pembayaran)
    {
        $data['pembayaran'] = $this->pembayaranmodel->getPembayaran($id_pembayaran);
        [
            'title' => 'Detail Pembayaran',
        ];
        return view('admin/pembayaran/detail_pembayaran', $data);
    }

    public function konfirmasi($id_pemesanan)
    {
        $data = [
            'pembayaran' => $this->pemesananmodel->getKonfirmasiPemesanan($id_pemesanan),
            'datapemesanan' => $this->pemesananmodel->find($id_pemesanan),
            'status' => array('Belum Membayar', 'Sudah Membayar', 'Ditolak')
        ];
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'status' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $id_pemesanan = $this->request->getVar('id_pemesanan');
            $id_pembayaran = $this->request->getVar('id_pembayaran');
            $dataPembayaran = $this->pembayaranmodel->find($id_pembayaran);
            $id_kos = $this->request->getVar('id_kos');
            $id_saldo = $this->saldoModel->getIdSaldoByIdKos($id_kos);
            $id_admin = session()->get('id_admin');
            $this->pemesananmodel->update($id_pemesanan, [
                "status_pemesanan" => $this->request->getVar('status'),
                "id_admin" => $id_admin,
                "id_kos" => $id_kos
            ]);
            $this->pembayaranmodel->update($id_pembayaran, [
                "id_admin" => $id_admin,
                "id_saldo" => $this->saldoModel->getIdSaldoByIdKos($id_kos)
            ]);
            if ($this->request->getVar('status') == 'Sudah Membayar') {
                // set tanggal menempati di tabel detail kamar penyewa
                $id_detail_kamar_penyewa = $this->detailkamarpenyewamodel->getDetailKamarPenyewabyIDPemesanan($id_pemesanan)[0]['ID_DETAIL'];

                $tanggal_menempati = new Time($this->request->getVar("tanggal_menempati"));
                $tanggal_keluar = $tanggal_menempati->addMonths(1);

                $this->detailkamarpenyewamodel->update($id_detail_kamar_penyewa, [
                    "tanggal_menempati" => $tanggal_menempati->format('Y-m-d'),
                    "tanggal_keluar" => $tanggal_keluar->format('Y-m-d')
                ]);
                $this->pemesananmodel->update($id_pemesanan, [
                    "status_penyewa" => 'Bulan Pertama'
                ]);
                $this->saldoModel->updateSaldoById($id_saldo, floatval($dataPembayaran['JUMLAH_PEMBAYARAN']));
            } elseif ($this->request->getVar('status') == 'Ditolak') {
                // delete baris detail kamar penyewa
                $id_kamar = $this->detailkamarpenyewamodel->getDetailKamarPenyewabyIDPemesanan($id_pemesanan)[0]['ID_KAMAR'];
                $this->datakamarmodel->incrementStokKamar($id_kamar);
                $this->detailkamarpenyewamodel->deleteDetailKamarPenyewabyIDPemesanan($id_pemesanan);
            }

            session()->setFlashdata('konfirmasi', 'Pembayaran berhasil dikonfirmasi');
            return redirect('pembayaran');
        }

        return view('admin/pembayaran/konfirmasi_pembayaran', $data);
    }


    public function test()
    {
        dd($this->saldoModel->getIdSaldoByIdKos(1));
    }
}
