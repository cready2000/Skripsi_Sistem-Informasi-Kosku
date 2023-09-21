<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Informasi Kosku (Si Kosku)</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/template/admin/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="/template/admin/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/template/admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/template/admin/assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/template/admin/assets/images/logo-sikosku4.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="/template/admin/assets/images/logo-sikosku2.png" alt="logo">
                            </div>
                            <h4>Registrasi Admin</h4>
                            <h6 class="font-weight-light">Silahkan masukkan data Anda.</h6>
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                            <?php endif; ?>
                            <form class="pt-3" action="/registrasi/simpan3" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" id="InputUsername" placeholder="Username" autofocus="" autocomplete="off" value="<?= set_value('username') ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="password" class="form-control form-control-lg" id="InputPassword" placeholder="Password" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="konfpassword" class="form-control form-control-lg" id="KonfirmasiPassword" placeholder="Konfirmasi Password" autocomplete="off" required>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">REGISTRASI</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Sudah punya akun? <a href="<?= base_url('login/admin') ?>" class="text-primary">Login Disini</a>
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
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/template/admin/assets/js/off-canvas.js"></script>
    <script src="/template/admin/assets/js/hoverable-collapse.js"></script>
    <script src="/template/admin/assets/js/template.js"></script>
    <script src="/template/admin/assets/js/settings.js"></script>
    <script src="/template/admin/assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>