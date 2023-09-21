<?= $this->extend('pemilik_kos/layout/template-data-kamar'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Kamar</h4>
            <hr>
            <div style="color: red;"><?= session()->getFlashdata('errors') != null ? session()->getFlashdata('errors') : ""; ?></div>
            <div class="content">
                <form action="/data-kamar/tambah" method="post" id="text-editor" enctype="multipart/form-data">
                    <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                        <?= csrf_field(); ?>
                        <tr>
                            <td width="20%">Nama Kos<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><select class="form-select form-select-lg" name="nama_kos" autofocus="" required>
                                    <option value="">-- Pilih Nama Kos --</option>
                                    <?php foreach ($listkos as $lk) : ?>
                                        <option value="<?= $lk['ID_KOS'] ?>"><?= $lk['NAMA_KOS'] ?></option>
                                    <?php endforeach; ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Tipe Kamar<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><select class="form-select form-select-lg" name="tipe" required>
                                    <option value="">-- Pilih Tipe Kamar --</option>
                                    <option value="Sendiri">Sendiri</option>
                                    <option value="Berdua">Berdua</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td width="20%">Nama Kamar<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="nama_kamar" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Fasilitas<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="fasilitas" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Stok<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="number" name="stok" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Harga<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="harga" class="form-control" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required></td>
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
                            <td><input type="text" name="link" class="form-control" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>(contoh :
                                <a href="https://www.youtube.com/embed/6lM-vFAxTyg">https://www.youtube.com/embed/6lM-vFAxTyg</a>)
                            </td>
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