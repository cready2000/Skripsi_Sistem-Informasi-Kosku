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
                    <div class="container">
                        <div class="row">
                            <div class="card mb-3" style="margin:0 auto;max-width:50rem;">
                                <div class="card-body">
                                    <?php foreach ($datakamar as $dk) : ?>
                                        <h6>
                                            <div class="card-header" style="background-color: #dadada;float:left;border: none"><?= $dk['TIPE_KAMAR']; ?></div>
                                        </h6><br>

                                        <?php foreach ($datagambar as $dg) : ?>
                                            <img class="img-thumbnail" style="width:369px;height:400px;margin-top:10px;margin-left:auto; margin-right:auto" src="<?= base_url() . "/upload/gambar_kamar/" . $dg['FILE_GAMBAR_KAMAR']; ?>">
                                        <?php endforeach; ?>

                                        <?php if ($dk['LINK_VIDEO_KAMAR'] != NULL) { ?>
                                            <iframe width="738" height="400" src=<?= $dk['LINK_VIDEO_KAMAR']; ?> frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="margin-top:10px;margin-bottom:20px;display:block;margin-left:auto; margin-right:auto" allowfullscreen></iframe>
                                        <?php } else { ?>
                                            <div style="margin-top:20px;"></div>
                                        <?php } ?>

                                        <center>
                                            <h4 class="card-title" style="font-weight:bold;margin-left:auto; margin-right:auto"><?= $dk['NAMA_KAMAR']; ?></h4>
                                            <?php if ($dk['DURASI'] == '1 Bulan') { ?>
                                                <h5 class="card-title" style="font-weight:bold;margin-left:auto; margin-right:auto">Rp <?= number_format((int)$dk['DURASI'] * $dk['HARGA_KAMAR']); ?> / bulan</h5>
                                            <?php } else { ?>
                                                <h5 class="card-title" style="font-weight:bold;margin-left:auto; margin-right:auto">Rp <?= number_format((int)$dk['DURASI'] * $dk['HARGA_KAMAR']); ?> / <?php echo (int)$dk['DURASI'] ?> bulan</h5>
                                            <?php } ?>
                                            <h6 class="card-title" style="font-style:italic">Stok Kamar : <?= $dk['STOK_KAMAR']; ?></h6>
                                            <div class="mb-5">
                                                <?php if (intval($dk['STOK_KAMAR']) > 0) : ?>
                                                    <form onsubmit="return confirm_login();">
                                                        <button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">AJUKAN SEWA</button>
                                                    </form>
                                                <?php else : ?>
                                                    <form onsubmit="return confirm_login();">
                                                        <button class="btn" style="background: #3ec1d5;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;" disabled>AJUKAN SEWA</button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </center>
                                        <h6 class="card-text" style="font-weight:bold">Fasilitas :</h6>
                                        <h6 class="card-text"><?= $dk['FASILITAS_KAMAR']; ?></h6>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirm_login() {
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: 'Anda harus login terlebih dahulu',
            footer: '<span style="color:red">*Silahkan login terlebih dahulu untuk melakukan pemesanan</span>'
        })
        return false;
    }
</script>

<?= $this->endSection(); ?>