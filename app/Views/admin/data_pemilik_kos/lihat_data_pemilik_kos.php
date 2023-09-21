<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pemilik Kos</h4>

            <div class="title_right" style="float: right;">
                <div class="col-md-15 col-sm-15 mr-2 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari data pemilik kos" autocomplete="off">
                    </div>
                </div>
            </div>

            <a href="<?= base_url('data-pemilik-kos/tambah') ?>"><button class="btn" style="color: white;" disabled>TAMBAH</button></a>
            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-hover mb-3" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Pemilik Kos</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemilikkos as $pk) : ?>
                            <tr align="center">
                                <td><?= $nomor++; ?></td>
                                <td><?= $pk['NAMA_PEMILIK_KOS']; ?></td>
                                <td><?= $pk['NO_TELEPON_PEMILIK_KOS']; ?></td>
                                <td><?= $pk['EMAIL_PEMILIK_KOS']; ?></td>
                                <td>
                                    <a href="<?= base_url('data-pemilik-kos/detail/' . $pk['ID_PEMILIK_KOS']) ?>"><button class="btn btn-primary btn-icon-text"><i class="ti-eye btn-icon-prepend"></i>DETAIL</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('lihat_pemilik_kos', 'lihat_pemilik_kos_pagination') ?>
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