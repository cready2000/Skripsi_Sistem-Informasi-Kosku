<?php

namespace App\Controllers;

use App\Models\DataKosModel;
use App\Models\PembayaranModel;

class Riwayat extends BaseController
{
    protected $datakosmodel;
    protected $modelPembayaran;

    public function __construct()
    {
        $this->datakosmodel = new DataKosModel();
        $this->modelPembayaran = new PembayaranModel();
    }

    public function lihat()
    {
        $session = session();
        $id_penyewa = $session->get('id_penyewa');
        $data = [
            'title' => 'Riwayat',
            'datakos' => $this->datakosmodel->getDataKosbyIDPenyewa($id_penyewa),
        ];
        return view('penyewa/riwayat/lihat_riwayat', $data);
    }

    public function riwayat_pembayaran()
    {
        $session = session();
        $id_penyewa = $session->get('id_penyewa');
        $data = [
            'title' => 'Riwayat Pembayaran',
            'datakos' => $this->modelPembayaran->getRiwayatPembayaran($id_penyewa)
        ];
        return view('penyewa/riwayat/riwayat_pembayaran', $data);
    }

    public function cetak_nota($id_pembayaran)
    {
        $data = [
            'title' => 'Cetak Nota',
            'datakos' => $this->modelPembayaran->getDataNota($id_pembayaran)
        ];
        return view('penyewa/riwayat/cetak_nota', $data);
    }
}
