<?= $this->extend('admin/layout/template-penarikan-saldo'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Konfirmasi Penarikan Saldo</h4>
            <hr>
            <div class="content">
                <form action="/penarikan-saldo/simpan-konfirmasi" method="post" enctype="multipart/form-data">
                    <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                        <?= csrf_field(); ?>
                        <input type="hidden" value="<?= $idPengajuan; ?>" name="id_pengajuan_saldo">
                        <tr>
                            <td>Tanggal Konfirmasi<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="date" class="form-control form-control-lg" name="tanggal" required></td>
                        </tr>
                        <tr>
                            <td width="20%">Bukti Transfer<span style="color:red">*</span></td>
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
                        <button class="btn btn-primary btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:40px;background-color:#248AFD">
                            <i class="ti-save btn-icon-prepend"></i>SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>