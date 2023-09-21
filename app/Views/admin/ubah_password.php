<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<script type="text/javascript">
    function lihat() {
        var x = document.getElementById("KonfirmasiPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Password</h4>
            <hr>
            <div style="color: red;"><?= session()->getFlashdata('errors') != null ? session()->getFlashdata('errors') : ""; ?></div>
            <div class="content">
                <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                    <?php foreach ($admin as $a) : ?>
                        <form action="/admin/ubah-password" method="post" id="text-editor">
                            <tr>
                                <td><input type="hidden" name="id" class="form-control" value="<?= $a['ID_ADMIN'] ?>" readonly></td>
                            <tr>
                                <td width="25%">Password Baru</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="password" class="form-control" autocomplete="off" autofocus="" required></td>
                            </tr>
                            <tr>
                                <td>Konfirmasi Password Baru</td>
                                <td width="1%">:</td>
                                <td><input type="password" name="konfpassword" id="KonfirmasiPassword" class="form-control" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="mt-3" onclick="lihat()"> Tampilkan Password</td>
                            </tr>
                        <?php endforeach; ?>
                </table>
                <div align="center">
                    <button class="btn btn-primary btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:40px;background-color:#248AFD">
                        <i class="ti-save btn-icon-prepend"></i>SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>