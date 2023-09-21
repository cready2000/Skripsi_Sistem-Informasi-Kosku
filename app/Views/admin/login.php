<?= $this->extend('admin/layout/template-login'); ?>

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

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="/template/admin/assets/images/logo-sikosku2.png" alt="logo">
                        </div>
                        <h4>Login Admin</h4>
                        <h6 class="font-weight-light">Silahkan masukkan username dan password Anda.</h6>
                        <form action="/login/auth3" method="post" class="pt-3">
                            <?php if (session()->getFlashdata('salah')) : ?>
                                <center>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('salah') ?></div>
                                </center>
                            <?php endif; ?>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-lg" id="InputUsername" placeholder="Username" autocomplete="off" autofocus="" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="InputPassword" placeholder="Password" pattern=".{8,12}" required title="8 to 12 characters">
                                <input type="checkbox" class="mt-2" onclick="lihat()"> Tampilkan Password
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<?= $this->endSection(); ?>