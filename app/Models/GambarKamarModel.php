<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarKamarModel extends Model
{
    protected $table = 'gambar_kamar';
    protected $primaryKey = 'id_gambar_kamar';
    protected $allowedFields = [
        'id_kamar',
        'file_gambar_kamar'
    ];

    public function getGambarKamar($id_kamar)
    {
        return $this->db->table('gambar_kamar')
            ->where('gambar_kamar.id_kamar', $id_kamar)
            ->get()->getResultArray();
    }

    public function getGambarKamarbyNama($nama_kamar)
    {
        return $this->db->table('gambar_kamar')
            ->join('data_kamar', 'data_kamar.id_kamar = gambar_kamar.id_kamar')
            ->where('data_kamar.nama_kamar', $nama_kamar)
            ->get()->getResultArray();
    }
}
