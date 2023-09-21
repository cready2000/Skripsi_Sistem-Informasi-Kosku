<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class DetailKamarPenyewaModel extends Model
{
    protected $table = 'detail_kamar_penyewa';
    protected $primaryKey = 'id_detail';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'id_detail',
        'id_kamar',
        'id_penyewa',
        'id_pemesanan',
        'tanggal_menempati',
        'tanggal_keluar'
    ];

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

    public function setTanggalMenempati($id_detail, $tanggal_menempati)
    {
        $this->db->table($this->table)
            ->set('tanggal_menempati', $tanggal_menempati)
            ->where($this->primaryKey, $id_detail)
            ->update();
    }

    public function deleteDetailKamarPenyewa($id_detail)
    {
        $this->db->table($this->table)
            ->where($this->primaryKey, $id_detail)
            ->delete();
    }

    public function getDetailKamarPenyewabyIDPemesanan($id_pemesanan)
    {
        return $this->db->table($this->table)
            ->where('id_pemesanan', $id_pemesanan)
            ->where('tanggal_menempati', null)
            ->get()->getResultArray();
    }

    public function getDetailKamarPenyewabyIDPemesanan2($id_pemesanan)
    {
        return $this->db->table($this->table)
            ->where('id_pemesanan', $id_pemesanan)
            ->get()->getResultArray();
    }

    public function deleteDetailKamarPenyewabyIDPemesanan($id_pemesanan)
    {
        $this->db->table($this->table)
            ->where('id_pemesanan', $id_pemesanan)
            ->where('tanggal_menempati', null)
            ->delete();
    }

    public function getDetailKamarPenyewa($id_detail = false)
    {
        if ($id_detail == false) {
            return $this->db->table('detail_kamar_penyewa')
                ->join('penyewa', 'penyewa.id_penyewa=detail_kamar_penyewa.id_penyewa')
                ->join('data_kamar', 'data_kamar.id_kamar=detail_kamar_penyewa.id_kamar')
                ->join('pemesanan', 'pemesanan.id_pemesanan=detail_kamar_penyewa.id_pemesanan')
                ->get()->getRowArray();
        }
        return $this->db->table('detail_kamar_penyewa')
            ->join('penyewa', 'penyewa.id_penyewa=detail_kamar_penyewa.id_penyewa')
            ->join('data_kamar', 'data_kamar.id_kamar=detail_kamar_penyewa.id_kamar')
            ->join('pemesanan', 'pemesanan.id_pemesanan=detail_kamar_penyewa.id_pemesanan')
            ->where('detail_kamar_penyewa.id_detail', $id_detail)
            ->get()->getRowArray();
    }

    public function getDetailKamarPenyewaGroupByPenyewa($id_pemilik_kos)
    {
        return $this->db->table('detail_kamar_penyewa')
            ->select('*, MAX(TANGGAL_MENEMPATI) AS TANGGAL_MENEMPATI, MAX(TANGGAL_KELUAR) AS TANGGAL_KELUAR, MAX(detail_kamar_penyewa.id_detail) AS LAST_ID_DETAIL')
            ->join('penyewa', 'penyewa.id_penyewa=detail_kamar_penyewa.id_penyewa')
            ->join('data_kamar', 'data_kamar.id_kamar=detail_kamar_penyewa.id_kamar')
            ->join('data_kos', 'data_kos.id_kos=data_kamar.id_kos')
            ->join('pemesanan', 'pemesanan.id_pemesanan=detail_kamar_penyewa.id_pemesanan')
            ->where('data_kos.id_pemilik_kos', $id_pemilik_kos)
            ->where('detail_kamar_penyewa.tanggal_menempati !=', null)
            ->groupBy('detail_kamar_penyewa.id_penyewa')
            ->get()->getResultArray();
    }

    // public function getDetailKamarPenyewabyNamaPenyewa($nama_penyewa)
    // {
    //     return $this->db->table('detail_kamar_penyewa')
    //         ->join('penyewa', 'penyewa.id_penyewa=detail_kamar_penyewa.id_penyewa')
    //         ->join('data_kos', 'data_kos.id_kos=detail_kamar_penyewa.id_detail')
    //         ->join('data_kamar', 'data_kamar.id_kamar=detail_kamar_penyewa.id_kamar')
    //         ->join('pemesanan', 'pemesanan.id_pemesanan=detail_kamar_penyewa.id_pemesanan')
    //         ->where('detail_kamar_penyewa.nama_penyewa', $nama_penyewa)
    //         ->get()->getResultArray();
    // }
}
