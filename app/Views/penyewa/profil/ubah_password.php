<?= $this->extend('penyewa/layout/template-profil'); ?>

<?= $this->section('content'); ?>

<script type="text/javascript">
    function lihat() {
        var x = document.getElementById("KonfirmasiPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Ubah Password</h2>
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-3">
                            <div class="card border-0 shadow rounded-3 mb-5">
                                <div class="card-body p-4 p-sm-4">
                                    <h5 class="card-title text-center mb-5 fw-light fs-5">Silahkan Ubah Password Anda</h5>
                                    <div style="color: red;"><?= session()->getFlashdata('errors') != null ? session()->getFlashdata('errors') : ""; ?></div>
                                    <?php foreach ($penyewa as $p) : ?>
                                        <form action="/penyewa/ubah-password" method="post">
                                            <div class="form-floating mb-3">
                                                <input type="hidden" name="id" class="form-control" id="InputID" placeholder="ID" autocomplete="off" value="<?= $p['ID_PENYEWA'] ?>" readonly>
                                                <label for="InputID">ID</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="password" class="form-control" id="InputPassword" placeholder="Password" autocomplete="off" required>
                                                <label for="InputPassword">Password Baru</label>
                                            </div>
                                            <div class="form-floating mb-3" align="left">
                                                <input type="password" name="konfpassword" class="form-control" id="KonfirmasiPassword" placeholder="Konfirmasi Password" autocomplete="off" required>
                                                <label for="KonfirmasiPassword">Konfirmasi Password Baru</label>
                                                <input type="checkbox" class="mt-2" onclick="lihat()"> Tampilkan Password
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