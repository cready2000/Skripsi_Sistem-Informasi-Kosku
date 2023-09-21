<?php

namespace App\Controllers;

use App\Models\DataKosModel;
use App\Models\GambarKosModel;

class DataKos extends BaseController
{
    protected $datakosmodel;
    protected $gambarkosmodel;
    public function __construct()
    {
        $this->datakosmodel = new DataKosModel();
        $this->gambarkosmodel = new GambarKosModel();
    }

    public function lihat_by_pemilik_kos()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data = [
            'datakos' => $this->datakosmodel->getDataKos($id_pemilik_kos),
            'datakos2' => $this->datakosmodel->paginate(10, 'lihat_data_kos'),
            'pager' => $this->datakosmodel->pager,
            'nomor' => nomor($this->request->getVar('page_lihat_data_kos'), 10),
        ];
        return view('pemilik_kos/data_kos/lihat_data_kos', $data);
    }

    public function detail_belum_login($nama)
    {
        $nama_kos = urldecode($nama);
        $data = [
            'title' => 'Detail Kos',
            'datakos' => $this->datakosmodel->getDataKosbyNamaKos($nama_kos),
        ];
        return view('penyewa/data_kos/detail_kos', $data);
    }

    public function detail_sudah_login($nama)
    {
        $nama_kos = urldecode($nama);
        $data = [
            'title' => 'Detail Kos',
            'datakos' => $this->datakosmodel->getDataKosbyNamaKos($nama_kos),
        ];
        return view('penyewa/data_kos/detail_kos2', $data);
    }

    public function detail_by_pemilik_kos($nama)
    {
        $nama_kos = urldecode($nama);
        $data = [
            'datakos' => $this->datakosmodel->getDataKosbyNamaKos3($nama_kos),
            'data_gambar' => $this->gambarkosmodel->getGambarKosbyNama($nama_kos)
        ];
        return view('pemilik_kos/data_kos/detail_data_kos', $data);
    }

    public function tambah()
    {
        // tampilkan form tambah
        return view('pemilik_kos/data_kos/tambah_data_kos');
    }

    public function simpan_tambah()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[50]',
            'gender' => 'required',
            'durasi' => 'required',
            'wilayah' => 'required',
            'radius' => 'required',
            'alamat' => 'required|min_length[3]|max_length[100]',
            'jumlah' => 'required',
            'telepon' => 'required|min_length[10]|max_length[13]',
            'fasilitas' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,10240]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $model = new DataKosModel();
            $modelgambar = new GambarKosModel();
            if ($this->request->getFileMultiple('gambar')) {
                $model->insert([
                    "id_pemilik_kos" => $id_pemilik_kos,
                    "nama_kos" => $this->request->getPost('nama'),
                    "gender_kos" => $this->request->getPost('gender'),
                    "durasi" => $this->request->getPost('durasi'),
                    "id_wilayah" => $this->request->getPost('wilayah'),
                    "id_radius" => $this->request->getPost('radius'),
                    "alamat_kos" => $this->request->getPost('alamat'),
                    "jumlah_kamar_kos" => $this->request->getPost('jumlah'),
                    "telepon_kos" => $this->request->getPost('telepon'),
                    "fasilitas_kos" => $this->request->getPost('fasilitas'),
                    "longitude_kos" => $this->request->getPost('longitude'),
                    "latitude_kos" => $this->request->getPost('latitude'),
                ]);
                $id_kos = $model->getInsertID();
                foreach ($this->request->getFileMultiple('gambar') as $datagambar) {
                    $namafile = $datagambar->getRandomName();
                    $modelgambar->insert([
                        "id_kos" => $id_kos,
                        "file_gambar_kos" => $namafile
                    ]);
                    $datagambar->move('upload/gambar_kos', $namafile);
                }
            }
            session()->setFlashdata('tambah', 'Data berhasil ditambah');
            return redirect('data-kos');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/data-kos/tambah');
    }

    public function ubah($nama)
    {
        $nama_kos = urldecode($nama);
        $data = [
            'datakos' => $this->datakosmodel->getDataKosbyNamaKos($nama_kos),
            'gender' => array('Pria', 'Wanita', 'Campur'),
            'durasi' => array('1 Bulan', '3 Bulan', '6 bulan', '12 Bulan'),
            'wilayah' => array('Gunung Anyar', 'Medokan Ayu'),
            'radius' => array('100 Meter', '500 Meter')
        ];
        return view('pemilik_kos/data_kos/ubah_data_kos', $data);
    }

    public function simpan_ubah($nama)
    {
        $nama_kos = urldecode($nama);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama' => 'required|min_length[3]|max_length[50]',
            'gender' => 'required',
            'durasi' => 'required',
            'wilayah' => 'required',
            'radius' => 'required',
            'alamat' => 'required|min_length[3]|max_length[100]',
            'jumlah' => 'required',
            'fasilitas' => 'required',
            'telepon' => 'required|min_length[10]|max_length[13]',
            'longitude' => 'required',
            'latitude' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,10240]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');

        if ($isDataValid) {
            $model = new DataKosModel();
            $modelgambar = new GambarKosModel();
            if ($this->request->getFileMultiple('gambar')) {
                $model->update($nama_kos, [
                    "id_pemilik_kos" => $id_pemilik_kos,
                    "nama_kos" => $this->request->getPost('nama'),
                    "gender_kos" => $this->request->getPost('gender'),
                    "durasi" => $this->request->getPost('durasi'),
                    "nama_wilayah" => $this->request->getPost('wilayah'),
                    "jarak_radius" => $this->request->getPost('radius'),
                    "alamat_kos" => $this->request->getPost('alamat'),
                    "jumlah_kamar_kos" => $this->request->getPost('jumlah'),
                    "fasilitas_kos" => $this->request->getPost('fasilitas'),
                    "telepon_kos" => $this->request->getPost('telepon'),
                    "longitude_kos" => $this->request->getPost('longitude'),
                    "latitude_kos" => $this->request->getPost('latitude')
                ]);
                $id_kos = $this->request->getPost('id');
                $modelgambar->where('id_kos', $id_kos)->delete();
                foreach ($this->request->getFileMultiple('gambar') as $datagambar) {
                    $namafile = $datagambar->getRandomName();
                    $modelgambar->insert([
                        "id_kos" => $id_kos,
                        "file_gambar_kos" => $namafile
                    ]);
                    $datagambar->move('upload/gambar_kos', $namafile);
                }
            }
            session()->setFlashdata('ubah', 'Data berhasil diubah');
            return redirect('data-kos');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/data-kos/ubah/' . $nama_kos);
    }
}
