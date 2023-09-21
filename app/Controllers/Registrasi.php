<?php

namespace App\Controllers;

use App\Models\PenyewaModel;
use App\Models\PemilikKosModel;
use App\Models\AdminModel;
use App\Models\SaldoModel;

class Registrasi extends BaseController
{
    public function penyewa()
    {
        //include helper form
        helper(['form']);
        $data = [
            'title' => 'Registrasi Penyewa',
        ];
        return view('penyewa/registrasi', $data);
    }

    public function pemilik_kos()
    {
        //include helper form
        helper(['form']);
        $data = [
            'title' => 'Registrasi Pemilik Kos',
        ];
        return view('/pemilik_kos/registrasi', $data);
    }

    public function simpan()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nik'           => 'required|min_length[16]|max_length[16]',
            'nama'          => 'required|min_length[3]|max_length[100]',
            'alamat'        => 'required|min_length[3]|max_length[100]',
            'telepon'       => 'required|min_length[10]|max_length[13]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[penyewa.email_penyewa]',
            'jk'            => 'required',
            'ktp'           => 'uploaded[ktp]|max_size[ktp,10240]|is_image[ktp]|mime_in[ktp,image/jpg,image/jpeg,image/png]',
            'password'      => 'required|min_length[8]|max_length[12]',
            'konfpassword'  => 'matches[password]'
        ];
        $dataKTP = $this->request->getFile('ktp');
        $namafile = $dataKTP->getRandomName();
        if ($this->validate($rules)) {
            $model = new PenyewaModel();
            $data = [
                'nik_penyewa'           => $this->request->getVar('nik'),
                'nama_penyewa'          => $this->request->getVar('nama'),
                'alamat_penyewa'        => $this->request->getVar('alamat'),
                'no_telepon_penyewa'    => $this->request->getVar('telepon'),
                'email_penyewa'         => $this->request->getVar('email'),
                'jenis_kelamin_penyewa' => $this->request->getVar('jk'),
                'ktp_penyewa'           => $namafile,
                'password_penyewa'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $dataKTP->move('upload/gambar_ktp', $namafile);
            $model->save($data);
            session()->setFlashdata('registrasi', 'Registrasi berhasil');
            return redirect()->to('/login/penyewa');
        } else {
            $data['validation'] = $this->validator;
            echo view('/penyewa/registrasi', $data);
        }
    }

    public function simpan2()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nik'           => 'required|min_length[16]|max_length[16]',
            'nama'          => 'required|min_length[3]|max_length[100]',
            'telepon'       => 'required|min_length[10]|max_length[13]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[pemilik_kos.email_pemilik_kos]',
            'password'      => 'required|min_length[8]|max_length[12]',
            'konfpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $pemilikkosModel = new PemilikKosModel();
            $saldoModel = new SaldoModel();
            $data = [
                'nik_pemilik_kos'           => $this->request->getVar('nik'),
                'nama_pemilik_kos'          => $this->request->getVar('nama'),
                'no_telepon_pemilik_kos'    => $this->request->getVar('telepon'),
                'email_pemilik_kos'         => $this->request->getVar('email'),
                'password_pemilik_kos'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $pemilikkosModel->save($data);
            $idPemilikKos = $pemilikkosModel->getInsertID();
            $saldoModel->save([
                'id_pemilik_kos' => $idPemilikKos,
                'jumlah_saldo' => 0
            ]);
            $idSaldo = $saldoModel->getInsertID();
            $pemilikkosModel->update($idPemilikKos, [
                'id_saldo' => $idSaldo
            ]);
            session()->setFlashdata('registrasi', 'Registrasi berhasil');
            return redirect()->to('/login/pemilik-kos');
        } else {
            $data['validation'] = $this->validator;
            echo view('/pemilik_kos/registrasi', $data);
        }
    }
}
