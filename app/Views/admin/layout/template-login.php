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
    <!-- Sweet Alert -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
</head>

<body>

    <?php if (@$_SESSION['logout']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session("logout") ?>'
            })
        </script>
    <?php unset($_SESSION['logout']);
    } ?>

    <?= $this->renderSection('content'); ?>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/template/admin/assets/vendors/js/vendor.bundle.base.js"></script>
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