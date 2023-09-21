<?php

namespace App\Controllers;

use App\Models\PenyewaModel;
use App\Models\PemilikKosModel;

class Profil extends BaseController
{
    protected $penyewamodel;
    protected $pemilikkosmodel;
    public function __construct()
    {
        $this->penyewamodel = new PenyewaModel();
        $this->pemilikkosmodel = new PemilikKosModel();
    }

    public function penyewa()
    {
        $session = session();
        $id_penyewa = $session->get('id_penyewa');
        $data = [
            'title' => 'Profil',
            'penyewa' => $this->penyewamodel->getPenyewa($id_penyewa)
        ];
        return view('penyewa/profil/lihat_profil', $data);
    }

    public function ubah_profil_penyewa()
    {
        $session = session();
        $id_penyewa = $session->get('id_penyewa');
        $data['penyewa'] = $this->penyewamodel->getPenyewa($id_penyewa);
        return view('penyewa/profil/ubah_profil', $data);
    }

    public function simpan_ubah_profil_penyewa()
    {
        $session = session();
        $id_penyewa = $session->get('id_penyewa');
        $data['penyewa'] = $this->penyewamodel->getPenyewa($id_penyewa);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'jk' => 'required',
            'nik' => 'required|min_length[16]|max_length[16]',
            'nama' => 'required|min_length[3]|max_length[100]',
            'alamat' => 'required|min_length[3]|max_length[100]',
            'telepon' => 'required|min_length[10]|max_length[13]',
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[penyewa.email_penyewa,id_penyewa,{id}]',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->penyewamodel->update($id_penyewa, [
                "jenis_kelamin_penyewa" => $this->request->getPost('jk'),
                "nik_penyewa" => $this->request->getPost('nik'),
                "nama_penyewa" => $this->request->getPost('nama'),
                "alamat_penyewa" => $this->request->getPost('alamat'),
                "no_telepon_penyewa" => $this->request->getPost('telepon'),
                "email_penyewa" => $this->request->getPost('email')
            ]);
            session()->setFlashdata('ubah', 'Profil berhasil diubah');
            return redirect('penyewa/profil');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/penyewa/ubah-profil');
    }

    public function pemilik_kos()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data['pemilikkos'] = $this->pemilikkosmodel->getPemilikKos($id_pemilik_kos);
        return view('pemilik_kos/ubah_profil', $data);
    }

    public function ubah_profil_pemilik_kos()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data['pemilikkos'] = $this->pemilikkosmodel->getPemilikKos($id_pemilik_kos);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nik' => 'required|min_length[16]|max_length[16]',
            'nama' => 'required|min_length[3]|max_length[100]',
            'telepon' => 'required|min_length[10]|max_length[13]',
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[pemilik_kos.email_pemilik_kos,id_pemilik_kos,{id}]',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->pemilikkosmodel->update($id_pemilik_kos, [
                "nik_pemilik_kos" => $this->request->getPost('nik'),
                "nama_pemilik_kos" => $this->request->getPost('nama'),
                "no_telepon_pemilik_kos" => $this->request->getPost('telepon'),
                "email_pemilik_kos" => $this->request->getPost('email')
            ]);
            session()->setFlashdata('ubah', 'Profil berhasil diubah');
            return redirect('pemilik-kos');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/pemilik-kos/ubah-profil');
    }
}
