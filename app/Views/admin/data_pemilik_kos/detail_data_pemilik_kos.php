<?= $this->extend('admin/layout/template-data-pemilik-kos'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Data Pemilik Kos</h4>
            <hr>
            <div class="content">
                <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                    <?php foreach ($pemilikkos as $pk) : ?>
                        <tr>
                            <td width="20%">ID</td>
                            <td width="1%">:</td>
                            <td><?= $pk['ID_PEMILIK_KOS']; ?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td width="1%">:</td>
                            <td><?= $pk['NIK_PEMILIK_KOS']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td width="1%">:</td>
                            <td><?= $pk['NAMA_PEMILIK_KOS']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td width="1%">:</td>
                            <td><?= $pk['NO_TELEPON_PEMILIK_KOS']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td width="1%">:</td>
                            <td><?= $pk['EMAIL_PEMILIK_KOS']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <table class="table table-hover" style="margin-top:20px">
                        <thead>
                            <tr align="center">
                                <th>ID Kos</th>
                                <th>Nama Kos</th>
                                <th>Alamat Kos</th>
                                <th>Jumlah Kamar</th>
                                <th>Gender Kos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pemilikkos as $pk) : ?>
                                <tr align="center">
                                    <td><?= $pk['ID_KOS']; ?></td>
                                    <td><?= $pk['NAMA_KOS']; ?></td>
                                    <td><?= $pk['ALAMAT_KOS']; ?></td>
                                    <td><?= $pk['JUMLAH_KAMAR_KOS']; ?></td>
                                    <td><?= $pk['GENDER_KOS']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </table>
                <div align="center">
                    <a href="<?= base_url('data-pemilik-kos') ?>"><button class="btn btn-dark btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:20px;background-color:#212529"><i class="ti-arrow-left btn-icon-prepend"></i>KEMBALI</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>