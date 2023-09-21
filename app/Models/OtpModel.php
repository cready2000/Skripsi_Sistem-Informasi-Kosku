<?php

namespace App\Models;

use CodeIgniter\Model;

class OtpModel extends Model
{
    protected $table = 'otp';
    protected $primaryKey = 'id_otp';
    protected $allowedFields = [
        'id_otp',
        'kode_otp',
        'email'
    ];

    public function verifikasiOtp($kode_otp, $id_otp)
    {
        $otpObject = $this->where('id_otp', $id_otp)->first();
        if ($otpObject) {
            if ($otpObject['kode_otp'] == $kode_otp) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
