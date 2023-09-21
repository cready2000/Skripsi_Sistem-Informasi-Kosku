<?= $this->extend('pemilik_kos/layout/template-data-penyewa'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $title; ?></h4>
            <hr>
            <div class="content">

                <form action="/data-penyewa/simpan-lanjut-kos" method="post" enctype="multipart/form-data">
                    <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                        <?= csrf_field(); ?>
                        <span style="color:#FFC100">Catatan : Jika memilih metode pembayaran tunai mohon isi (-) pada no rekening, nama rekening, dan bank</span>
                        <input type="hidden" name="id_detail" value="<?= $datapenyewa['ID_DETAIL']; ?>">
                        <input type="hidden" name="jumlah" value="<?= $datapenyewa['HARGA_KAMAR']; ?>">
                        <tr>
                            <td width="20%">Metode Pembayaran<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><select class="form-select form-select-lg" name="metode" autofocus="" required>
                                    <option value="">-- Pilih Metode Pembayaran --</option>
                                    <option value="Tunai">Tunai</option>
                                    <option value="Transfer Manual">Transfer Manual</option>
                                    <option value="M-Banking">M-Banking</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Pembayaran<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="date" class="form-control form-control-lg" name="tanggal" required></td>
                        </tr>
                        <tr>
                            <td>No Rekening<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" class="form-control form-control-lg" name="norekening" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Nama Rekening<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" class="form-control form-control-lg" name="namarekening" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Bank<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" class="form-control form-control-lg" name="bank" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>(contoh : BCA, BNI, BRI, Mandiri)</td>
                        </tr>
                        <tr>
                            <td>Bukti Pembayaran<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="file" class="form-control form-control-lg" name="bukti" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>(file bukti pembayaran berupa jpg/jpeg/png maksimal 10 MB)</td>
                        </tr>
                    </table>
                    <div align="center">
                        <button type="submit" class="btn btn-primary btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:40px;background-color:#248AFD">
                            <i class="ti-save btn-icon-prepend"></i>SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>