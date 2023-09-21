<?php

namespace App\Controllers;

use App\Models\PenyewaModel;
use App\Models\PemilikKosModel;
use App\Models\AdminModel;

class UbahPassword extends BaseController
{
    protected $penyewamodel;
    protected $pemilikkosmodel;
    protected $adminmodel;
    public function __construct()
    {
        $this->penyewamodel = new PenyewaModel();
        $this->pemilikkosmodel = new PemilikKosModel();
        $this->adminmodel = new AdminModel();
    }

    public function penyewa()
    {
        $session = session();
        $id_penyewa = $session->get('id_penyewa');
        $data['penyewa'] = $this->penyewamodel->getPenyewa($id_penyewa);
        return view('penyewa/profil/ubah_password', $data);
    }

    public function saveUbahPenyewa()
    {
        $session = session();
        $id_penyewa = $session->get('id_penyewa');
        $data['penyewa'] = $this->penyewamodel->getPenyewa($id_penyewa);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'password' => 'required|min_length[8]|max_length[12]',
            'konfpassword'  => 'matches[password]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->penyewamodel->update($id_penyewa, [
                "id_penyewa" => $this->request->getVar('id'),
                "password_penyewa" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ]);
            session()->setFlashdata('ubah', 'Password berhasil diubah');
            return redirect('penyewa');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/penyewa/ubah-password');
    }

    public function pemilik_kos()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data['pemilikkos'] = $this->pemilikkosmodel->getPemilikKos($id_pemilik_kos);
        return view('pemilik_kos/ubah_password', $data);
    }

    public function saveUbahPemilikKos()
    {
        $session = session();
        $id_pemilik_kos = $session->get('id_pemilik_kos');
        $data['pemilikkos'] = $this->pemilikkosmodel->getPemilikKos($id_pemilik_kos);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'password' => 'required|min_length[8]|max_length[12]',
            'konfpassword'  => 'matches[password]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $session->setFlashdata('errors', null);
        if ($isDataValid) {
            $this->pemilikkosmodel->update($id_pemilik_kos, [
                "id_pemilik_kos" => $this->request->getVar('id'),
                "password_pemilik_kos" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ]);
            session()->setFlashdata('ubah2', 'Password berhasil diubah');
            return redirect()->to('/pemilik-kos');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/pemilik-kos/ubah-password');
    }

    public function admin()
    {
        $session = session();
        $id_admin = $session->get('id_admin');
        $data['admin'] = $this->adminmodel->getAdmin($id_admin);
        return view('admin/ubah_password', $data);
    }

    public function saveUbahAdmin()
    {
        $session = session();
        $id_admin = $session->get('id_admin');
        $data['admin'] = $this->adminmodel->getAdmin($id_admin);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'password' => 'required|min_length[8]|max_length[12]',
            'konfpassword'  => 'matches[password]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $session->setFlashdata('errors', null);
        if ($isDataValid) {
            $this->adminmodel->update($id_admin, [
                "id_admin" => $this->request->getVar('id'),
                "password_admin" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ]);
            session()->setFlashdata('ubah3', 'Password berhasil diubah');
            return redirect()->to('/admin');
        } else {
            $session->setFlashdata('errors', $validation->listErrors());
        }
        return redirect()->to('/admin/ubah-password');
    }
}
