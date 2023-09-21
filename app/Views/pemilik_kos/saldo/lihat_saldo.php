<?= $this->extend('pemilik_kos/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Saldo</h4>

            <?php if (@$_SESSION['pengajuan']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("pengajuan") ?>'
                    })
                </script>
            <?php unset($_SESSION['pengajuan']);
            } ?>

            <div class="title_right" style="float: right;">
                <div class="col-md-15 col-sm-15 mr-2 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari data saldo" autocomplete="off">
                    </div>
                </div>
            </div>

            <a href="<?= base_url('saldo/riwayat') ?>"><button class="btn btn-primary">RIWAYAT</button></a>
            <?php foreach ($jumlahsaldo as $js) : ?>
                <?php if ($js['JUMLAH_SALDO'] > 49999) : ?>
                    <a href="<?= base_url('saldo/pengajuan') ?>"><button class="btn btn-success">PENGAJUAN</button></a>
                <?php else : ?>
                    <button class="btn btn-success" disabled>PENGAJUAN</button>
                <?php endif; ?>
            <?php endforeach; ?>
            <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0" style="margin-top:30px;margin-bottom:30px;">
                <tr>
                    <td width="15%">Nominal Transaksi</td>
                    <td width="1%">:</td>
                    <td>Rp <?= number_format($nominalTransaksi); ?></td>
                </tr>
                <tr>
                    <td>Total Saldo</td>
                    <td width="1%">:</td>
                    <td>Rp <?= number_format($saldo->JUMLAH_SALDO); ?></td>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-hover mb-3" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nomor Rekening</th>
                            <th>Nama Rekening</th>
                            <th>Bank</th>
                            <th>Metode Pembayaran</th>
                            <th>Total Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPembayaran as $pembayaran) : ?>
                            <tr align="center">
                                <td><?= $nomor++; ?></td>
                                <td><?= $pembayaran['NO_REKENING_PENYEWA']; ?></td>
                                <td><?= $pembayaran['NAMA_REKENING_PENYEWA']; ?></td>
                                <td><?= $pembayaran['BANK_PENYEWA']; ?></td>
                                <td><?= $pembayaran['METODE_PEMBAYARAN']; ?></td>
                                <td>Rp <?= number_format($pembayaran['JUMLAH_PEMBAYARAN']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('lihat_saldo', 'lihat_saldo_pagination') ?>
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