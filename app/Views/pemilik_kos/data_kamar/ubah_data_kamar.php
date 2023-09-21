<?= $this->extend('pemilik_kos/layout/template-data-kamar'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Kamar</h4>
            <hr>
            <?php if (!empty(session()->getFlashdata('errors'))) : ?> <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('errors'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="content">
                <?php foreach ($datakamar as $dk) : ?>
                    <form action="/data-kamar/simpan-ubah/<?= $dk['ID_KAMAR']; ?>" method="post" enctype="multipart/form-data">
                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                            <?= csrf_field(); ?>
                            <tr>
                                <td width="20%">ID</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="id" class="form-control" value="<?= $dk['ID_KAMAR'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Nama Kos<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><select class="form-select form-select-lg" name="nama_kos" autofocus="" required>
                                        <option value="" disabled>-- Pilih Nama Kos --</option>
                                        <?php foreach ($listkos as $lk) : ?>
                                            <?php if ($dk['ID_KOS'] == $lk['ID_KOS']) : ?>
                                                <option selected value="<?= $lk['ID_KOS'] ?>"><?= $lk['NAMA_KOS'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $lk['ID_KOS'] ?>"><?= $lk['NAMA_KOS'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Tipe Kamar<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><select class="form-select form-select-lg" name="tipe" autofocus="" required>
                                        <option value="" disabled>-- Pilih Tipe Kamar --</option>
                                        <?php foreach ($tipekamar as $tk) : ?>
                                            <?php if ($dk['TIPE_KAMAR'] == $tk) : ?>
                                                <option selected value="<?= $tk ?>"><?= $tk ?></option>
                                            <?php else : ?>
                                                <option value="<?= $tk ?>"><?= $tk ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Nama Kamar<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="nama_kamar" class="form-control" value="<?= $dk['NAMA_KAMAR'] ?>" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Fasilitas<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="fasilitas" class="form-control" value="<?= $dk['FASILITAS_KAMAR'] ?>" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Stok<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="number" name="stok" class="form-control" value="<?= $dk['STOK_KAMAR'] ?>" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Harga<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><input type="text" name="harga" class="form-control" value="<?= $dk['HARGA_KAMAR'] ?>" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required></td>
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
                            <tr>
                                <td>Link Video Youtube</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="link" class="form-control" value="<?= $dk['LINK_VIDEO_KAMAR'] ?>" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>(contoh :
                                    <a href="https://www.youtube.com/embed/6lM-vFAxTyg">https://www.youtube.com/embed/6lM-vFAxTyg</a>)
                                </td>
                            </tr>
                        <?php endforeach; ?>
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