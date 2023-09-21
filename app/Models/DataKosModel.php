<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKosModel extends Model
{
    protected $table = 'data_kos';
    protected $primaryKey = 'id_kos';
    protected $allowedFields = [
        'id_wilayah',
        'id_radius',
        'id_pemilik_kos',
        'nama_kos',
        'alamat_kos',
        'jumlah_kamar_kos',
        'fasilitas_kos',
        'telepon_kos',
        'gender_kos',
        'longitude_kos',
        'latitude_kos',
        'durasi'
    ];

    public function getDataKos($id_pemilik_kos)
    {
        return $this->db->table('data_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->where('data_kos.id_pemilik_kos', $id_pemilik_kos)
            ->groupBy('data_kos.id_kos')
            ->get()->getResultArray();
    }

    public function getDataKosbyNamaKos($nama_kos)
    {
        return $this->db->table('data_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->groupBy('data_kos.id_kos')
            ->where('data_kos.nama_kos', $nama_kos)
            ->get()->getResultArray();
    }

    public function getDataKosbyNamaKos2($nama_kos)
    {
        return $this->db->table('data_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->where('data_kos.nama_kos', $nama_kos)
            ->orderBy('gambar_kos.id_gambar_kos')->limit(1)
            ->get()->getResultArray();
    }

    public function getDataKosbyNamaKos3($nama_kos)
    {
        return $this->db->table('data_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->where('data_kos.nama_kos', $nama_kos)
            ->get()->getResultArray();
    }

    public function pencarian($kunci)
    {
        return $this->db->table('data_kos')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->like('NAMA_KOS', $kunci)->orlike('wilayah.nama_wilayah', $kunci)->get()->getResultArray();
    }

    public function getRekomendasiKos()
    {
        return $this->db->table($this->table)
            ->select('data_kos.id_kos, data_kos.nama_kos, data_kos.alamat_kos, COUNT(pemesanan.id_pemesanan) AS jumlah_pemesanan, gambar_kos.file_gambar_kos')
            ->join('pemesanan', 'pemesanan.id_kos = data_kos.id_kos')
            ->join('gambar_kos', 'gambar_kos.id_kos = data_kos.id_kos')
            ->where('pemesanan.status_pemesanan', 'Sudah Membayar')
            ->groupBy('data_kos.id_kos')
            ->get()->getResultArray();
    }

    public function getTotalKos()
    {
        $condition = ['data_kos.id_kos !=' => null];
        return $this->db->table('data_kos')
            ->where($condition)
            ->countAllResults();
    }

    public function getDataKosbyIDPenyewa($id_penyewa)
    {
        return $this->db->table('data_kos')
            ->join('data_kamar', 'data_kamar.id_kos=data_kos.id_kos')
            ->join('gambar_kos', 'gambar_kos.id_kos=data_kos.id_kos')
            ->join('radius', 'radius.id_radius=data_kos.id_radius')
            ->join('wilayah', 'wilayah.id_wilayah=data_kos.id_wilayah')
            ->join('pemesanan', 'pemesanan.id_kos=data_kos.id_kos')
            ->join('pembayaran', 'pembayaran.id_pemesanan=pemesanan.id_pemesanan')
            ->join('detail_kamar_penyewa', 'detail_kamar_penyewa.id_pemesanan=pemesanan.id_pemesanan')
            ->where('detail_kamar_penyewa.id_penyewa', $id_penyewa)
            ->groupBy('pemesanan.id_pemesanan')
            ->orderBy('pemesanan.id_pemesanan', 'DESC')
            ->get()->getResultArray();
    }
}
