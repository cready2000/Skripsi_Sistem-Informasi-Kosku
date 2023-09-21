<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
    protected $table = 'wilayah';
    protected $primaryKey = 'id_wilayah';
    protected $allowedFields = [
        'nama_wilayah'
    ];

    public function getWilayah($nama_wilayah = false)
    {
        if ($nama_wilayah == false) {
            return $this->db->table('wilayah')
                ->join('data_kos', 'data_kos.id_wilayah=wilayah.id_wilayah')
                ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
                ->join('radius', 'radius.id_radius=data_kos.id_radius')
                ->groupBy('data_kos.id_kos')
                ->orderBy('gambar_kos.id_gambar_kos')
                ->get()->getResultArray();
        }
        return $this->db->table('wilayah')
            ->join('data_kos', 'data_kos.id_wilayah=wilayah.id_wilayah')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->where('wilayah.nama_wilayah', $nama_wilayah)
            ->groupBy('data_kos.id_kos')
            ->orderBy('gambar_kos.id_gambar_kos')
            ->get()->getResultArray();
    }

    public function getWilayahGunungAnyar()
    {
        return $this->db->table('wilayah')
            ->join('data_kos', 'data_kos.id_wilayah=wilayah.id_wilayah')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->where('wilayah.nama_wilayah', 'Gunung Anyar')
            ->groupBy('data_kos.id_kos')
            ->orderBy('gambar_kos.id_gambar_kos')
            ->get()->getResultArray();
    }

    public function getWilayahMedokanAyu()
    {
        return $this->db->table('wilayah')
            ->join('data_kos', 'data_kos.id_wilayah=wilayah.id_wilayah')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->where('wilayah.nama_wilayah', 'Medokan Ayu')
            ->groupBy('data_kos.id_kos')
            ->orderBy('gambar_kos.id_gambar_kos')
            ->get()->getResultArray();
    }
}
