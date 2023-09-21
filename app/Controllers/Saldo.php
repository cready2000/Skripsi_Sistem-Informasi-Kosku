<?php

namespace App\Controllers;

use App\Models\OtpModel;
use App\Models\PembayaranModel;
use App\Models\PengajuanSaldoModel;
use App\Models\SaldoModel;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareParameterTypeException;

class Saldo extends BaseController
{

    protected $saldoModel;
    protected $pembayaranModel;
    protected $pengajuanModel;

    public function __construct()
    {
        $this->saldoModel = new SaldoModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->pengajuanModel = new PengajuanSaldoModel();
    }
    public function lihat()
    {
        $id_pemilik_kos = session()->get('id_pemilik_kos');
        $saldo = $this->saldoModel->getSaldoByIdPemilik($id_pemilik_kos);
        $dataPembayaran = $this->pembayaranModel->getPembayaranByIdSaldo($saldo->ID_SALDO);
        $nominalTransaksi = 0;
        foreach ($dataPembayaran as $pembayaran) {
            $nominalTransaksi += floatval($pembayaran['JUMLAH_PEMBAYARAN']);
        }

        $data = [
            'title' => 'Saldo',
            'saldo' => $saldo,
            'nominalTransaksi' => $nominalTransaksi,
            'dataPembayaran' => $dataPembayaran,
            'jumlahsaldo' => $this->saldoModel->getJumlahSaldoByIdPemilik($id_pemilik_kos),
            'saldo2' => $this->pembayaranModel->paginate(10, 'lihat_saldo'),
            'pager' => $this->pembayaranModel->pager,
            'nomor' => nomor($this->request->getVar('page_lihat_saldo'), 10),
        ];
        // dd($data);
        return view('pemilik_kos/saldo/lihat_saldo', $data);
    }

    public function riwayat()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data = [
            'title' => 'Riwayat Saldo',
            'riwayat' => $this->pengajuanModel->getPengajuan($id_pemilik_kos),
            'riwayat2' => $this->pengajuanModel->paginate(10, 'riwayat_penarikan_saldo'),
            'pager' => $this->pengajuanModel->pager,
            'nomor' => nomor($this->request->getVar('page_riwayat_penarikan_saldo'), 10),
        ];
        return view('pemilik_kos/saldo/riwayat_saldo', $data);
    }

    public function pengajuan()
    {
        $data = [
            'title' => 'Pengajuan Penarikan Saldo',
        ];
        return view('pemilik_kos/saldo/pengajuan_saldo', $data);
    }

    public function savePengajuan()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'norekening' => 'required|min_length[10]|max_length[16]',
            'namarekening' => 'required|min_length[3]|max_length[100]',
            'bank' => 'required|min_length[3]|max_length[50]',
            'jumlah' => 'required|min_length[3]|max_length[50]',
        ];
        $otp_validation = $this->request->getVar('otp_validation');
        $id_saldo = $this->saldoModel->getSaldoByIdPemilik(session()->get('id_pemilik_kos'))->ID_SALDO;
        $jumlah = $this->request->getVar('jumlah');
        if ($this->validate($rules) && $otp_validation == 'valid' && $this->isPenarikanEligible($id_saldo, $jumlah)) {
            $model = new PengajuanSaldoModel();
            // $id_otp = $this->request->getVar('id_otp');
            $data = [
                'id_saldo' => $id_saldo,
                // 'id_otp' => $id_otp,
                'id_pemilik_kos' => session()->get('id_pemilik_kos'),
                'no_rekening_pemilik_kos' => $this->request->getVar('norekening'),
                'nama_rekening_pemilik_kos' => $this->request->getVar('namarekening'),
                'bank_pemilik_kos' => $this->request->getVar('bank'),
                'jumlah_penarikan' => $this->request->getVar('jumlah'),
                'tanggal_penarikan' => date('Y-m-d'),
                'status_penarikan_saldo' => 'Dalam Proses'
            ];
            $model->save($data);
            // $this->saldoModel->decrementSaldoByID($id_saldo, floatval($this->request->getVar('jumlah')));
            session()->setFlashdata('pengajuan', 'Pengajuan penarikan saldo berhasil');
            return redirect()->to('/saldo');
        } else {
            session()->setFlashdata('limit', 'Pengajuan penarikan saldo gagal');
        }
        if ($otp_validation != 'valid') {
            session()->setFlashdata('otp', 'Kode OTP tidak valid, silahkan verifikasi ulang');
        }
        echo view('/pemilik_kos/saldo/pengajuan_saldo');
    }

    private function isPenarikanEligible($id_saldo, $jumlahPenarikan)
    {
        $saldo = $this->saldoModel->getSaldoByIdPemilik($id_saldo);
        if ((floatval($saldo->JUMLAH_SALDO) - floatval($jumlahPenarikan))  < 0) {
            session()->setFlashdata('error', 'Saldo Anda Tidak Cukup !');
            return false;
        } else {
            return true;
        }
    }
}
