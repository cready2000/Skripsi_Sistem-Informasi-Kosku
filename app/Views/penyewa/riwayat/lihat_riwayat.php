<?= $this->extend('penyewa/layout/template-riwayat'); ?>

<?= $this->section('content'); ?>

<?php if (@$_SESSION['pembayaran']) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?= session("pembayaran") ?>'
        })
    </script>
<?php unset($_SESSION['pembayaran']);
} ?>

<?php if (@$_SESSION['hapus']) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?= session("hapus") ?>'
        })
    </script>
<?php unset($_SESSION['hapus']);
} ?>

<script>
    $(document).on("click", "#alert_notif_hapus", function(e) {
        e.preventDefault();
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Konfirmasi Batal Pemesanan",
            text: "Apakah anda yakin membatalkan pemesanan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal"

        }).then(result => {
            if (result.isConfirmed) {
                window.location.href = getLink
            }
        })
        return false;
    });
</script>

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
                        <div class="col-sm-9 col-md-7 col-lg-10 mx-auto mt-3">
                            <div class="card border-0 shadow rounded-3 mb-5">
                                <div class="card-body p-5 p-sm-5">
                                    <img width="275px" class="img-thumbnail" style="margin-right:20px;float:left" src="<?= base_url() . "/upload/gambar_kos/" . $dk['FILE_GAMBAR_KOS']; ?>">
                                    <h6>
                                        <div class="card-header" style="background-color: #dadada;float:left;border: none"><?= $dk['GENDER_KOS']; ?></div>
                                        <?php if ($dk['STATUS_PENYEWA'] == 'Bulan Pertama' || $dk['STATUS_PENYEWA'] == 'Lanjut') : ?>
                                            <h5 class="card-title" style="color: #57B657;margin-top: -40px;float: right;">Status Sewa : <?= $dk['STATUS_PENYEWA']; ?></h5>
                                        <?php elseif ($dk['STATUS_PEMESANAN'] == 'Belum Membayar' || $dk['STATUS_PEMESANAN'] == 'Ditolak') : ?>
                                        <?php else : ?>
                                            <h5 class="card-title" style="color:#FF4747;margin-top: -40px;float: right;">Status Sewa : <?= $dk['STATUS_PENYEWA']; ?></h5>
                                        <?php endif; ?>
                                    </h6><br><br>
                                    <h4 class="card-title" style="font-weight:bold"><?= $dk['NAMA_KOS']; ?></h4>
                                    <h6 class="card-title" style="font-weight:bold">(<?= $dk['ALAMAT_KOS']; ?>)</h6>
                                    <h6 class="card-text"><?= $dk['NAMA_WILAYAH']; ?>, <?= $dk['JARAK_RADIUS']; ?></h6><br>
                                    <h6 class="card-text" style="color:#949494"><?= $dk['FASILITAS_KOS']; ?></h6>
                                </div>
                                <?php if ($dk['METODE_PEMBAYARAN'] == 'COD' && $dk['STATUS_PEMESANAN'] == 'Belum Membayar') : ?>
                                    <div align="left">
                                        <h6 class="card-text" style="font-weight: bold;margin-left: 50px;">Silahkan menghubungi admin untuk menyelesaikan pembayaran.</h6>
                                        <h6 class="card-text" style="font-weight: bold;margin-left: 50px;">WhatsApp : <a href="https://wa.me/6282230013246" target="_blank">082230013246 (Cready)</h6>
                                    </div>
                                <?php else : ?>
                                <?php endif; ?>
                                <div class="mb-4">
                                    <?php if ($dk['STATUS_PEMESANAN'] == 'Sudah Membayar') : ?>
                                        <a href="<?= base_url('penyewa/riwayat-pembayaran') ?>"><button class="btn btn-primary" style="float: right;border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;margin-right: 40px;">LIHAT PEMBAYARAN</button></a>
                                    <?php elseif ($dk['STATUS_PEMESANAN'] == 'Ditolak') : ?>
                                        <div align="right">
                                            <h6 class="card-header" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;margin-right: 40px;background-color:#FF4747">PEMBAYARAN DITOLAK</h6>
                                        </div>
                                    <?php else : ?>
                                        <div align="right">
                                            <h6 class="card-header" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;margin-right: 40px;background-color:#FFC100">PEMBAYARAN DALAM KONFIRMASI</h6>
                                        </div>
                                    <?php endif; ?>
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