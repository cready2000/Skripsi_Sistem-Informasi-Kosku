<?php

namespace App\Controllers;

use App\Models\RadiusModel;
use App\Models\GambarKosModel;

class Radius extends BaseController
{
    protected $radiusmodel;
    protected $gambarkosmodel;
    public function __construct()
    {
        $this->radiusmodel = new RadiusModel();
        $this->gambarkosmodel = new GambarKosModel();
    }

    public function jarak_radius($jarak)
    {
        $jarak_radius = urldecode($jarak);
        $data = [
            'title' => 'Radius',
            'radius' => $this->radiusmodel->getRadius($jarak_radius),
            'radius100' => $this->radiusmodel->getRadius100(),
            'radius500' => $this->radiusmodel->getRadius500()
        ];
        return view('penyewa/radius/jarak_radius', $data);
    }

    public function jarak_radius2($jarak)
    {
        $jarak_radius = urldecode($jarak);
        $data = [
            'title' => 'Radius',
            'radius' => $this->radiusmodel->getRadius($jarak_radius),
            'radius100' => $this->radiusmodel->getRadius100(),
            'radius500' => $this->radiusmodel->getRadius500()
        ];
        return view('penyewa/radius/jarak_radius2', $data);
    }

    public function navbar()
    {
        $data = [
            'title' => 'Radius',
            'radius' => $this->radiusmodel->getRadius(),
            'radius100' => $this->radiusmodel->getRadius100(),
            'radius500' => $this->radiusmodel->getRadius500()
        ];
        return view('penyewa/radius/navbar_radius', $data);
    }

    public function navbar2()
    {
        $data = [
            'title' => 'Radius',
            'radius' => $this->radiusmodel->getRadius(),
            'radius100' => $this->radiusmodel->getRadius100(),
            'radius500' => $this->radiusmodel->getRadius500()
        ];
        return view('penyewa/radius/navbar_radius2', $data);
    }
}
