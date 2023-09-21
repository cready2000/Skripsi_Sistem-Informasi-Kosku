<?php

namespace App\Models;

use CodeIgniter\Model;

class RadiusModel extends Model
{
    protected $table = 'radius';
    protected $primaryKey = 'id_radius';
    protected $allowedFields = [
        'jarak_radius'
    ];

    public function getRadius($jarak_radius = false)
    {
        if ($jarak_radius == false) {
            return $this->db->table('radius')
                ->join('data_kos', 'data_kos.id_radius=radius.id_radius')
                ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
                ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
                ->groupBy('data_kos.id_kos')
                ->orderBy('gambar_kos.id_gambar_kos')
                ->get()->getResultArray();
        }
        return $this->db->table('radius')
            ->join('data_kos', 'data_kos.id_radius=radius.id_radius')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->where('radius.jarak_radius', $jarak_radius)
            ->groupBy('data_kos.id_kos')
            ->orderBy('gambar_kos.id_gambar_kos')
            ->get()->getResultArray();
    }

    public function getRadius100()
    {
        return $this->db->table('radius')
            ->join('data_kos', 'data_kos.id_radius=radius.id_radius')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->where('radius.jarak_radius', 100)
            ->groupBy('data_kos.id_kos')
            ->orderBy('gambar_kos.id_gambar_kos')
            ->get()->getResultArray();
    }

    public function getRadius500()
    {
        return $this->db->table('radius')
            ->join('data_kos', 'data_kos.id_radius=radius.id_radius')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->where('radius.jarak_radius', 500)
            ->groupBy('data_kos.id_kos')
            ->orderBy('gambar_kos.id_gambar_kos')
            ->get()->getResultArray();
    }
}
