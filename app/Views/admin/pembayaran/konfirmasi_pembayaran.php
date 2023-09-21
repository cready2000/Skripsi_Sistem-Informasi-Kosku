<?= $this->extend('admin/layout/template-pembayaran'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Konfirmasi Pembayaran</h4>
            <hr>

            <script>
                function submitForm(form) {
                    Swal.fire({
                        title: "Konfirmasi Pembayaran",
                        text: "Apakah anda yakin memilih status pemesanan?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ya',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "Batal"

                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                    return false;
                }
            </script>

            <div class="content">
                <?php foreach ($pembayaran as $p) : ?>
                    <form action="/pembayaran/konfirmasi/<?= $p['ID_PEMESANAN']; ?>" method="post" onsubmit="return submitForm(this);">
                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size:20px;margin-top:20px">
                            <input type="hidden" name="id_pemesanan" class="form-control" value="<?= $p['ID_PEMESANAN'] ?>">
                            <input type="hidden" name="id_pembayaran" class="form-control" value="<?= $p['ID_PEMBAYARAN'] ?>">
                            <input type="hidden" name="id_kos" class="form-control" value="<?= $p['ID_KOS'] ?>">
                            <input type="hidden" name="tanggal_menempati" class="form-control" value="<?= $p['TANGGAL_PEMESANAN'] ?>">
                            <tr>
                                <td width="20%">No. Rekening</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="norekening" class="form-control" value="<?= $p['NO_REKENING_PENYEWA'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Rekening</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="namarekening" class="form-control" value="<?= $p['NAMA_REKENING_PENYEWA'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Bank</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="bank" class="form-control" value="<?= $p['BANK_PENYEWA'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Metode Pembayaran</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="metode" class="form-control" value="<?= $p['METODE_PEMBAYARAN'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td width="1%">:</td>
                                <td><input type="text" name="jumlah" class="form-control" value="<?= $p['JUMLAH_PEMBAYARAN'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Status Pemesanan<span style="color:red">*</span></td>
                                <td width="1%">:</td>
                                <td><select class="form-select form-select-lg" name="status" required>
                                        <option value="" disabled>-- Pilih Status Pemesanan --</option>
                                        <?php foreach ($status as $s) : ?>
                                            <?php if ($s == $datapemesanan['STATUS_PEMESANAN']) : ?>
                                                <option selected value="<?= $s ?>"><?= $s ?></option>
                                            <?php else : ?>
                                                <option value="<?= $s ?>"><?= $s ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div align="center">
                            <button type="submit" class="btn btn-primary btn-icon-text btn-sm" style="font-size:14px;font-family:'Nunito',sans-serif;height:50px;width:125px;margin-top:40px;background-color:#248AFD">
                                <i class="ti-save btn-icon-prepend"></i>SIMPAN</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>