<?php

namespace App\Controllers;

use App\Models\DataKamarModel;
use App\Models\DataKosModel;
use App\Models\GambarKamarModel;
use App\Models\PemesananModel;

class DataKamar extends BaseController
{
    protected $datakamarmodel;
    protected $datakosmodel;
    protected $gambarkamarmodel;
    protected $pemesananmodel;
    public function __construct()
    {
        $this->datakamarmodel = new DataKamarModel();
        $this->datakosmodel = new DataKosModel();
        $this->gambarkamarmodel = new GambarKamarModel();
        $this->pemesananmodel = new PemesananModel();
    }

    public function lihat_belum_login($nama)
    {
        $nama_kos = urldecode($nama);
        $data = [
            'title' => 'Lihat Kamar',
            'datakamar' => $this->datakamarmodel->getDataKamarbyNamaKos($nama_kos)
        ];
        return view('penyewa/data_kamar/lihat_kamar', $data);
    }

    public function lihat_sudah_login($nama)
    {
        $nama_kos = urldecode($nama);
        $data = [
            'title' => 'Lihat Kamar',
            'datakamar' => $this->datakamarmodel->getDataKamarbyNamaKos($nama_kos)
        ];
        return view('penyewa/data_kamar/lihat_kamar2', $data);
    }

