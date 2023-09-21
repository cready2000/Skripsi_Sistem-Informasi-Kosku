<?= $this->extend('penyewa/layout/template-profil'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Ubah Profil</h2>
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-3">
                            <div class="card border-0 shadow rounded-3 mb-5">
                                <div class="card-body p-4 p-sm-4">
                                    <h5 class="card-title text-center mb-5 fw-light fs-5">Silahkan Ubah Data Anda</h5>
                                    <div style="color: red;"><?= session()->getFlashdata('errors') != null ? session()->getFlashdata('errors') : ""; ?></div><br>
                                    <?php foreach ($penyewa as $p) : ?>
                                        <form action="/penyewa/ubah-profil" method="post">
                                            <input type="hidden" name="id" value="<?= $p['ID_PENYEWA'] ?>">
                                            <div class="form-floating mb-4">
                                                <p style="font-size:15px;float:left;margin-left:12px;">1. Jenis Kelamin</p>
                                                <input type='radio' name='jk' value='Pria' style="-ms-transform: scale(1.5);-webkit-transform: scale(1.5);transform: scale(1.5);" required /> Laki-Laki <input type='radio' name='jk' value='Wanita' style="margin-left:50px;-ms-transform: scale(1.5);-webkit-transform: scale(1.5);transform: scale(1.5);" required /> Perempuan
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="nama" class="form-control" id="InputNama" placeholder="Nama Lengkap" autocomplete="off" value="<?= $p['NAMA_PENYEWA'] ?>" required>
                                                <label for="InputNama">2. Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="nik" class="form-control" id="InputNIK" placeholder="NIK" autocomplete="off" value="<?= $p['NIK_PENYEWA'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" required>
                                                <label for="InputNIK">3. NIK</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="alamat" class="form-control" id="InputAlamat" placeholder="Alamat" autocomplete="off" value="<?= $p['ALAMAT_PENYEWA'] ?>" required>
                                                <label for="InputAlamat">4. Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="telepon" class="form-control" id="InputTelepon" placeholder="Nomor Telepon" autocomplete="off" value="<?= $p['NO_TELEPON_PENYEWA'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                                <label for="InputTelepon">5. Nomor Telepon</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="email" name="email" class="form-control" id="InputEmail" placeholder="nama@gmail.com" autocomplete="off" value="<?= $p['EMAIL_PENYEWA'] ?>" required>
                                                <label for="InputEmail">6. Email</label>
                                            </div>
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">SIMPAN</button>
                                            </div>
                                        </form>
                                    <?php endforeach; ?>
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