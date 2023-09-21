<?= $this->extend('pemilik_kos/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Kos</h4>

            <?php if (@$_SESSION['tambah']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("tambah") ?>'
                    })
                </script>
            <?php unset($_SESSION['tambah']);
            } ?>

            <?php if (@$_SESSION['ubah']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("ubah") ?>'
                    })
                </script>
            <?php unset($_SESSION['ubah']);
            } ?>

            <?php if (@$_SESSION['hapus']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("hapus") ?>'
                    })
                </script>
            <?php unset($_SESSION['hapus']);
            } ?>

            <!-- <script>
                $(document).on("click", "#alert_notif_hapus", function(e) {
                    e.preventDefault();
                    var getLink = $(this).attr('href');
                    Swal.fire({
                        title: "Konfirmasi Hapus Data",
                        text: "Apakah anda yakin hapus data?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ya',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "Batal"

                    }).then(result => {
                        if (result.isConfirmed) {
                            window.location.href = getLink
                        }
                    })
                    return false;
                });
            </script> -->

            <div class="title_right" style="float: right;">
                <div class="col-md-15 col-sm-15 mr-2 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari data kos" autocomplete="off">
                    </div>
                </div>
            </div>

            <a href="<?= base_url('data-kos/tambah') ?>"><button class="btn btn-info btn-icon-text">
                    <i class="ti-plus btn-icon-prepend"></i>TAMBAH</button></a>
            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-hover mb-3" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Kos</th>
                            <th>Alamat</th>
                            <th>Gender Kos</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datakos as $dk) { ?>
                            <tr align="center">
                                <td><?= $nomor++; ?></td>
                                <td><?= $dk['NAMA_KOS']; ?></td>
                                <td><?= $dk['ALAMAT_KOS']; ?></td>
                                <td><?= $dk['GENDER_KOS']; ?></td>
                                <td>
                                    <a href="<?= base_url('data-kos/detail/' . $dk['NAMA_KOS']) ?>"><button class="btn btn-primary btn-icon-text"><i class="ti-eye btn-icon-prepend"></i>DETAIL</button></a>
                                    <a href="<?= base_url('data-kos/ubah/' . $dk['NAMA_KOS']) ?>"><button class="btn btn-warning btn-icon-text"><i class="ti-pencil-alt btn-icon-prepend"></i>UBAH</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?= $pager->links('lihat_data_kos', 'lihat_data_kos_pagination') ?>
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