    public function lihat_by_pemilik_kos()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data = [
            'datakamar' => $this->datakamarmodel->getDataKamarbyPemilik($id_pemilik_kos),
            'datakamar2' => $this->datakamarmodel->paginate(10, 'lihat_data_kamar'),
            'pager' => $this->datakamarmodel->pager,
            'nomor' => nomor($this->request->getVar('page_lihat_data_kamar'), 10)
        ];
        return view('pemilik_kos/data_kamar/lihat_data_kamar', $data);
    }

    public function detail_belum_login($nama)
    {
        $nama_kamar = urldecode($nama);
        $data = [
            'title' => 'Detail Kamar',
            'datakamar' => $this->datakamarmodel->getDataKamarbyNamaKamar($nama_kamar),
            'datagambar' => $this->gambarkamarmodel->getGambarKamarbyNama($nama_kamar),
            'pemesanan' => $this->pemesananmodel->getStatusPenyewa()
        ];
        return view('penyewa/data_kamar/detail_kamar', $data);
    }

    public function detail_sudah_login($nama)
    {
        $nama_kamar = urldecode($nama);
        $data = [
            'title' => 'Detail Kamar',
            'datakamar' => $this->datakamarmodel->getDataKamarbyNamaKamar($nama_kamar),
            'datagambar' => $this->gambarkamarmodel->getGambarKamarbyNama($nama_kamar),
            'pemesanan' => $this->pemesananmodel->getStatusPenyewa()
        ];
        // dd($data);
        return view('penyewa/data_kamar/detail_kamar2', $data);
    }

    public function detail_by_pemilik_kos($nama)
    {
        $nama_kamar = urldecode($nama);
        $data = [
            'datakamar' => $this->datakamarmodel->getDataKamarbyNamaKamar2($nama_kamar),
            'datagambar' => $this->gambarkamarmodel->getGambarKamarbyNama($nama_kamar)
        ];

        return view('pemilik_kos/data_kamar/detail_data_kamar', $data);
    }

    public function tambah()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data['listkos'] = $this->datakosmodel->where('id_pemilik_kos', $id_pemilik_kos)->get()->getResultArray();
        // tampilkan form tambah
        return view('pemilik_kos/data_kamar/tambah_data_kamar', $data);
    }

    public function simpan_tambah()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data['listkos'] = $this->datakosmodel->where('id_pemilik_kos', $id_pemilik_kos)->get()->getResultArray();
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_kos' => 'required',
            'tipe' => 'required',
            'nama_kamar' => 'required|min_length[3]|max_length[50]',
            'fasilitas' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,10240]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'link' => 'permit_empty'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $model = new DataKamarModel();
            $modelgambar = new GambarKamarModel();
            if ($this->request->getFileMultiple('gambar')) {
                $model->insert([
                    "id_kos" => $this->request->getPost('nama_kos'),
                    "tipe_kamar" => $this->request->getPost('tipe'),
                    "nama_kamar" => $this->request->getPost('nama_kamar'),
                    "fasilitas_kamar" => $this->request->getPost('fasilitas'),
                    "stok_kamar" => $this->request->getPost('stok'),
                    "harga_kamar" => $this->request->getPost('harga'),
                    "link_video_kamar" => $this->request->getPost('link')
                ]);
                $id_kamar = $model->getInsertID();
                foreach ($this->request->getFileMultiple('gambar') as $datagambar) {
                    $namafile = $datagambar->getRandomName();
                    $modelgambar->insert([
                        "id_kamar" => $id_kamar,
                        "file_gambar_kamar" => $namafile
                    ]);
                    $datagambar->move('upload/gambar_kamar', $namafile);
                }
            }
            session()->setFlashdata('tambah', 'Data berhasil ditambah');
            return redirect('data-kamar');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/data-kamar/tambah');
    }

    public function ubah($nama)
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $nama_kamar = urldecode($nama);
        $data = [
            'datakamar' => $this->datakamarmodel->getDataKamarbyNamaKamar($nama_kamar),
            'listkos' => $this->datakosmodel->where('id_pemilik_kos', $id_pemilik_kos)->get()->getResultArray(),
            'tipekamar' => array('Sendiri', 'Berdua')
        ];
        return view('pemilik_kos/data_kamar/ubah_data_kamar', $data);
    }

    public function simpan_ubah($nama)
    {
        $nama_kamar = urldecode($nama);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama_kos' => 'required',
            'tipe' => 'required',
            'nama_kamar' => 'required|min_length[3]|max_length[50]',
            'fasilitas' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'link' => 'permit_empty',
            'gambar' => 'uploaded[gambar]|max_size[gambar,10240]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $session = session();

        if ($isDataValid) {
            $model = new DataKamarModel();
            $modelgambar = new GambarKamarModel();
            if ($this->request->getFileMultiple('gambar')) {
                $model->update($nama_kamar, [
                    "id_kos" => $this->request->getPost('nama_kos'),
                    "tipe_kamar" => $this->request->getPost('tipe'),
                    "nama_kamar" => $this->request->getPost('nama_kamar'),
                    "fasilitas_kamar" => $this->request->getPost('fasilitas'),
                    "stok_kamar" => $this->request->getPost('stok'),
                    "harga_kamar" => $this->request->getPost('harga'),
                    "link_video_kamar" => $this->request->getPost('link')
                ]);
                $id_kamar = $this->request->getPost('id');
                $modelgambar->where('id_kamar', $id_kamar)->delete();
                foreach ($this->request->getFileMultiple('gambar') as $datagambar) {
                    $namafile = $datagambar->getRandomName();
                    $modelgambar->insert([
                        "id_kamar" => $id_kamar,
                        "file_gambar_kamar" => $namafile
                    ]);
                    // $modelgambar->update($id_kamar, [
                    //     "file_gambar_kamar" => $namafile
                    // ]);
                    $datagambar->move('upload/gambar_kamar', $namafile);
                }
            }
            session()->setFlashdata('ubah', 'Data berhasil diubah');
            return redirect('data-kamar');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/data-kamar/ubah/' . $nama_kamar);
    }

    public function hapus($id_pemilik_kos)
    {
        $model = new DataKamarModel();
        $data = $model->find($id_pemilik_kos);
        if ($data) {
            $model->delete($id_pemilik_kos);
            //flash message
            session()->setFlashdata('hapus', 'Data berhasil dihapus');
            return redirect()->to(base_url('data-kamar'));
        }
    }
}
