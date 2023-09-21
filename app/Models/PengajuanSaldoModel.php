<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanSaldoModel extends Model
{
    protected $table = 'pengajuan_saldo';
    protected $primaryKey = 'id_pengajuan_saldo';
    protected $allowedFields = [
        'id_pengajuan_saldo',
        // 'id_otp',
        'id_admin',
        'id_saldo',
        'id_pemilik_kos',
        'no_rekening_pemilik_kos',
        'nama_rekening_pemilik_kos',
        'bank_pemilik_kos',
        'jumlah_penarikan',
        'tanggal_penarikan',
        'bukti_transfer',
        'status_penarikan_saldo'
    ];

    public function getPengajuan($id_pemilik_kos = false)
    {
        if ($id_pemilik_kos == false) {
            return $this->db->table('pengajuan_saldo')
                ->join('saldo', 'saldo.id_saldo=pengajuan_saldo.id_saldo')
                ->get()->getResultArray();
        } else {
            return $this->db->table('pengajuan_saldo')
                ->join('saldo', 'saldo.id_saldo=pengajuan_saldo.id_saldo')
                ->where('pengajuan_saldo.id_pemilik_kos', $id_pemilik_kos)
                ->get()->getResultArray();
        }
    }

    public function getKonfirmasi($id_pengajuan_saldo = false)
    {
        if ($id_pengajuan_saldo == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_pengajuan_saldo' => $id_pengajuan_saldo])->findAll();
        }
    }

    public function getJumlahPenarikan($id_pengajuan_saldo)
    {
        return $this->db->table($this->table)
            ->select('jumlah_penarikan')
            ->where($this->primaryKey, $id_pengajuan_saldo)
            ->get()->getFirstRow()->jumlah_penarikan;
    }

    public function updateKonfirmasiPenarikan($id_admin, $bukti, $tanggal, $id_pengajuan_saldo)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->set('id_admin', $id_admin);
        $builder->set('bukti_transfer', $bukti);
        $builder->set('tanggal_konfirmasi', $tanggal);
        $builder->where('id_pengajuan_saldo', $id_pengajuan_saldo);
        $builder->update();
    }
}
