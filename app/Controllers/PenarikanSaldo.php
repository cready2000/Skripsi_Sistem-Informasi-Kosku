<?php

namespace App\Controllers;

use App\Models\PengajuanSaldoModel;
use App\Models\SaldoModel;

class PenarikanSaldo extends BaseController
{
    protected $pengajuansaldomodel;
    protected $saldoModel;
    public function __construct()
    {
        $this->pengajuansaldomodel = new PengajuanSaldoModel();
        $this->saldoModel = new SaldoModel();
    }

    public function lihat()
    {
        $data = [
            'title' => 'Penarikan Saldo',
            'saldo' => $this->pengajuansaldomodel->getPengajuan(),
            'saldo2' => $this->pengajuansaldomodel->paginate(10, 'lihat_penarikan_saldo'),
            'pager' => $this->pengajuansaldomodel->pager,
            'nomor' => nomor($this->request->getVar('page_lihat_penarikan_saldo'), 10),
        ];
        return view('admin/penarikan_saldo/lihat_penarikan_saldo', $data);
    }

    public function konfirmasi($id_pengajuan_saldo)
    {
        $data = [
            'title' => 'Detail Penarikan Saldo',
            'konfirmasi' => $this->pengajuansaldomodel->getKonfirmasi($id_pengajuan_saldo),
            'idPengajuan' => $id_pengajuan_saldo,
        ];
        return view('admin/penarikan_saldo/konfirmasi_penarikan_saldo', $data);
    }

    public function simpan_konfirmasi()
    {
        $rules = [
            'tanggal' => 'required',
            'bukti' => 'uploaded[bukti]|max_size[bukti,10240]|is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]'
        ];
        $session = session();
        $id_pengajuan = $this->request->getVar('id_pengajuan_saldo');
        $entityPengajuan = $this->pengajuansaldomodel->find($id_pengajuan);

        $id_admin = $session->get('id_admin');
        $konfirmasi_penarikan_saldo = $this->request->getFile('bukti');
        $namafile = $konfirmasi_penarikan_saldo->getRandomName();
        // jika data valid, simpan ke database
        if ($this->validate($rules)) {
            $this->pengajuansaldomodel->update($id_pengajuan, [
                "status_penarikan_saldo" => 'Selesai'
            ]);
            $konfirmasi_penarikan_saldo->move('upload/konfirmasi_penarikan_saldo', $namafile);
            $this->pengajuansaldomodel->updateKonfirmasiPenarikan($id_admin, $namafile, $this->request->getVar('tanggal'), $id_pengajuan);
            $this->saldoModel->decrementSaldoByID($entityPengajuan['ID_SALDO'], $id_pengajuan);
            session()->setFlashdata('konfirmasi', 'Pengajuan penarikan saldo berhasil dikonfirmasi');
            return redirect()->to(base_url('penarikan-saldo'));
        } else {
            $data['validation'] = $this->validator;
        }
    }
}
