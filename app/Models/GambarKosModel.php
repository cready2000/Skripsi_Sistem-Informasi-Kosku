<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarKosModel extends Model
{
    protected $table = 'gambar_kos';
    protected $primaryKey = 'id_gambar_kos';
    protected $allowedFields = [
        'id_kos',
        'file_gambar_kos'
    ];

    public function getGambarKos($id_kos)
    {
        return $this->db->table('gambar_kos')
            ->where('gambar_kos.id_kos', $id_kos)
            ->get()->getResultArray();
    }

    public function getGambarKosbyNama($nama_kos)
    {
        return $this->db->table('gambar_kos')
            ->join('data_kos', 'data_kos.id_kos = gambar_kos.id_kos')
            ->where('data_kos.nama_kos', $nama_kos)
            ->get()->getResultArray();
    }
}
