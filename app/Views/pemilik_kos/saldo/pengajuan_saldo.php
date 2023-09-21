<?= $this->extend('pemilik_kos/layout/template-saldo'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pengajuan Penarikan Saldo</h4>
            <hr>

            <?php if (@$_SESSION['limit']) { ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: '<?= session("limit") ?>',
                        footer: '<span style="color:red">*Pengajuan penarikan saldo tidak boleh melebihi limit saldo</span>'
                    })
                </script>
            <?php unset($_SESSION['limit']);
            } ?>

            <?php if (@$_SESSION['otp']) { ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: '<?= session("otp") ?>',
                        footer: '<span style="color:red">*Tunggu hingga kode OTP diverifikasi</span>'
                    })
                </script>
            <?php unset($_SESSION['otp']);
            } ?>

            <script>
                function submitForm(form) {
                    Swal.fire({
                        title: "Konfirmasi Pengajuan",
                        text: "Apakah anda yakin data yang diisi sudah benar semua?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ya',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "Batal"

                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                    return false;
                }
            </script>

            <div class="content">
                <form action="/saldo/pengajuan" method="post" onsubmit="return submitForm(this);">
                    <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                        <tr>
                            <td width="20%">No Rekening<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="number" name="norekening" class="form-control" autocomplete="off" autofocus="" required></td>
                        </tr>
                        <tr>
                            <td>Nama Rekening<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="namarekening" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Bank<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td>
                                <select class="form-select form-select-lg" name="bank" required>
                                    <option value="">-- Pilih Bank --</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Penarikan<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="number" name="jumlah" id="jumlah" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>(jumlah penarikan saldo minimal Rp 50.000 dan maksimal Rp 5.000.000)</td>
                        </tr>
                        <tr>
                            <td>Email<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="email" name="email" id="email" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Kode OTP<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <input type="hidden" name="id_otp">
                            <input type="hidden" name="id_pengajuan_saldo" class="form-control" autocomplete="off">
                            <input type="hidden" name="otp_validation" value="invalid">
                            <td><input type="text" class="input-group-text mt-4" name="kode_otp" id="kode_otp" autocomplete="off" required><button type="button" class="btn btn-dark btn-sm" style="margin-left:215px;margin-top:-70px;" onclick="sendOtpRequest()">KIRIM KODE</button></td>
                        </tr>
                    </table>
                    <div align="center">
                        <button type="submit" class="btn btn-primary btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:40px;background-color:#248AFD">
                            <i class="ti-save btn-icon-prepend"></i>SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var timer = null;
        $('#jumlah').keyup(function() {
            clearTimeout(timer);
            timer = setTimeout(validasiJumlahPenarikan, 1000)
        });
        $('#kode_otp').keyup(function() {
            clearTimeout(timer);
            timer = setTimeout(otpValidation, 5000) //timeout user ketik otp 
        })
    })

    function validasiJumlahPenarikan() {
        let jumlahPenarikan = $('input[name=jumlah]').val();
        if (jumlahPenarikan < 50000) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Jumlah penarikan saldo minimal Rp 50.000'
            })
            $('input[name=jumlah]').val('');
            $('input[name=jumlah]').focus();
            return false;
        } else if (jumlahPenarikan > 5000000) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Jumlah penarikan saldo maksimal Rp 5.000.000'
            })
            $('input[name=jumlah]').val('');
            $('input[name=jumlah]').focus();
            return false;
        } else {
            return true;
        }
    }

    function formValidation() {
        let otpValidation = $('input[name=otp_validation]').val();
        if (otpValidation == 'invalid') {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Kode OTP tidak valid, silahkan lakukan validasi OTP terlebih dahulu'
            })
            return false;
        } else {
            return submitForm(this);
        }
    }

    function otpValidation() {
        let kodeOtp = $('input[name=kode_otp]').val();
        let idOtp = $('input[name=id_otp]').val();
        if (kodeOtp == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Kode OTP tidak boleh kosong'
            })
            $('input[name=kode_otp]').focus();
        } else {
            $.ajax({
                url: '/otp/verify',
                type: 'POST',
                data: {
                    kode_otp: kodeOtp,
                    id_otp: idOtp
                },
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 'success' && response.otpValidation == 'valid') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Kode OTP berhasil diverifikasi'
                        })
                        $('#kode_otp').attr("disabled", true);
                        $('input[name=otp_validation]').val('valid');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Kode OTP tidak valid'
                        })
                        $('input[name=otp_validation').val('invalid');
                        $('input[name=kode_otp]').val('');
                        $('input[name=kode_otp]').focus();
                    }
                },
                error: function(response) {
                    response = JSON.parse(response);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Kode OTP gagal diverifikasi \n Error : ' + error.responseJSON.message
                    })
                },
                timeout: 30000
            })
            return true;
        }
    }

    function sendOtpRequest() {
        let email = $('input[name=email]').val();
        if (email == '' || email == null) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Email tidak boleh kosong'
            })
        } else {
            $.ajax({
                url: '/otp',
                type: 'POST',
                data: {
                    email: email
                },
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Kode OTP berhasil dikirim ke email anda'
                        })
                        $('input[name=id_otp]').val(response.id_otp);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Kode OTP gagal dikirim ke email anda'
                        })
                    }
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Kode OTP gagal dikirim ke email anda \n Error : ' + error.responseJSON.message
                    })
                },
                timeout: 30000
            });
        }
    }
</script>

<?= $this->endSection(); ?>