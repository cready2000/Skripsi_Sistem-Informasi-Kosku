<?= $this->extend('penyewa/layout/template-riwayat'); ?>

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
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-thumbnail" style="width:600px;height:330px;margin-top:27px;margin-bottom:30px;" src="<?= base_url() . "/upload/bukti_pembayaran/" . $dk['BUKTI_PEMBAYARAN']; ?>">
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow rounded-3" style="margin-top:28px;">
                                    <div class="card-body p-4 p-sm-4 mb-4">
                                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-left:20px">
                                            <tr>
                                                <td width="40%">ID</td>
                                                <td width="2%">:</td>
                                                <td><?= $dk['ID_PEMBAYARAN']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Metode Pembayaran</td>
                                                <td width="2%">:</td>
                                                <td><?= $dk['METODE_PEMBAYARAN']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No Rekening</td>
                                                <td width="2%">:</td>
                                                <td><?= $dk['NO_REKENING_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Rekening</td>
                                                <td width="2%">:</td>
                                                <td><?= $dk['NAMA_REKENING_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bank</td>
                                                <td width="2%">:</td>
                                                <td><?= $dk['BANK_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Pembayaran</td>
                                                <td width="2%">:</td>
                                                <td>Rp <?= number_format($dk['JUMLAH_PEMBAYARAN']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Pembayaran</td>
                                                <td width="2%">:</td>
                                                <td><?= $dk['TANGGAL_PEMBAYARAN']; ?></td>
                                            </tr>
                                        </table>
                                        <div class="d-grid mt-5">
                                            <center>
                                                <a href="<?= base_url('penyewa/riwayat-pembayaran/cetak-nota/' . $dk['ID_PEMBAYARAN']) ?>"><button class="btn btn-primary btn-login text-uppercase fw-bold" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;" type="submit">LIHAT NOTA</button></a>
                                            </center>
                                        </div>
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