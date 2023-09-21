<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'id_pemesanan',
        'id_penyewa',
        'id_kos',
        'id_admin',
        'tanggal_input',
        'tanggal_pemesanan',
        'total_pemesanan',
        'status_pemesanan',
        'status_penyewa'
    ];

    public function getPemesanan()
    {
        return $this->db->table('pemesanan')
            ->join('data_kos', 'data_kos.id_kos=pemesanan.id_pemesanan')
            ->get()->getResultArray();
    }

    public function getNextID()
    {
        $lastID = $this->db->table($this->table)
            ->select($this->primaryKey)
            ->orderBy($this->primaryKey, 'DESC')
            ->limit(1)
            ->get()->getRowArray();
        if ($lastID == null) {
            // dd($this->primaryKey);
            return 1;
        } else {
            // dd($lastID);
            return ++$lastID[$this->primaryKey];
        }
    }

    public function setStatusPemesanan($id_pemesanan, $status_pemesanan)
    {
        $this->db->table($this->table)
            ->set('status_pemesanan', $status_pemesanan)
            ->where($this->primaryKey, $id_pemesanan)
            ->update();
    }

    public function setStatusPenyewa($id_pemesanan, $status_penyewa)
    {
        $this->db->table($this->table)
            ->set('status_penyewa', $status_penyewa)
            ->where($this->primaryKey, $id_pemesanan)
            ->update();
    }

    public function getKonfirmasiPemesanan($id_pemesanan)
    {
        return $this->db->table('pemesanan')
            ->join('penyewa', 'penyewa.id_penyewa=pemesanan.id_penyewa')
            ->join('pembayaran', 'pembayaran.id_pemesanan=pemesanan.id_pemesanan')
            ->join('detail_kamar_penyewa', 'detail_kamar_penyewa.id_pemesanan=pemesanan.id_pemesanan')
            ->join('data_kamar', 'data_kamar.id_kamar=detail_kamar_penyewa.id_kamar')
            ->where('pemesanan.id_pemesanan', $id_pemesanan)
            ->groupBy('pemesanan.id_pemesanan')
            ->get()->getResultArray();
    }

    public function getStatusPenyewa()
    {
        return $this->db->table('pemesanan')
            ->select('STATUS_PENYEWA')
            ->where('id_penyewa', session()->get('id_penyewa'))
            ->get()->getResultArray();
    }
}
