<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaModel extends Model
{
    protected $table = 'penyewa';
    protected $primaryKey = 'id_penyewa';
    protected $allowedFields = [
        'nik_penyewa',
        'nama_penyewa',
        'alamat_penyewa',
        'no_telepon_penyewa',
        'jenis_kelamin_penyewa',
        'ktp_penyewa',
        'email_penyewa',
        'password_penyewa'
    ];

    public function getPenyewa($id_penyewa)
    {
        return $this->db->table('penyewa')
            ->where('penyewa.id_penyewa', $id_penyewa)
            ->get()->getResultArray();
    }

    public function getTotalPenyewa()
    {
        $condition = ['penyewa.id_penyewa !=' => null];
        return $this->db->table('penyewa')
            ->where($condition)
            ->countAllResults();
    }
}
