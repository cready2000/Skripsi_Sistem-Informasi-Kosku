<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKamarModel extends Model
{
    protected $table = 'data_kamar';
    protected $primaryKey = 'id_kamar';
    protected $allowedFields = [
        'id_kos',
        'tipe_kamar',
        'nama_kamar',
        'fasilitas_kamar',
        'stok_kamar',
        'harga_kamar',
        'link_video_kamar'
    ];

    public function getDataKamar($id_kamar = false)
    {
        if ($id_kamar == false) {
            return $this->findAll();
        }
        return $this->where(['id_kamar' => $id_kamar])->first();
    }

    public function getDataKamarbyNamaKamar($nama_kamar = false)
    {
        // dd($nama_kamar);
        $db = db_connect();
        $builder = $db->table($this->table);
        if ($nama_kamar == false) {
            $builder->select('*')->join('data_kos', 'data_kos.id_kos=data_kamar.id_kos');
            $result = $builder->get()->getResultArray();
            return $result;
        }
        $builder->select('*')->join('data_kos', 'data_kos.id_kos=data_kamar.id_kos')->where('data_kamar.nama_kamar', $nama_kamar);
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function getDataKamarbyNamaKos($nama_kos)
    {
        $db = db_connect();
        $builder = $db->table($this->table);
        $builder->select('*')->join('data_kos', 'data_kos.id_kos=data_kamar.id_kos')->join('gambar_kamar', 'gambar_kamar.id_kamar=data_kamar.id_kamar')->where('data_kos.nama_kos', $nama_kos)->groupBy('data_kamar.id_kamar')->orderBy('gambar_kamar.id_gambar_kamar');
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function getDataKamarbyNamaKamar2($nama_kamar)
    {
        $db = db_connect();
        $builder = $db->table($this->table);
        $builder->select('*')->join('data_kos', 'data_kos.id_kos=data_kamar.id_kos')->where('data_kamar.nama_kamar', $nama_kamar);
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function getDataKamarbyPemilik($id_pemilik_kos)
    {
        $db = db_connect();
        $builder = $db->table($this->table);
        $builder->select('*')->join('data_kos', 'data_kos.id_kos=data_kamar.id_kos')->join('pemilik_kos', 'pemilik_kos.id_pemilik_kos=data_kos.id_pemilik_kos')->where('data_kos.id_pemilik_kos', $id_pemilik_kos);
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function getDataKamarbyID($id_kamar)
    {
        $db = db_connect();
        $builder = $db->table($this->table);
        $builder->select('*')->join('data_kos', 'data_kos.id_kos=data_kamar.id_kos')->where('data_kamar.id_kamar', $id_kamar);
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function getTotalKamar()
    {
        $condition = ['data_kamar.id_kamar !=' => null];
        return $this->db->table('data_kamar')
            ->where($condition)
            ->countAllResults();
    }

    public function incrementStokKamar($id_kamar)
    {
        $db = db_connect();
        $builder = $db->table($this->table);
        $builder->set('stok_kamar', 'stok_kamar+1', FALSE);
        $builder->where('id_kamar', $id_kamar);
        $builder->update();
    }

    public function decrementStokKamar($id_kamar)
    {
        $db = db_connect();
        $builder = $db->table($this->table);
        $builder->set('stok_kamar', 'stok_kamar-1', FALSE);
        $builder->where('id_kamar', $id_kamar);
        $builder->update();
    }
}
