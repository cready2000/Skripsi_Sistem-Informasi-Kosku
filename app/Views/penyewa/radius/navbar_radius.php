<?= $this->extend('penyewa/layout/template-radius'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container">
            <div class="row">
                <div class="section-headline text-center">
                    <h2><?= $title; ?></h2>
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card border-0 shadow rounded-3 mb-5">
                            <div class="card-body p-4 p-sm-4">
                                <div class="form-group mb-2">
                                    <label for="Radius" style="font-weight:bold;margin-bottom:10px">Pilih Radius :</label><br>
                                    <?php foreach ($radius100 as $r) : ?>
                                        <a href="<?= base_url('radius/' . $r['JARAK_RADIUS']) ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">100 Meter</button></a>
                                    <?php endforeach; ?>
                                    <?php foreach ($radius500 as $r2) : ?>
                                        <a href="<?= base_url('radius/' . $r2['JARAK_RADIUS']) ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">500 Meter</button></a>
                                    <?php endforeach; ?>
                                    <a href="<?= base_url('radius') ?>"><button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">Semua Radius</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($radius as $r) : ?>
                    <div class="card mt-5 mx-auto" style="max-width:30rem;">
                        <div class="card-body">
                            <h6>
                                <div class="card-header" style="background-color: #dadada;float:left;border: none"><?= $r['GENDER_KOS']; ?></div>
                            </h6><br><br>
                            <img class="card-img-top mb-3" src="<?= base_url() . "/upload/gambar_kos/" . $r['FILE_GAMBAR_KOS']; ?>">
                            <h4 class="card-title" style="font-weight:bold"><?= $r['NAMA_KOS']; ?></h4>
                            <h6 class="card-title" style="font-weight:bold">(<?= $r['ALAMAT_KOS']; ?>)</h6>
                            <h6 class="card-text"><?= $r['NAMA_WILAYAH']; ?>, <?= $r['JARAK_RADIUS']; ?></h6><br>
                            <h6 class="card-text" style="color:#949494"><?= $r['FASILITAS_KOS']; ?></h6>
                        </div>
                        <div class="mb-3" align="center">
                            <a href="<?= base_url('detail-kos/' . $r['NAMA_KOS']) ?>"><button class="btn btn-dark" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">DETAIL KOS</button></a>
                            <a href="<?= base_url('lihat-kamar/' . $r['NAMA_KOS']) ?>"><button class="btn btn-primary" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">LIHAT KAMAR</button></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>