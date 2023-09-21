<?= $this->extend('pemilik_kos/layout/template-data-kamar'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Data Kamar</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($datakamar as $dk) : ?>
                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px;">
                            <tr>
                                <td width="20%">ID</td>
                                <td width="1%">:</td>
                                <td><?= $dk['ID_KAMAR']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Kamar</td>
                                <td width="1%">:</td>
                                <td><?= $dk['NAMA_KAMAR']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Kos</td>
                                <td width="1%">:</td>
                                <td><?= $dk['NAMA_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>Tipe Kamar</td>
                                <td width="1%">:</td>
                                <td><?= $dk['TIPE_KAMAR']; ?></td>
                            </tr>
                            <tr>
                                <td>Fasilitas</td>
                                <td width="1%">:</td>
                                <td><?= $dk['FASILITAS_KAMAR']; ?></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td width="1%">:</td>
                                <td><?= $dk['STOK_KAMAR']; ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td width="1%">:</td>
                                <td>Rp <?= number_format($dk['HARGA_KAMAR']); ?></td>
                            </tr>
                            <tr>
                                <td>Dokumentasi</td>
                                <td width="1%">:</td>
                            </tr>
                        </table>
                        <?php if ($dk['LINK_VIDEO_KAMAR'] != NULL) { ?>
                            <iframe width="738" height="400" src=<?= $dk['LINK_VIDEO_KAMAR']; ?> frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="margin-top:20px;margin-bottom:10px;display:block;margin-left:auto; margin-right:auto" allowfullscreen></iframe>
                        <?php } else { ?>
                            <div style="margin-top:10px;"></div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
                <?php foreach ($datagambar as $dg) : ?>
                    <img class="img-thumbnail mb-3" style="width:369px;height:400px;margin-top:20px;margin-left:auto; margin-right:auto" src="<?= base_url() . "/upload/gambar_kamar/" . $dg['FILE_GAMBAR_KAMAR']; ?>">
                <?php endforeach; ?>
                <div align="center">
                    <a href="<?= base_url('data-kamar') ?>"><button class="btn btn-dark btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:20px;background-color:#212529"><i class="ti-arrow-left btn-icon-prepend"></i>KEMBALI</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>