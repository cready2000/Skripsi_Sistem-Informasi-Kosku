<?= $this->extend('penyewa/layout/template2'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2><?= $title; ?></h2>
                    </div>
                    <?php foreach ($datakos as $dk) : ?>
                        <div class="container">
                            <div class="row">
                                <div class="card mb-3" style="margin:0 auto;max-width:50rem;">
                                    <div class="card-body">
                                        <h6>
                                            <div class="card-header" style="background-color: #dadada;float:left;border: none"><?= $dk['GENDER_KOS']; ?></div>
                                        </h6><br>
                                        <img class="img-thumbnail" style="width:450px;height:350px;margin-bottom:10px;display:block;margin-left:auto; margin-right:auto" src="<?= base_url() . "/upload/gambar_kos/" . $dk['FILE_GAMBAR_KOS']; ?>">
                                        <center>
                                            <h4 class="card-title" style="font-weight:bold;margin-left:auto; margin-right:auto"><?= $dk['NAMA_KOS']; ?></h4>
                                            <h6 class="card-title" style="font-style:italic">Jumlah Kamar : <?= $dk['JUMLAH_KAMAR_KOS']; ?></h6>
                                            <div class="mb-5">
                                                <a href="<?= base_url('lihat-kamar/' . $dk['NAMA_KOS']) ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">LIHAT KAMAR</button></a>
                                            </div>
                                        </center>
                                        <h6 class="card-text">Alamat : <?= $dk['ALAMAT_KOS']; ?></h6>
                                        <h6 class="card-text">(Wilayah <?= $dk['NAMA_WILAYAH']; ?>)</h6>
                                        <h6 class="card-text">Radius : <?= $dk['JARAK_RADIUS']; ?></h6><br>
                                        <h6 class="card-text" style="font-weight:bold">Fasilitas :</h6>
                                        <h6 class="card-text" style="font-weight:bold"><?= $dk['FASILITAS_KOS']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>