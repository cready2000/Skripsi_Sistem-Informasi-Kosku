<?= $this->extend('penyewa/layout/template3'); ?>

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
                    <div class="container">
                        <div class="row">
                            <?php foreach ($datakamar as $dk) : ?>
                                <div class="card mt-3" style="margin:0 auto;max-width:38rem;">
                                    <div class="card-body">
                                        <img class="img-thumbnail" style="width:250px;height:225px;margin-right:20px;float:left" src="<?= base_url() . "/upload/gambar_kamar/" . $dk['FILE_GAMBAR_KAMAR']; ?>">
                                        <h6>
                                            <div class="card-header" style="background-color: #dadada;float:left;border: none"><?= $dk['TIPE_KAMAR']; ?></div>
                                        </h6><br><br>
                                        <h4 class="card-title" style="font-weight:bold"><?= $dk['NAMA_KAMAR']; ?></h4>
                                        <h6 class="card-title" style="font-style:italic">Stok Kamar : <?= $dk['STOK_KAMAR']; ?></h6><br>
                                        <h6 class="card-text" style="color:#949494"><?= $dk['FASILITAS_KAMAR']; ?></h6>
                                        <?php if ($dk['DURASI'] == '1 Bulan') { ?>
                                            <h4 class="card-text" style="float:right;font-weight:bold">Rp <?= number_format((int)$dk['DURASI'] * $dk['HARGA_KAMAR']); ?> / bulan</h4>
                                        <?php } else { ?>
                                            <h4 class="card-text" style="float:right;font-weight:bold">Rp <?= number_format((int)$dk['DURASI'] * $dk['HARGA_KAMAR']); ?> / <?php echo (int)$dk['DURASI'] ?> bulan</h4>
                                        <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <?php if (intval($dk['STOK_KAMAR']) > 0) : ?>
                                            <a href="<?= base_url('detail-kamar/' . $dk['NAMA_KAMAR']) ?>"><button class="btn btn-dark" style="float: right;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">DETAIL KAMAR</button></a>
                                        <?php else : ?>
                                            <a href="<?= base_url('detail-kamar/' . $dk['NAMA_KAMAR']) ?>"><button class="btn btn-dark" style="float: right;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;" disabled>DETAIL KAMAR</button></a>
                                        <?php endif; ?>
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