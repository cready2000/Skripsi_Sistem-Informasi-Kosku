<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilikKosModel extends Model
{
    protected $table = 'pemilik_kos';
    protected $primaryKey = 'id_pemilik_kos';
    protected $allowedFields = [
        'id_saldo',
        'nik_pemilik_kos',
        'nama_pemilik_kos',
        'no_telepon_pemilik_kos',
        'email_pemilik_kos',
        'password_pemilik_kos'
    ];

    public function getPemilikKos($id_pemilik_kos = false)
    {
        if ($id_pemilik_kos == false) {
            return $this->db->table('pemilik_kos')
                ->join('data_kos', 'data_kos.id_pemilik_kos=pemilik_kos.id_pemilik_kos')
                ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
                ->join('radius', 'radius.id_radius=data_kos.id_radius')
                ->get()->getResultArray();
        }
        return $this->db->table('pemilik_kos')
            ->join('data_kos', 'data_kos.id_pemilik_kos=pemilik_kos.id_pemilik_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->where('pemilik_kos.id_pemilik_kos', $id_pemilik_kos)
            ->groupBy('pemilik_kos.id_pemilik_kos')
            ->get()->getResultArray();
    }

    public function getTotalPemilikKos()
    {
        $condition = ['pemilik_kos.id_pemilik_kos !=' => null];
        return $this->db->table('pemilik_kos')
            ->where($condition)
            ->countAllResults();
    }
}
