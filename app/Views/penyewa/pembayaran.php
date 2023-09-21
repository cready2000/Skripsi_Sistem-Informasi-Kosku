<?= $this->extend('penyewa/layout/template-sudah-login2'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Pembayaran</h2>
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-3">
                            <div class="card border-0 shadow rounded-3 mb-5">
                                <div class="card-body p-4 p-sm-4">
                                    <form action="<?= base_url('simpan-pembayaran') ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>

                                        <h5 class="card-title text-center mb-4 fw-light fs-5">Silahkan Masukkan Data Pembayaran Anda</h5>
                                        <?php if (isset($validation)) : ?>
                                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                        <?php endif; ?>
                                        <?php foreach ($pemesanan as $p) : ?>
                                            <h5 class="card-title mb-4 fw-bold fs-4">Total : Rp <?= number_format($p['HARGA_KAMAR']); ?></h5>
                                            <div align="left">
                                                <span>Berikut No Rekening Admin Si Kosku :</span><br>
                                                <span style="font-weight: bold">BNI</span><br>
                                                <span style="font-weight: bold">0383741099</span><br>
                                                <span style="font-weight: bold">Cready Celgie Gildbrandsen</span><br><br>
                                            </div>
                                            <input type="hidden" name="id_kamar" value="<?= $id_kamar; ?>">
                                            <input type="hidden" name="jumlah" value="<?= $p['HARGA_KAMAR']; ?>">
                                        <?php endforeach; ?>
                                        <input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan; ?>">
                                        <div class="mb-3" align="justify">
                                            <span style="color:#FFC100">Catatan : Jika Anda memilih metode pembayaran COD mohon isi (-) pada no rekening dan nama rekening serta mengisi foto terbaru diri Anda pada bukti pembayaran.</span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="InputNoRekening" style="float:left;margin-left:12px">No. Rekening</label>
                                            <input type="text" name="norekening" class="form-control" id="InputNoRekening" placeholder="Isi Nomor Rekening Anda" autocomplete="off" autofocus="" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="InputNamaRekening" style="float:left;margin-left:12px">Nama Rekening</label>
                                            <input type="text" name="namarekening" class="form-control" id="InputNamaRekening" placeholder="Isi Nama Rekening Anda" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="InputBank" style="float:left;margin-left:12px">Bank</label>
                                            <select class="form-select mb-3" name="bank" id="InputBank" aria-label="Select">
                                                <option value="">-- Pilih Bank --</option>
                                                <option value="BCA">BCA</option>
                                                <option value="BNI">BNI</option>
                                                <option value="BRI">BRI</option>
                                                <option value="MANDIRI">MANDIRI</option>
                                                <option value="Tidak Memilih">TIDAK MEMILIH</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="InputMetode" style="float:left;margin-left:12px">Metode Pembayaran</label>
                                            <select class="form-select mb-3" name="metode" id="InputMetode" aria-label="Select">
                                                <option value="">-- Pilih Metode Pembayaran --</option>
                                                <option value="Transfer Manual">Transfer Manual</option>
                                                <option value="M-Banking">M-Banking</option>
                                                <option value="COD">Cash On Delivery (COD)</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="InputformFile" style="float:left;margin-left:12px">Bukti Pembayaran</label>
                                            <input class="form-control" type="file" name="bukti" id="formFile">
                                        </div>
                                        <center> <a href="<?= base_url('riwayat') ?>"><button class="btn btn-primary" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">BAYAR</button></a> </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>