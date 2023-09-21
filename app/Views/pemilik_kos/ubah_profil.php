<?= $this->extend('pemilik_kos/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Profil</h4>
            <hr>
            <div style="color: red;"><?= session()->getFlashdata('errors') != null ? session()->getFlashdata('errors') : ""; ?></div>
            <div class="content">
                <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                    <?php foreach ($pemilikkos as $pk) : ?>
                        <form action="/pemilik-kos/ubah-profil" method="post" id="text-editor">
                            <tr>
                                <td width="20%">ID</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="id" class="form-control" value="<?= $pk['ID_PEMILIK_KOS'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="nik" class="form-control" value="<?= $pk['NIK_PEMILIK_KOS'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" autocomplete="off" autofocus="" required></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="nama" class="form-control" value="<?= $pk['NAMA_PEMILIK_KOS'] ?>" autocomplete="off" autofocus="" required></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="telepon" class="form-control" value="<?= $pk['NO_TELEPON_PEMILIK_KOS'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td width="1%">:</td>
                                <td><input type="email" name="email" class="form-control" value="<?= $pk['EMAIL_PEMILIK_KOS'] ?>" autocomplete="off" required></td>
                            </tr>
                        </form>
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