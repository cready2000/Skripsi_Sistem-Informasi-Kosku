<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = [
        'id_admin',
        'id_saldo',
        'id_penyewa',
        'id_pemesanan',
        'no_rekening_penyewa',
        'nama_rekening_penyewa',
        'bank_penyewa',
        'metode_pembayaran',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'bukti_pembayaran'
    ];

    public function getPembayaran($id_pembayaran = false)
    {
        if ($id_pembayaran == false) {
            return $this->db->table('pembayaran')
                ->join('penyewa', 'penyewa.id_penyewa=pembayaran.id_penyewa')
                ->join('pemesanan', 'pemesanan.id_pemesanan=pembayaran.id_pemesanan')
                ->join('detail_kamar_penyewa', 'detail_kamar_penyewa.id_pemesanan=pemesanan.id_pemesanan')
                ->join('data_kamar', 'data_kamar.id_kamar=detail_kamar_penyewa.id_kamar')
                ->groupBy('pembayaran.id_pemesanan')
                ->orderBy('pembayaran.id_pembayaran', 'DESC')
                ->get()->getResultArray();
        }
        return $this->db->table('pembayaran')
            ->join('penyewa', 'penyewa.id_penyewa=pembayaran.id_penyewa')
            ->join('pemesanan', 'pemesanan.id_pemesanan=pembayaran.id_pemesanan')
            ->join('detail_kamar_penyewa', 'detail_kamar_penyewa.id_pemesanan=pemesanan.id_pemesanan')
            ->join('data_kamar', 'data_kamar.id_kamar=detail_kamar_penyewa.id_kamar')
            ->where('pembayaran.id_pembayaran', $id_pembayaran)
            ->groupBy('pembayaran.id_pembayaran')
            ->get()->getResultArray();
    }

    public function getPembayaranByIdSaldo($idSaldo)
    {
        return $this->db->table($this->table)
            ->where('id_saldo', $idSaldo)
            ->get()->getResultArray();
    }

    public function getRiwayatPembayaran($id_penyewa)
    {
        return $this->db->table($this->table)
            ->join('pemesanan', 'pemesanan.id_pemesanan=pembayaran.id_pemesanan')
            ->where('pembayaran.id_penyewa', $id_penyewa)
            ->groupBy('pembayaran.id_pembayaran')
            ->orderBy('tanggal_pembayaran', 'DESC')
            ->get()->getResultArray();
    }

    public function getDataNota($id_pembayaran)
    {
        return $this->db->table($this->table)
            ->join('pemesanan', 'pemesanan.id_pemesanan=pembayaran.id_pemesanan')
            ->join('penyewa', 'penyewa.id_penyewa=pemesanan.id_penyewa')
            ->join('detail_kamar_penyewa', 'detail_kamar_penyewa.id_pemesanan=pemesanan.id_pemesanan')
            ->join('data_kamar', 'data_kamar.id_kamar=detail_kamar_penyewa.id_kamar')
            ->join('data_kos', 'data_kos.id_kos=data_kamar.id_kos')
            ->where('pembayaran.id_pembayaran', $id_pembayaran)
            ->groupBy('pembayaran.id_pembayaran')
            ->get()->getResultArray();
    }
}
