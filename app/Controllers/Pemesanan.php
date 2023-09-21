<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\DataKamarModel;
use App\Models\PenyewaModel;

class Pemesanan extends BaseController
{
    protected $pemesananmodel;
    protected $datakamarmodel;
    protected $penyewamodel;
    public function __construct()
    {
        $this->pemesananmodel = new PemesananModel();
        $this->datakamarmodel = new DataKamarModel();
        $this->penyewamodel = new PenyewaModel();
    }

    public function lihat()
    {
        $session = session();
        $id_penyewa = $session->get('id_penyewa');
        $id_kamar = $this->request->getVar('id_kamar');
        $data = [
            'pemesanan' => $this->datakamarmodel->getDataKamarbyID($id_kamar),
            'penyewa' => $this->penyewamodel->where('id_penyewa', $id_penyewa)->first()
        ];
        return view('penyewa/pemesanan', $data);
    }
}
