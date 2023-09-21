<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Penarikan Saldo</h4>

            <?php if (@$_SESSION['konfirmasi']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("konfirmasi") ?>'
                    })
                </script>
            <?php unset($_SESSION['konfirmasi']);
            } ?>

            <div class="title_right" style="float: right;">
                <div class="col-md-15 col-sm-15 mr-2 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari data penarikan saldo" autocomplete="off">
                    </div>
                </div>
            </div>

            <a href="<?= base_url('pembayaran/tambah') ?>"><button class="btn" style="color: white;" disabled>TAMBAH</button></a>
            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-hover mb-3" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nomor Rekening</th>
                            <th>Nama Rekening</th>
                            <th>Bank</th>
                            <th>Jumlah Penarikan</th>
                            <th>Tanggal Penarikan</th>
                            <th>Tanggal Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($saldo as $s) : ?>
                            <tr align="center">
                                <td><?= $nomor++; ?></td>
                                <td><?= $s['NO_REKENING_PEMILIK_KOS']; ?></td>
                                <td><?= $s['NAMA_REKENING_PEMILIK_KOS']; ?></td>
                                <td><?= $s['BANK_PEMILIK_KOS']; ?></td>
                                <td>Rp <?= number_format($s['JUMLAH_PENARIKAN']); ?></td>
                                <td><?= $s['TANGGAL_PENARIKAN']; ?></td>
                                <td><?= $s['TANGGAL_KONFIRMASI']; ?></td>
                                <td>
                                    <?php if ($s['JUMLAH_PENARIKAN'] > $s['JUMLAH_SALDO']) : ?>
                                        <a href="<?= base_url('penarikan-saldo/konfirmasi/' . $s['ID_PENGAJUAN_SALDO']) ?>"><button class="btn btn-success" <?= ($s['STATUS_PENARIKAN_SALDO'] == 'Selesai' ? 'disabled' : ''); ?> disabled>KONFIRMASI</button></a>
                                    <?php else : ?>
                                        <a href="<?= base_url('penarikan-saldo/konfirmasi/' . $s['ID_PENGAJUAN_SALDO']) ?>"><button class="btn btn-success" <?= ($s['STATUS_PENARIKAN_SALDO'] == 'Selesai' ? 'disabled' : ''); ?>>KONFIRMASI</button></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('lihat_penarikan_saldo', 'lihat_penarikan_saldo_pagination') ?>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
            td = tr[i];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<?= $this->endSection(); ?>