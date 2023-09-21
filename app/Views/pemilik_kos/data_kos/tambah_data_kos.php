<?= $this->extend('pemilik_kos/layout/template-data-kos'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Kos</h4>
            <hr>
            <div style="color: red;"><?= session()->getFlashdata('errors') != null ? session()->getFlashdata('errors') : ""; ?></div>
            <div class="content">
                <form action="/data-kos/tambah" method="post" enctype="multipart/form-data">
                    <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                        <?= csrf_field(); ?>
                        <tr>
                            <td width="20%">Nama Kos<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="nama" class="form-control" autocomplete="off" autofocus="" required></td>
                        </tr>
                        <tr>
                            <td>Gender Kos<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td>
                                <select class="form-select form-select-lg" name="gender" required>
                                    <option value="">-- Pilih Gender Kos --</option>
                                    <option value="Pria">Kos Pria</option>
                                    <option value="Wanita">Kos Wanita</option>
                                    <option value="Campur">Kos Campur</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Durasi<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><select class="form-select form-select-lg" name="durasi" required>
                                    <option value="">-- Pilih Durasi --</option>
                                    <option value="1 Bulan">1 Bulan</option>
                                    <option value="3 Bulan">3 Bulan</option>
                                    <option value="6 Bulan">6 Bulan</option>
                                    <option value="12 Bulan">12 Bulan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Wilayah<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><select class="form-select form-select-lg" name="wilayah" required>
                                    <option value="">-- Pilih Wilayah --</option>
                                    <option value="1">Gunung Anyar</option>
                                    <option value="2">Medokan Ayu</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Radius<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><select class="form-select form-select-lg" name="radius" required>
                                    <option value="">-- Pilih Radius --</option>
                                    <option value="1">100 Meter</option>
                                    <option value="2">500 Meter</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="alamat" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Jumlah Kamar<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="number" name="jumlah" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Fasilitas<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="fasilitas" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>No. Telepon<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="telepon" class="form-control" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required></td>
                        </tr>
                        <tr>
                            <td>Longitude<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="longitude" class="form-control" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Latitude<span style="color:red">*</span></td>
                            <td width="1%">:</td>
                            <td><input type="text" name="latitude" class="form-control" autocomplete="off" required></td>
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
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>