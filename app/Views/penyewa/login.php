<?= $this->extend('penyewa/layout/template-login'); ?>

<?= $this->section('content'); ?>

<script type="text/javascript">
    function lihat() {
        var x = document.getElementById("InputPassword");
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
                        <h2>Login Penyewa</h2>
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-3">
                            <div class="card border-0 shadow rounded-3 mb-5">
                                <div class="card-body p-4 p-sm-4">
                                    <h5 class="card-title text-center mb-5 fw-light fs-5">Silahkan Masukkan Email dan Password Anda</h5>
                                    <?php if (session()->getFlashdata('msg')) : ?>
                                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                                    <?php endif; ?>
                                    <form action="/login/auth" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" class="form-control" id="InputEmail" placeholder="nama@gmail.com" autocomplete="off" autofocus="" required>
                                            <label for="InputEmail">Email</label>
                                        </div>
                                        <div class="form-floating mb-3" align="left">
                                            <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password" autocomplete="off" pattern=".{8,12}" required title="8 to 12 characters">
                                            <label for="InputPassword">Password</label>
                                            <input type="checkbox" class="mt-2" onclick="lihat()"> Tampilkan Password
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Login</button>
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