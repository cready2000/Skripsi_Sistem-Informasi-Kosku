<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (@$_SESSION['ubah3']) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?= session("ubah3") ?>'
        })
    </script>
<?php unset($_SESSION['ubah3']);
} ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Beranda</h4>
            <hr>
            <h4>Selamat Datang <?= $username; ?>,</h4><br>
            <div class="row">
                <div class="col-md-3 mb-4 mx-auto stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Pemilik Kos</p>
                            <p class="fs-30 mb-2"><?= $totalpemilikkos; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 mx-auto stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Penyewa</p>
                            <p class="fs-30 mb-2"><?= $totalpenyewa; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 mx-auto stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Kos</p>
                            <p class="fs-30 mb-2"><?= $totalkos; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 mx-auto stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Total Kamar</p>
                            <p class="fs-30 mb-2"><?= $totalkamar; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="margin-bottom:0px;" align="justify">Sistem Informasi Kosku (Si Kosku) merupakan sebuah sistem berbasis website yang berfungsi untuk mempermudah user dalam penggunaannya dan juga sangat menguntungkan bagi pemilik kos karena tidak perlu lagi untuk mencetak brosur sehingga akan memudahkan dalam memberikan informasi yang lengkap mengenai tempat indekos di area Universitas Pembangunan Nasional “Veteran” Jawa Timur.</h4><br>
            <h4>Terdapat beberapa menu pada tampilan admin yaitu:</h4>
            <div>
                <h4>1. Data Pemilik Kos</h4>
            </div>
            <div>
                <h4>2. Pembayaran</h4>
            </div>
            <div>
                <h4>3. Penarikan Saldo</h4>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>