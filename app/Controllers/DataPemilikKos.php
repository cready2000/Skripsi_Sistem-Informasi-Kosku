<?php

namespace App\Controllers;

use App\Models\PemilikKosModel;

class DataPemilikKos extends BaseController
{
    protected $pemilikkosmodel;
    public function __construct()
    {
        $this->pemilikkosmodel = new PemilikKosModel();
    }

    public function lihat()
    {
        $data = [
            'title' => 'Data Pemilik Kos',
            'pemilikkos' => $this->pemilikkosmodel->getPemilikKos(),
            'pemilikkos' => $this->pemilikkosmodel->paginate(10, 'lihat_pemilik_kos'),
            'pager' => $this->pemilikkosmodel->pager,
            'nomor' => nomor($this->request->getVar('page_lihat_pemilik_kos'), 10)
        ];
        return view('admin/data_pemilik_kos/lihat_data_pemilik_kos', $data);
    }

    public function detail($id_pemilik_kos)
    {
        $data['pemilikkos'] = $this->pemilikkosmodel->getPemilikKos($id_pemilik_kos);
        return view('admin/data_pemilik_kos/detail_data_pemilik_kos', $data);
    }
}
