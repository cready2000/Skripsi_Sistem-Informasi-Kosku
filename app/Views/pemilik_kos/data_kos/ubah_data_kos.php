<?= $this->extend('pemilik_kos/layout/template-data-kos'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Kos</h4>
            <hr>
            <?php if (!empty(session()->getFlashdata('errors'))) : ?> <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('errors'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="content">
                <?php foreach ($datakos as $dk) : ?>
                    <form action="/data-kos/simpan-ubah/<?= $dk['ID_KOS']; ?>" method="post" enctype="multipart/form-data">
                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                            <?= csrf_field(); ?>
                            <tr>
                                <td width="20%">ID</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="id" class="form-control" value="<?= $dk['ID_KOS'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Nama Kos<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="nama" class="form-control" value="<?= $dk['NAMA_KOS'] ?>" autocomplete="off" autofocus="" required></td>
                            </tr>
                            <tr>
                                <td>Gender Kos<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td>
                                    <select class="form-select form-select-lg" name="gender" autofocus="" required>
                                        <option value="" disabled>-- Pilih Gender Kos --</option>
                                        <?php foreach ($gender as $g) : ?>
                                            <?php if ($dk['GENDER_KOS'] == $g) : ?>
                                                <option selected value="<?= $g ?>"><?= $g ?></option>
                                            <?php else : ?>
                                                <option value="<?= $g ?>"><?= $g ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Durasi<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td>
                                    <select class="form-select form-select-lg" name="durasi" required>
                                        <option value="" disabled>-- Pilih Durasi --</option>
                                        <?php foreach ($durasi as $d) : ?>
                                            <?php if ($dk['DURASI'] == $d) : ?>
                                                <option selected value="<?= $d ?>"><?= $d ?></option>
                                            <?php else : ?>
                                                <option value="<?= $d ?>"><?= $d ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Wilayah<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td>
                                    <select class="form-select form-select-lg" name="wilayah" required>
                                        <option value="" disabled>-- Pilih Wilayah --</option>
                                        <?php foreach ($wilayah as $w) : ?>
                                            <?php if ($dk['NAMA_WILAYAH'] == $w) : ?>
                                                <option selected value="<?= $w ?>"><?= $w ?></option>
                                            <?php else : ?>
                                                <option value="<?= $w ?>"><?= $w ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Radius<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td>
                                    <select class="form-select form-select-lg" name="radius" required>
                                        <option value="" disabled>-- Pilih Radius --</option>
                                        <?php foreach ($radius as $r) : ?>
                                            <?php if ($dk['NAMA_WILAYAH'] == $r) : ?>
                                                <option selected value="<?= $r ?>"><?= $r ?></option>
                                            <?php else : ?>
                                                <option value="<?= $r ?>"><?= $r ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="alamat" class="form-control" value="<?= $dk['ALAMAT_KOS'] ?>" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Kamar<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="number" name="jumlah" class="form-control" value="<?= $dk['JUMLAH_KAMAR_KOS'] ?>" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Fasilitas<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="fasilitas" class="form-control" value="<?= $dk['FASILITAS_KOS'] ?>" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>No. Telepon<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="telepon" class="form-control" value="<?= $dk['TELEPON_KOS'] ?>" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required></td>
                            </tr>
                            <tr>
                                <td>Longitude<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="longitude" class="form-control" value="<?= $dk['LONGITUDE_KOS'] ?>" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Latitude<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="latitude" class="form-control" value="<?= $dk['LATITUDE_KOS'] ?>" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Gambar<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="file" name="gambar[]" class="form-control form-control-lg" multiple required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>(file gambar berupa jpg/jpeg/png maksimal 10 MB)</td>
                            </tr>
                        </table>
                        <div align="center">
                            <button class="btn btn-primary btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:40px;background-color:#248AFD">
                                <i class="ti-save btn-icon-prepend"></i>SIMPAN</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>