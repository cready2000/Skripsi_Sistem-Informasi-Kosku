<?= $this->extend('pemilik_kos/layout/template'); ?>

<?= $this->section('content'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Kamar</h4>

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

            <script>
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
            </script>

            <div class="title_right" style="float: right;">
                <div class="col-md-15 col-sm-15 mr-2 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari data kamar" autocomplete="off">
                    </div>
                </div>
            </div>

            <a href="<?= base_url('data-kamar/tambah') ?>"><button class="btn btn-info btn-icon-text">
                    <i class="ti-plus btn-icon-prepend"></i>TAMBAH</button></a>
            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-hover mb-3" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datakamar as $dk) { ?>
                            <tr align="center">
                                <td><?= $nomor++; ?></td>
                                <td><?= $dk['NAMA_KAMAR']; ?></td>
                                <td><?= $dk['TIPE_KAMAR']; ?></td>
                                <td><?= $dk['STOK_KAMAR']; ?></td>
                                <td>Rp <?= number_format($dk['HARGA_KAMAR']); ?></td>
                                <td>
                                    <a href="<?= base_url('data-kamar/detail/' . $dk['NAMA_KAMAR']) ?>"><button class="btn btn-primary btn-icon-text"><i class="ti-eye btn-icon-prepend"></i>DETAIL</button></a>
                                    <a href="<?= base_url('data-kamar/ubah/' . $dk['NAMA_KAMAR']) ?>"><button class="btn btn-warning btn-icon-text"><i class="ti-pencil-alt btn-icon-prepend"></i>UBAH</button></a>
                                    <a href="<?= base_url('data-kamar/hapus/' . $dk['ID_KAMAR']) ?>" id="alert_notif_hapus"><button class="btn btn-danger btn-icon-text"><i class="ti-trash btn-icon-prepend"></i>HAPUS</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?= $pager->links('lihat_data_kamar', 'lihat_data_kamar_pagination') ?>
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