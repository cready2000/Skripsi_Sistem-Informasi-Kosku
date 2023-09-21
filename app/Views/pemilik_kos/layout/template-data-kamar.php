<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Informasi Kosku (Si Kosku)</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/template/pemilik_kos/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="/template/pemilik_kos/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/template/pemilik_kos/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/template/pemilik_kos/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/template/pemilik_kos/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/template/pemilik_kos/assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/template/pemilik_kos/assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/template/pemilik_kos/assets/images/logo-sikosku4.png" />
    <!-- Sweet Alert -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <script>
        $(document).on("click", "#alert_notif2", function() {
            var link = document.location.origin + "/login/logout2";
            var infoLogout2 = document.location.origin + "/login/infoLogout2";
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
                            document.location = infoLogout2;
                        },
                    });
                    // TUTUP jquery logout
                } else {}
            });
        });
    </script>

    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="<?= base_url('pemilik-kos') ?>"><img src="/template/pemilik_kos/assets/images/logo-sikosku2.png" class="ml-3" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url('pemilik-kos') ?>"><img src="/template/pemilik_kos/assets/images/logo-sikosku3.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <div style="color: black;padding: 10px 50px 5px 825px;font-size: 16px;">
                    Akses Terakhir : <?php date_default_timezone_set('Asia/Jakarta');
                                        echo date("d M Y, ") ?>
                    <div class="d-inline" id="jam" style="color: black;font-size: 16px;"></div>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="/template/pemilik_kos/assets/images/faces/human.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="<?= base_url('pemilik-kos/ubah-profil') ?>">
                                <i class="ti-user"></i>
                                Ubah Profil
                            </a>
                            <a class="dropdown-item" href="<?= base_url('pemilik-kos/ubah-password') ?>">
                                <i class="ti-lock"></i>
                                Ubah Password
                            </a>
                            <a class="dropdown-item" id="alert_notif2">
                                <i class=" ti-power-off"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik-kos">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/data-kos">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Data Kos</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/data-kamar">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Data Kamar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('data-penyewa') ?>">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Data Penyewa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/saldo">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Saldo</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <?= $this->renderSection('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <strong>Si Kosku</strong>. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="/template/pemilik_kos/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/template/pemilik_kos/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/template/pemilik_kos/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="/template/pemilik_kos/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="/template/pemilik_kos/assets/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/template/pemilik_kos/assets/js/off-canvas.js"></script>
    <script src="/template/pemilik_kos/assets/js/hoverable-collapse.js"></script>
    <script src="/template/pemilik_kos/assets/js/template.js"></script>
    <script src="/template/pemilik_kos/assets/js/settings.js"></script>
    <script src="/template/pemilik_kos/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/template/pemilik_kos/assets/js/dashboard.js"></script>
    <script src="/template/pemilik_kos/assets/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>