<?php

namespace App\Controllers;

use App\Models\WilayahModel;

class Wilayah extends BaseController
{
    protected $wilayahmodel;
    public function __construct()
    {
        $this->wilayahmodel = new WilayahModel();
    }

    public function nama_wilayah($nama)
    {
        $nama_wilayah = urldecode($nama);
        $data = [
            'title' => 'Wilayah',
            'wilayah' => $this->wilayahmodel->getWilayah($nama_wilayah),
            'wilayah_gunung_anyar' => $this->wilayahmodel->getWilayahGunungAnyar(),
            'wilayah_medokan_ayu' => $this->wilayahmodel->getWilayahMedokanAyu()
        ];
        return view('penyewa/wilayah/nama_wilayah', $data);
    }

    public function nama_wilayah2($wilayah)
    {
        $nama_wilayah = urldecode($wilayah);
        $data = [
            'title' => 'Wilayah',
            'wilayah' => $this->wilayahmodel->getWilayah($nama_wilayah),
            'wilayah_gunung_anyar' => $this->wilayahmodel->getWilayahGunungAnyar(),
            'wilayah_medokan_ayu' => $this->wilayahmodel->getWilayahMedokanAyu()
        ];
        return view('penyewa/wilayah/nama_wilayah2', $data);
    }

    public function navbar()
    {
        $data = [
            'title' => 'Wilayah',
            'wilayah' => $this->wilayahmodel->getWilayah(),
            'wilayah_gunung_anyar' => $this->wilayahmodel->getWilayahGunungAnyar(),
            'wilayah_medokan_ayu' => $this->wilayahmodel->getWilayahMedokanAyu()
        ];
        return view('penyewa/wilayah/navbar_wilayah', $data);
    }

    public function navbar2()
    {
        $data = [
            'title' => 'Wilayah',
            'wilayah' => $this->wilayahmodel->getWilayah(),
            'wilayah_gunung_anyar' => $this->wilayahmodel->getWilayahGunungAnyar(),
            'wilayah_medokan_ayu' => $this->wilayahmodel->getWilayahMedokanAyu()
        ];
        return view('penyewa/wilayah/navbar_wilayah2', $data);
    }
}
