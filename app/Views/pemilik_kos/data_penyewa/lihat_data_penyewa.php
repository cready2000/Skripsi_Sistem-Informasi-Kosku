<?= $this->extend('pemilik_kos/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $title; ?></h4>

            <?php if (@$_SESSION['lanjut']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("lanjut") ?>'
                    })
                </script>
            <?php unset($_SESSION['lanjut']);
            } ?>

            <?php if (@$_SESSION['berhenti']) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?= session("berhenti") ?>'
                    })
                </script>
            <?php unset($_SESSION['berhenti']);
            } ?>

            <script>
                $(document).on("click", "#alert_notif_berhenti", function(e) {
                    e.preventDefault();
                    var getLink = $(this).attr('href');
                    Swal.fire({
                        title: "Konfirmasi Berhenti Kos",
                        text: "Apakah anda yakin memberhentikan kos?",
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
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari data penyewa" autocomplete="off">
                    </div>
                </div>
            </div>

            <a href="<?= base_url('data-penyewa/tambah') ?>"><button class="btn" style="color: white;" disabled>TAMBAH</button></a>
            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-hover mb-3" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Penyewa</th>
                            <th>Nama Kos</th>
                            <th>Nama Kamar</th>
                            <th>Tanggal Menempati</th>
                            <th>Tanggal Keluar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datapenyewa as $dp) : ?>
                            <?php $differentDays = (strtotime($dp['TANGGAL_KELUAR']) - time()) / 86400; ?>
                            <tr align="center">
                                <td><?= $nomor++; ?></td>
                                <td><?= $dp['NAMA_PENYEWA']; ?></td>
                                <td><?= $dp['NAMA_KOS']; ?></td>
                                <td><?= $dp['NAMA_KAMAR']; ?></td>
                                <td><?= $dp['TANGGAL_MENEMPATI']; ?></td>
                                <td><?= $dp['TANGGAL_KELUAR']; ?></td>
                                <td>
                                    <?php if ($dp['STATUS_PENYEWA'] == 'Bulan Pertama') : ?>
                                        <span style="color:#FFC100"><?= $dp['STATUS_PENYEWA']; ?></span>
                                    <?php elseif ($dp['STATUS_PENYEWA'] == 'Lanjut') : ?>
                                        <span style="color:#57B657"><?= $dp['STATUS_PENYEWA']; ?></span>
                                    <?php else : ?>
                                        <span style="color:#FF4747"><?= $dp['STATUS_PENYEWA']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('data-penyewa/form-lanjut-kos/' . $dp['LAST_ID_DETAIL']) ?>"><button class="btn btn-success btn-sm" <?= ($dp['STATUS_PENYEWA'] == 'Berhenti' || $differentDays >= 7  ? 'disabled' : ''); ?>>LANJUT</button></a>
                                    <a href="<?= base_url('/data-penyewa/berhenti-kos/' . $dp['ID_PEMESANAN']) ?>" id="alert_notif_berhenti"><button class="btn btn-danger btn-sm" <?= ($dp['STATUS_PENYEWA'] == 'Berhenti' || $differentDays >= 7 ? 'disabled' : ''); ?>>BERHENTI</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('lihat_data_penyewa', 'lihat_data_penyewa_pagination') ?>
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