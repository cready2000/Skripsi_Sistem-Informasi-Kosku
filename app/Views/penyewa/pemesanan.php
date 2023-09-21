<?= $this->extend('penyewa/layout/template-sudah-login2'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Pemesanan</h2>
                    </div>
                    <div class="col-sm-9 col-md-7 col-lg-10 mx-auto mt-3">
                        <div class="card border-0 shadow rounded-3 mb-5">
                            <div class="card-body p-5 p-sm-5">
                                <form action="<?= base_url('pembayaran') ?>" method="post">
                                    <div class="content">
                                        <table class="table-form mt-2" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px">
                                            <input type="hidden" name="id_penyewa" value="<?= $penyewa['ID_PENYEWA']; ?>">
                                            <tr>
                                                <td width="10%">Nama</td>
                                                <td width="1%">:</td>
                                                <td><?= $penyewa['NAMA_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td width="2%">:</td>
                                                <td><?= $penyewa['EMAIL_PENYEWA']; ?></td>
                                            </tr>
                                        </table>
                                    </div><br>
                                    <?php foreach ($pemesanan as $p) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-hover mt-3">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Nama Kos</th>
                                                        <th>Nama Kamar</th>
                                                        <th>Tipe Kos</th>
                                                        <th>Tanggal Menempati</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr align="center">
                                                        <input type="hidden" name="id_kos" value="<?= $p['ID_KOS']; ?>">
                                                        <input type="hidden" name="id_kamar" value="<?= $p['ID_KAMAR']; ?>">
                                                        <td><?= $p['NAMA_KOS']; ?></td>
                                                        <td><?= $p['NAMA_KAMAR']; ?></td>
                                                        <td><?= $p['TIPE_KAMAR']; ?></td>
                                                        <td><input type="date" name="tanggal_pemesanan" required></td>
                                                        <td>Rp <?= number_format($p['HARGA_KAMAR']); ?></td>
                                                        <input type="hidden" name="tanggal_input">
                                                        <input type="hidden" name="total_pemesanan" value="<?= $p['HARGA_KAMAR']; ?>">
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endforeach; ?>
                                    <div align="right" style="margin-top: 10px;">
                                        <button class="btn btn-primary" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">LANJUTKAN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>