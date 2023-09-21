<?php

namespace App\Controllers;

use App\Models\PenyewaModel;
use App\Models\PemilikKosModel;
use App\Models\AdminModel;

class Login extends BaseController
{
    public function penyewa()
    {
        //include helper form
        helper(['form']);
        $data = [
            'title' => 'Login Penyewa',
        ];
        return view('/penyewa/login', $data);
    }

    public function pemilik_kos()
    {
        //include helper form
        helper(['form']);
        $data = [
            'title' => 'Login Pemilik Kos',
        ];
        return view('/pemilik_kos/login', $data);
    }

    public function admin()
    {
        //include helper form
        helper(['form']);
        $data = [
            'title' => 'Login Admin',
        ];
        return view('/admin/login', $data);
    }

    public function auth()
    {
        $session = session();
        $model = new PenyewaModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email_penyewa', $email)->first();
        if ($data) {
            $pass = $data['PASSWORD_PENYEWA'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_penyewa'            => $data['ID_PENYEWA'],
                    'nik_penyewa'           => $data['NIK_PENYEWA'],
                    'nama_penyewa'          => $data['NAMA_PENYEWA'],
                    'alamat_penyewa'        => $data['ALAMAT_PENYEWA'],
                    'no_telepon_penyewa'    => $data['NO_TELEPON_PENYEWA'],
                    'jenis_kelamin_penyewa' => $data['JENIS_KELAMIN_PENYEWA'],
                    'email_penyewa'         => $data['EMAIL_PENYEWA'],
                    'logged_in'             => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/penyewa');
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login/penyewa');
            }
        } else {
            $session->setFlashdata('msg', 'Email Tidak Ditemukan');
            return redirect()->to('/login/penyewa');
        }
    }

    public function auth2()
    {
        $session = session();
        $model = new PemilikKosModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email_pemilik_kos', $email)->first();
        if ($data) {
            $pass = $data['PASSWORD_PEMILIK_KOS'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_pemilik_kos'            => $data['ID_PEMILIK_KOS'],
                    'nik_pemilik_kos'           => $data['NIK_PEMILIK_KOS'],
                    'nama_pemilik_kos'          => $data['NAMA_PEMILIK_KOS'],
                    'no_telepon_pemilik_kos'    => $data['NO_TELEPON_PEMILIK_KOS'],
                    'email_pemilik_kos'         => $data['EMAIL_PEMILIK_KOS'],
                    'logged_in'                 => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/pemilik-kos');
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login/pemilik-kos');
            }
        } else {
            $session->setFlashdata('msg', 'Email Tidak Ditemukan');
            return redirect()->to('/login/pemilik-kos');
        }
    }

    public function auth3()
    {
        $session = session();
        $model = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username_admin', $username)->first();
        if ($data) {
            $pass = $data['PASSWORD_ADMIN'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_admin'          => $data['ID_ADMIN'],
                    'username_admin'    => $data['USERNAME_ADMIN'],
                    'logged_in'         => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin');
            } else {
                $session->setFlashdata('salah', 'Password Salah');
                return redirect()->to('/login/admin');
            }
        } else {
            $session->setFlashdata('salah', 'Username Tidak Ditemukan');
            return redirect()->to('/login/admin');
        }
    }

    public function logout()
    {
        session()->destroy();
    }

    public function logout2()
    {
        session()->destroy();
    }

    public function logout3()
    {
        session()->destroy();
    }

    public function infoLogout()
    {
        //flash message
        session()->setFlashdata('logout', 'Berhasil keluar dari sistem');
        return redirect()->to('/login/penyewa');
    }

    public function infoLogout2()
    {
        //flash message
        session()->setFlashdata('logout', 'Berhasil keluar dari sistem');
        return redirect()->to('/login/pemilik-kos');
    }

    public function infoLogout3()
    {
        //flash message
        session()->setFlashdata('logout', 'Berhasil keluar dari sistem');
        return redirect()->to('/login/admin');
    }

    // public function info_pemesanan()
    // {
    //     //flash message
    //     session()->setFlashdata('pemesanan', 'Anda harus login terlebih dahulu');
    //     return redirect()->to('/login/penyewa');
    // }
}
