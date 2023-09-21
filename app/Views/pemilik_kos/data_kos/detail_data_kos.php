<?= $this->extend('pemilik_kos/layout/template-data-kos'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Data Kos</h4>
            <hr>
            <?php foreach ($datakos as $dk) : ?>
                <div class="row">
                    <?php foreach ($data_gambar as $dg) : ?>
                        <div class="col-md-4">
                            <img class="img-thumbnail mb-3" style="margin-top:20px" src="<?= base_url() . "/upload/gambar_kos/" . $dg['FILE_GAMBAR_KOS']; ?>">
                        </div>
                    <?php endforeach; ?>
                    <div class="col-md-8">
                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px;margin-left:20px">
                            <tr>
                                <td width="20%">ID</td>
                                <td width="1%">:</td>
                                <td><?= $dk['ID_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Kos</td>
                                <td width="1%">:</td>
                                <td><?= $dk['NAMA_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>Gender Kos</td>
                                <td width="1%">:</td>
                                <td><?= $dk['GENDER_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>Wilayah</td>
                                <td width="1%">:</td>
                                <td><?= $dk['NAMA_WILAYAH']; ?></td>
                            </tr>
                            <tr>
                                <td>Radius</td>
                                <td width="1%">:</td>
                                <td><?= $dk['JARAK_RADIUS']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td width="1%">:</td>
                                <td><?= $dk['ALAMAT_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Kamar</td>
                                <td width="1%">:</td>
                                <td><?= $dk['JUMLAH_KAMAR_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>Fasilitas</td>
                                <td width="1%">:</td>
                                <td><?= $dk['FASILITAS_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td width="1%">:</td>
                                <td><?= $dk['TELEPON_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>Longitude</td>
                                <td width="1%">:</td>
                                <td><?= $dk['LONGITUDE_KOS']; ?></td>
                            </tr>
                            <tr>
                                <td>Latitude</td>
                                <td width="1%">:</td>
                                <td><?= $dk['LATITUDE_KOS']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
            <div align="center">
                <a href="<?= base_url('data-kos') ?>"><button class="btn btn-dark btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:20px;background-color:#212529"><i class="ti-arrow-left btn-icon-prepend"></i>KEMBALI</button></a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>