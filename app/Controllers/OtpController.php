<?php

namespace App\Controllers;

use App\Models\OtpModel;

class OtpController extends BaseController
{
    protected $otpModel;
    public function __construct()
    {
        $this->otpModel = new OtpModel();
    }

    public function otpVerify()
    {
        $kode_otp = $this->request->getVar('kode_otp');
        $id_otp = $this->request->getVar('id_otp');
        $otpModel = new OtpModel();
        $verifikasi = $otpModel->verifikasiOtp($kode_otp, $id_otp);
        if ($verifikasi) {
            return json_encode(['status' => 'success', 'otpValidation' => 'valid', 'csrf' => csrf_hash()]);
        } else {
            return json_encode(['status' => 'error', 'otpValidation' => 'invalid', 'csrf' => csrf_hash()]);
        }
    }

    public function otpRequest()
    {
        if ($this->request->isAJAX()) {
            $email = service('request')->getPost('email');
            helper('text');
            $kode_otp = random_string('numeric', 6);
            $otpObject = [
                'kode_otp' => $kode_otp,
                'email' => $email
            ];
            $otpModel = new OtpModel();
            $otpModel->save($otpObject);
            $id_otp = $otpModel->getInsertID();
            $this->sendEmailOtp($email, $kode_otp);
            return json_encode(['status' => 'success', 'id_otp' => $id_otp, 'csrf' => csrf_hash()]);
        } else {
            $email = 'rivaldohadiwinata@gmail.com';
            helper('text');
            $kode_otp = random_string('numeric', 6);
            $otpObject = [
                'kode_otp' => $kode_otp,
                'email' => $email
            ];
            $otpModel = new OtpModel();
            $otpModel->save($otpObject);
            $id_otp = $otpModel->getInsertID();
            $this->sendEmailOtp($email, $kode_otp);
            dd(json_encode(['status' => 'success', 'id_otp' => $id_otp, 'csrf' => csrf_hash()]));
        }
    }

    private function sendEmailOtp($emailUser, $kode_otp)
    {
        $message = 'Pengiriman kode OTP berhasil. Kode OTP anda adalah ' . $kode_otp;
        $email = \Config\Services::email();
        $email->setFrom('creadycelgie03@gmail.com', 'Konfirmasi Kode OTP');
        $email->setTo((string) $emailUser);
        $email->setSubject('Si Kosku - Konfirmasi Kode OTP');
        $email->setMessage($message); //your message here
        $email->send();
        $email->printDebugger(['headers']);
    }
}
