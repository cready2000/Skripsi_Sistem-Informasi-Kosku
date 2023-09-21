<?= $this->extend('penyewa/layout/template-registrasi'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Registrasi Penyewa</h2>
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-3">
                            <div class="card border-0 shadow rounded-3 mb-5">
                                <div class="card-body p-4 p-sm-4">
                                    <h5 class="card-title text-center mb-5 fw-light fs-5">Silahkan Masukkan Data Anda</h5>
                                    <?php if (isset($validation)) : ?>
                                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                    <?php endif; ?>
                                    <form action="/registrasi/simpan" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nama" class="form-control" id="InputNama" placeholder="Nama Lengkap" autofocus="" autocomplete="off" value="<?= set_value('nama') ?>" required>
                                            <label for="InputNama">1. Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nik" class="form-control" id="InputNIK" placeholder="NIK" autocomplete="off" value="<?= set_value('nik') ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" required>
                                            <label for="InputNIK">2. Nomor Induk Kependudukan (NIK)</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="alamat" class="form-control" id="InputAlamat" placeholder="Alamat" autocomplete="off" value="<?= set_value('alamat') ?>" required>
                                            <label for="InputAlamat">3. Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="telepon" class="form-control" id="InputTelepon" placeholder="Nomor Telepon" autocomplete="off" value="<?= set_value('telepon') ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                            <label for="InputTelepon">4. Nomor Telepon</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="email" name="email" class="form-control" id="InputEmail" placeholder="nama@gmail.com" autocomplete="off" value="<?= set_value('email') ?>" required>
                                            <label for="InputEmail">5. Email</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <p style="font-size:15px;float:left;margin-left:12px;">6. Jenis Kelamin</p>
                                            <input type='radio' name='jk' value='Pria' style="-ms-transform: scale(1.5);-webkit-transform: scale(1.5);transform: scale(1.5);" /> Laki-Laki <input type='radio' name='jk' value='Wanita' style="margin-left:50px;-ms-transform: scale(1.5);-webkit-transform: scale(1.5);transform: scale(1.5);" /> Perempuan
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="InputKTP" style="float:left;margin-left:12px;margin-bottom:5px">7. Kartu Tanda Penduduk (KTP)</label>
                                            <input type="file" name="ktp" class="form-control" id="InputKTP" placeholder="KTP" value="<?= set_value('ktp') ?>" required>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="password" class="form-control" id="InputPassword" placeholder="Password" autocomplete="off" required>
                                            <label for="InputPassword">8. Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="konfpassword" class="form-control" id="KonfirmasiPassword" placeholder="Konfirmasi Password" autocomplete="off" required>
                                            <label for="KonfirmasiPassword">9. Konfirmasi Password</label>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-warning btn-login text-uppercase fw-bold" type="reset">Reset</button>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Registrasi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>