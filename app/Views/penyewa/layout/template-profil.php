<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Informasi Kosku (Si Kosku)</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/template/login_dan_registrasi/penyewa/assets/img/logo-sikosku4.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/template/login_dan_registrasi/penyewa/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/template/login_dan_registrasi/penyewa/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/login_dan_registrasi/penyewa/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/template/login_dan_registrasi/penyewa/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/template/login_dan_registrasi/penyewa/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/template/login_dan_registrasi/penyewa/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/template/login_dan_registrasi/penyewa/assets/css/style.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

    <!-- =======================================================
  * Template Name: eBusiness - v4.7.0
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <script>
        $(document).on("click", "#alert_notif", function() {
            var link = document.location.origin + "/login/logout";
            var infoLogout = document.location.origin + "/login/infoLogout";
            Swal.fire({
                title: "Konfirmasi Logout",
                text: "Apakah anda yakin keluar dari sistem?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: '<i class="fas fa-sign-out-alt"></i> Keluar',
                cancelButtonText: '<i class="fas fa-times"></i> Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // BUKA jquery logout
                    $.ajax({
                        type: "GET",
                        url: link,
                        success: function() {
                            document.location = infoLogout;
                        },
                    });
                    // TUTUP jquery logout
                } else {}
            });
        });
    </script>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <h1><a href="<?= base_url('penyewa') ?>"><img src="/template/login_dan_registrasi/penyewa/assets/img/logo-sikosku4.png" class="mb-2" width="75" alt="logo" /><span>Si</span> Kosku</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="template/penyewa/assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <form method="GET" action="/penyewa/hasil_pencarian" class="navbar-form navbar-left">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="cari" placeholder="Cari nama kos atau wilayah" size="50" autocomplete="off">
                            <div class="input-group-append">
                                <a href="#"><button class="btn" style="background-color:#3ec1d5;color:white" type="Submit">CARI KOS</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="<?= base_url('penyewa') ?>">Beranda</a></li>
                    <li><a class="nav-link" href="<?= base_url('penyewa/riwayat') ?>">Riwayat</a></li>
                    <li><a class="nav-link" href="<?= base_url('penyewa/radius') ?>">Radius</a></li>
                    <li><a class="nav-link" href="<?= base_url('penyewa/wilayah') ?>">Wilayah</a></li>
                    <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('penyewa/profil') ?>">Lihat Profil</a></li>
                            <li><a href="<?= base_url('penyewa/ubah-password') ?>">Ubah Password</a></li>
                            <li><a id="alert_notif">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><br><br><!-- End Header -->

    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                Copyright © 2022 <strong>Si Kosku</strong>. All Rights Reserved.
                            </p>
                        </div>
                        <div class="credits">
                            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
                            Designed by <a href="https://github.com/cready2000">Cready2000</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/template/login_dan_registrasi/penyewa/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/template/login_dan_registrasi/penyewa/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/template/login_dan_registrasi/penyewa/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/template/login_dan_registrasi/penyewa/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/template/penyewa/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/template/login_dan_registrasi/penyewa/assets/js/main.js"></script>

</body>

</html>