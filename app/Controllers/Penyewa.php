<?php

namespace App\Controllers;

use App\Models\DataKosModel;
use App\Models\RadiusModel;

class Penyewa extends BaseController
{
    protected $radiusmodel;
    protected $datakosModel;
    public function __construct()
    {
        $this->radiusmodel = new RadiusModel();
        $this->datakosModel = new DataKosModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'radiuswilayah' => $this->radiusmodel->getRadius(),
            'rekomendasi' => $this->datakosModel->getRekomendasiKos()
        ];
        return view('penyewa/beranda', $data);
    }

    public function sudah_login()
    {
        $session = session();
        $name = $session->get('nama_penyewa');
        $id_penyewa = $session->get('id_penyewa');
        $model = new RadiusModel();

        $data = [
            'title' => 'Beranda',
            'name' => $name,
            'radiuswilayah' => $model->getRadius(),
            'penyewa' => $id_penyewa,
            'rekomendasi' => $this->datakosModel->getRekomendasiKos()
        ];
        // dd($data);
        return view('penyewa/beranda_sudah_login', $data);
    }

    public function hasil_pencarian_belum_login()
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
            'datakos' => $this->datakosModel->pencarian($kunci),
            'jumlah' => $jumlah
        ];
        return view('penyewa/hasil_pencarian/belum_login', $data);
    }

    public function hasil_pencarian_sudah_login()
    {
        $kunci = $this->request->getVar('cari');
        if ($kunci) {
            $datakos = $this->datakosModel->pencarian($kunci);
            $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan " . sizeof($datakos) . " data";
        }
        $data = [
            'title' => 'Hasil Pencarian',
            'datakos' => $this->datakosModel->pencarian($kunci),
            'jumlah' => $jumlah
        ];
        return view('penyewa/hasil_pencarian/sudah_login', $data);
    }
}
