<?php

namespace App\Controllers;

class PemilikKos extends BaseController
{
    public function index()
    {
        $session = session();
        $name = $session->get('nama_pemilik_kos');
        $data = [
            'title' => 'Beranda',
            'name' => $name,
        ];
        return view('pemilik_kos/beranda', $data);
    }

    public function hasil_pencarian()
    {
        $kunci = $this->request->getVar('cari');
        if ($kunci) {
            $datakos = $this->datakosModel->pencarian($kunci);
            $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan " . sizeof($datakos) . " Data";
        } else {
            $datakos = $this->datakosModel;
            $jumlah = "";
        }
        $data = [
            'title' => 'Hasil Pencarian',
            'datakos' => $this->datakosModel->findAll(),
            'jumlah' => $jumlah
        ];
        return view('penyewa/hasil_pencarian/belum_login', $data);
    }
}
