<?= $this->extend('pemilik_kos/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Beranda</h4>
            <hr>

            <?php if (@$_SESSION['ubah']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("ubah") ?>'
                    })
                </script>
            <?php unset($_SESSION['ubah']);
            } ?>

            <?php if (@$_SESSION['ubah2']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("ubah2") ?>'
                    })
                </script>
            <?php unset($_SESSION['ubah2']);
            } ?>

            <h4>Selamat Datang <?= $name; ?>,</h4><br>
            <h4 style="margin-bottom:-1px;" align="justify">Sistem Informasi Kosku (Si Kosku) merupakan sebuah sistem berbasis website yang berfungsi untuk mempermudah user dalam penggunaannya dan juga sangat menguntungkan bagi pemilik kos karena tidak perlu lagi untuk mencetak brosur sehingga akan memudahkan dalam memberikan informasi yang lengkap mengenai tempat indekos di area Universitas Pembangunan Nasional “Veteran” Jawa Timur.</h4><br>
            <h4>Terdapat beberapa menu pada tampilan pemilik kos yaitu:</h4>
            <div>
                <h4>1. Data Kos</h4>
            </div>
            <div>
                <h4>2. Data Kamar</h4>
            </div>
            <div>
                <h4>3. Data Penyewa</h4>
            </div>
            <div>
                <h4>4. Saldo</h4>
            </div><br>
            <h4>Apabila memiliki kendala, kritik, dan saran silahkan untuk menghubungi kami.</h4>
            <table>
                <tr>
                    <td width="20%">E-mail</td>
                    <td width="1%">:</td>
                    <td><a href="mailto:18082010031@student.upnjatim.ac.id">18082010031@student.upnjatim.ac.id</a></td>
                </tr>
                <tr>
                    <td>WhatsApp</td>
                    <td width="1%">:</td>
                    <td><a href="https://wa.me/6282230013246" target="_blank">082230013246</a></td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td width="1%">:</td>
                    <td><a href="http://localhost:8081" target="_blank">http://localhost:8081</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>