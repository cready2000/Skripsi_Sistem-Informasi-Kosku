<?= $this->extend('penyewa/layout/template-profil'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Profil</h2>
                    </div>

                    <?php if (@$_SESSION['ubah']) { ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: '<?= session("ubah") ?>'
                            })
                        </script>
                    <?php unset($_SESSION['ubah']);
                    } ?>

                    <div class="col-sm-9 col-md-7 col-lg-8 mx-auto mt-3">
                        <div class="card border-0 shadow rounded-3 mb-5">
                            <div class="card-body p-5 p-sm-5">
                                <?php foreach ($penyewa as $p) : ?>
                                    <h5 class="card-title text-center mb-4 fw-bold fs-4"><?= $p['NAMA_PENYEWA']; ?></h5>
                                    <div class="content">
                                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px">
                                            <tr>
                                                <td width="30%">ID</td>
                                                <td width="2%">:</td>
                                                <td><?= $p['ID_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td width="2%">:</td>
                                                <td><?= $p['NIK_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td width="1%">:</td>
                                                <td><?= $p['ALAMAT_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. Telepon</td>
                                                <td width="1%">:</td>
                                                <td><?= $p['NO_TELEPON_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td width="1%">:</td>
                                                <td><?= $p['JENIS_KELAMIN_PENYEWA']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td width="1%">:</td>
                                                <td><?= $p['EMAIL_PENYEWA']; ?></td>
                                            </tr>
                                        </table>
                                        <div class="d-grid mt-4">
                                            <center>
                                                <a href="<?= base_url('penyewa/ubah-profil') ?>"><button class="btn btn-primary btn-login text-uppercase fw-bold" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;" type="submit">UBAH PROFIL</button></a>
                                            </center>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>