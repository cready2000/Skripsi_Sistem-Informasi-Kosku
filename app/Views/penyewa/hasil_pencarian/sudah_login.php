<?= $this->extend('penyewa/layout/template-sudah-login3'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="section-headline text-center">
                    <h2><?= $title; ?></h2><br>
                    <?php echo $jumlah; ?>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($datakos as $dk) : ?>
                                <div class="card mt-5 mx-auto" style="max-width:30rem;">
                                    <div class="card-body">
                                        <h6>
                                            <div class="card-header" style="background-color: #dadada;float:left;border: none"><?= $dk['GENDER_KOS']; ?></div>
                                        </h6><br><br>
                                        <img class="card-img-top mb-3" src="<?= base_url() . "/upload/gambar_kos/" . $dk['FILE_GAMBAR_KOS']; ?>">
                                        <h4 class="card-title" style="font-weight:bold"><?= $dk['NAMA_KOS']; ?></h4>
                                        <h6 class="card-title" style="font-weight:bold">(<?= $dk['ALAMAT_KOS']; ?>)</h6>
                                        <h6 class="card-text"><?= $dk['NAMA_WILAYAH']; ?>, <?= $dk['JARAK_RADIUS']; ?></h6><br>
                                        <h6 class="card-text" style="color:#949494"><?= $dk['FASILITAS_KOS']; ?></h6>
                                    </div>
                                    <div class="mb-3" align="center">
                                        <a href="<?= base_url('penyewa/detail-kos/' . $dk['NAMA_KOS']) ?>"><button class="btn btn-dark" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">DETAIL KOS</button></a>
                                        <a href="<?= base_url('penyewa/lihat-kamar/' . $dk['NAMA_KOS']) ?>"><button class="btn btn-primary" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">LIHAT KAMAR</button></a>
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

<?= $this->endSection(); ?>