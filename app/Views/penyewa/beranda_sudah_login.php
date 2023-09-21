<?= $this->extend('penyewa/layout/template-sudah-login'); ?>

<?= $this->section('content'); ?>

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

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Radius</h2>
                        <div class="container">
                            <div class="row">
                                <?php foreach ($radiuswilayah as $rw) : ?>
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <img src="/template/penyewa/assets/img/beranda/location.png" class="card-img-top" alt="gambar">
                                            <h3 class="card-title"><?= $rw['JARAK_RADIUS']; ?></h3><br>
                                            <a href="<?= base_url('penyewa/radius/' . $rw['JARAK_RADIUS']) ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">LIHAT KOS</button></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Wilayah</h2>
                        <div class="container ">
                            <div class="row">
                                <?php foreach ($radiuswilayah as $rw) : ?>
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <img src="/template/penyewa/assets/img/beranda/region.png" class="card-img-top" alt="gambar">
                                            <h3 class="card-title"><?= $rw['NAMA_WILAYAH']; ?></h3> <br>
                                            <a href="<?= base_url('penyewa/wilayah/' . $rw['NAMA_WILAYAH']) ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">LIHAT KOS</button></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Rekomendasi</h2>
                        <?php foreach ($rekomendasi as $rec) : ?>
                            <div class="card" style="width: 20rem;">
                                <img src="<?= base_url() . "/upload/gambar_kos/" . $rec['file_gambar_kos']; ?>" class="card-img-top" alt="gambar">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $rec['nama_kos']; ?></h3>
                                    <h6 class="card-title"><?= $rec['alamat_kos']; ?></h6><br>
                                    <a href="<?= base_url('penyewa/detail-kos/' . $rec['nama_kos']) ?>"><button class="btn btn-dark" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">DETAIL KOS</button></a>
                                    <a href="<?= base_url('penyewa/lihat-kamar/' . $rec['nama_kos']) ?>"><button class="btn btn-primary" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">LIHAT KAMAR</button></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>