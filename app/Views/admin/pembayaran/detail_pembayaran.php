<?= $this->extend('admin/layout/template-pembayaran'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Pembayaran</h4>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <?php foreach ($pembayaran as $p) : ?>
                        <img class="img-thumbnail mb-3" style="margin-top:20px" src="<?= base_url() . "/upload/bukti_pembayaran/" . $p['BUKTI_PEMBAYARAN']; ?>">
                </div>
                <div class="col-md-7">
                    <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                        <tr>
                            <td width="30%">ID</td>
                            <td width="2%">:</td>
                            <td><?= $p['ID_PEMBAYARAN']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Rekening</td>
                            <td width="2%">:</td>
                            <td><?= $p['NO_REKENING_PENYEWA']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Rekening</td>
                            <td width="2%">:</td>
                            <td><?= $p['NAMA_REKENING_PENYEWA']; ?></td>
                        </tr>
                        <tr>
                            <td>Bank</td>
                            <td width="2%">:</td>
                            <td><?= $p['BANK_PENYEWA']; ?></td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td width="2%">:</td>
                            <td><?= $p['METODE_PEMBAYARAN']; ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td width="2%">:</td>
                            <td>Rp <?= number_format($p['JUMLAH_PEMBAYARAN']); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td width="2%">:</td>
                            <td><?= $p['TANGGAL_PEMBAYARAN']; ?></td>
                        </tr>
                        <table class=" table table-hover" style="margin-top:20px">
                            <thead>
                                <tr align="center">
                                    <th>ID Penyewa</th>
                                    <th>ID Kamar</th>
                                    <th>Nama Penyewa</th>
                                    <th>Nama Kamar</th>
                                    <th>Tipe Kamar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td><?= $p['ID_PENYEWA']; ?></td>
                                    <td><?= $p['ID_KAMAR']; ?></td>
                                    <td><?= $p['NAMA_PENYEWA']; ?></td>
                                    <td><?= $p['NAMA_KAMAR']; ?></td>
                                    <td><?= $p['TIPE_KAMAR']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach; ?>
                    </table>
                </div>
                <div align="center">
                    <a href="<?= base_url('pembayaran') ?>"><button class="btn btn-dark btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:20px;background-color:#212529"><i class="ti-arrow-left btn-icon-prepend"></i>KEMBALI</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>