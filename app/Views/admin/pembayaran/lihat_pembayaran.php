<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pembayaran</h4>

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
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari data pembayaran" autocomplete="off">
                    </div>
                </div>
            </div>

            <a href="<?= base_url('pembayaran/tambah') ?>"><button class="btn" style="color: white;" disabled>TAMBAH</button></a>
            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-hover mb-3" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Penyewa</th>
                            <th>Nama Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pembayaran as $p) { ?>
                            <tr align="center">
                                <td><?= $nomor++; ?></td>
                                <td><?= $p['NAMA_PENYEWA']; ?></td>
                                <td><?= $p['NAMA_KAMAR']; ?></td>
                                <td><?= $p['TIPE_KAMAR']; ?></td>
                                <td>
                                    <?php if ($p['STATUS_PEMESANAN'] == 'Belum Membayar') : ?>
                                        <span style="color:#FFC100"><?= $p['STATUS_PEMESANAN']; ?></span>
                                    <?php elseif ($p['STATUS_PEMESANAN'] == 'Sudah Membayar') : ?>
                                        <span style="color:#57B657"><?= $p['STATUS_PEMESANAN']; ?></span>
                                    <?php else : ?>
                                        <span style="color:#FF4747"><?= $p['STATUS_PEMESANAN']; ?></span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <a href="<?= base_url('pembayaran/detail/' . $p['ID_PEMBAYARAN']) ?>"><button class="btn btn-primary btn-icon-text"><i class="ti-eye btn-icon-prepend"></i>DETAIL</button></a>
                                    <a href="<?= base_url('pembayaran/konfirmasi/' . $p['ID_PEMESANAN']) ?>"><button class="btn btn-success btn-icon-text" <?= ($p['STATUS_PEMESANAN'] == 'Sudah Membayar' ? 'disabled' : ''); ?>><i class="ti-check-box btn-icon-prepend"></i>KONFIRMASI</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?= $pager->links('lihat_pembayaran', 'lihat_pembayaran_pagination') ?>
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