<?= $this->extend('pemilik_kos/layout/template-penarikan-saldo'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Riwayat Penarikan Saldo</h4>

            <div class="title_right" style="float: right;">
                <div class="col-md-15 col-sm-15 mr-2 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari riwayat penarikan" autocomplete="off">
                    </div>
                </div>
            </div>

            <a href="<?= base_url('riwayat/tambah') ?>"><button class="btn" style="color: white;" disabled>TAMBAH</button></a>
            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-hover mb-3" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nomor Rekening</th>
                            <th>Nama Rekening</th>
                            <th>Bank</th>
                            <th>Jumlah Penarikan</th>
                            <th>Status</th>
                            <th>Bukti Transfer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($riwayat as $r) : ?>
                            <tr align="center">
                                <td><?= $nomor++; ?></td>
                                <td><?= $r['TANGGAL_PENARIKAN']; ?></td>
                                <td><?= $r['NO_REKENING_PEMILIK_KOS']; ?></td>
                                <td><?= $r['NAMA_REKENING_PEMILIK_KOS']; ?></td>
                                <td><?= $r['BANK_PEMILIK_KOS']; ?></td>
                                <td>Rp <?= number_format($r['JUMLAH_PENARIKAN']); ?></td>
                                <td>
                                    <?php if ($r['STATUS_PENARIKAN_SALDO'] == 'Dalam Proses') : ?>
                                        <span style="color:#FFC100"><?= $r['STATUS_PENARIKAN_SALDO']; ?></span>
                                    <?php else : ?>
                                        <span style="color:#57B657"><?= $r['STATUS_PENARIKAN_SALDO']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php if ($r['BUKTI_TRANSFER'] != NULL) : ?>
                                    <td><img style="width: 150px;height: 150px;" src="<?= base_url() . "/upload/konfirmasi_penarikan_saldo/" . $r['BUKTI_TRANSFER']; ?>"></td>
                                <?php else : ?>
                                    <td>-</td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('riwayat_penarikan_saldo', 'riwayat_penarikan_saldo_pagination') ?>
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