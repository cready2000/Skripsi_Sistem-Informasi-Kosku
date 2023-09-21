<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class SaldoModel extends Model
{
    protected $table = 'saldo';
    protected $primaryKey = 'id_saldo';
    protected $allowedFields = [
        'id_saldo',
        'id_pemilik_kos',
        'jumlah_saldo'
    ];
    protected $useAutoIncrement = true;

    public function getSaldo()
    {
        return $this->db->table('saldo')
            ->join('pemilik_kos', 'pemilik_kos.id_pemilik_kos=saldo.id_pemilik_kos')
            ->join('data_kos', 'data_kos.id_pemilik_kos=saldo.id_pemilik_kos')
            ->get()->getResultArray();
    }

    public function getIdSaldoByIdKos($id_kos)
    {
        return $this->db->table('saldo')
            ->select('saldo.id_saldo')
            ->join('data_kos', 'data_kos.id_pemilik_kos=saldo.id_pemilik_kos')
            ->join('pemilik_kos', 'pemilik_kos.id_pemilik_kos=saldo.id_pemilik_kos')
            ->where('data_kos.id_kos', $id_kos)
            ->groupBy('pemilik_kos.id_pemilik_kos')
            ->get()->getFirstRow()->id_saldo;
    }

    public function getSaldoByIdPemilik($id_pemilik_kos)
    {
        return $this->db->table($this->table)
            ->where('id_pemilik_kos', $id_pemilik_kos)
            ->get()->getFirstRow();
    }

    public function getJumlahSaldoByIdPemilik($id_pemilik_kos)
    {
        return $this->db->table($this->table)
            ->where('saldo.id_pemilik_kos', $id_pemilik_kos)
            ->get()->getResultArray();
    }

    public function getSaldoItem($idSaldo)
    {
        return $this->db->table($this->table)
            ->select('jumlah_saldo')
            ->where($this->primaryKey, $idSaldo)
            ->get()->getFirstRow()->jumlah_saldo;
    }

    public function updateSaldoById($idSaldo, $jumlahSaldo)
    {
        $currentSaldo = $this->getSaldoItem($idSaldo);
        $updateData = [
            'jumlah_saldo' => $currentSaldo + $jumlahSaldo
        ];
        $this->db->table($this->table)->where($this->primaryKey, $idSaldo)->update($updateData);
    }

    public function decrementSaldoByID($idSaldo, $id_pengajuan_saldo)
    {
        $currentSaldo = $this->getSaldoItem($idSaldo);
        $pengajuanModel = new PengajuanSaldoModel();
        $jumlahPenarikan = $pengajuanModel->getJumlahPenarikan($id_pengajuan_saldo);
        $updateData = [
            'jumlah_saldo' => $currentSaldo - $jumlahPenarikan
        ];
        $this->db->table($this->table)->where($this->primaryKey, $idSaldo)->update($updateData);
    }
}
