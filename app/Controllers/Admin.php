<?php

namespace App\Controllers;

use App\Models\PemilikKosModel;
use App\Models\PenyewaModel;
use App\Models\DataKosModel;
use App\Models\DataKamarModel;

class Admin extends BaseController
{

    protected $pemilikkosmodel;
    protected $penyewamodel;
    protected $datakosmodel;
    protected $datakamarmodel;
    public function __construct()
    {
        $this->pemilikkosmodel = new PemilikKosModel();
        $this->penyewamodel = new PenyewaModel();
        $this->datakosmodel = new DataKosModel();
        $this->datakamarmodel = new DataKamarModel();
    }

    public function index()
    {
        $session = session();
        $username = $session->get('username_admin');
        $data = [
            'title' => 'Beranda',
            'username' => $username,
            'totalpemilikkos' => $this->pemilikkosmodel->getTotalPemilikKos(),
            'totalpenyewa' => $this->penyewamodel->getTotalPenyewa(),
            'totalkos' => $this->datakosmodel->getTotalKos(),
            'totalkamar' => $this->datakamarmodel->getTotalKamar(),
        ];
        return view('admin/beranda', $data);
    }
}
