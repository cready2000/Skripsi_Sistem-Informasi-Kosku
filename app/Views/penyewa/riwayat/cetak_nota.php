<?= $this->extend('penyewa/layout/template-cetak-nota'); ?>

<?= $this->section('content'); ?>

<div style="margin-left: 25px; margin-right: 25px;">
    <div class="mt-5 mb-3"><img src="/template/pemilik_kos/assets/images/logo-sikosku2.png" width="250px" alt="logo" /></div>
    <p>
        Sistem Informasi Kosku (Si Kosku)<br>
        Surabaya, Jawa Timur, Indonesia<br>
        082230013246
    </p>
    <div class="no-print">
        <a href="<?= base_url('penyewa/riwayat-pembayaran') ?>"><button class="btn btn-dark" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;">KEMBALI</button></a>
        <button class="btn btn-primary" style="border: none;color: white;padding: 10px 20px;text-align: center; text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;border-radius: 16px;" type="submit" onclick="window.print()">CETAK NOTA</button>
    </div>
    <hr>
    <hr>
    <p></p>
    <?php foreach ($datakos as $dk) : ?>
        <p>
            ID Pembayaran : <?= $dk['ID_PEMBAYARAN'] ?><br>
            Nama: <?= $dk['NAMA_PENYEWA'] ?><br>
            Metode Pembayaran : <?= $dk['METODE_PEMBAYARAN'] ?><br>
            No. Rekening : <?= $dk['NO_REKENING_PENYEWA'] ?><br>
            Bank : <?= $dk['BANK_PENYEWA'] ?><br>
            Tanggal : <?= $dk['TANGGAL_PEMBAYARAN'] ?><br>
        </p>
        <table cellpadding="6">
            <tr>
                <th><strong>Nama Kos</strong></th>
                <th><strong>Nama Kamar</strong></th>
                <th><strong>Alamat</strong></th>
                <th><strong>Tipe Kamar</strong></th>
                <th><strong>Total Pembayaran</strong></th>
            </tr>
            <tr>
                <td><?= $dk['NAMA_KOS'] ?></td>
                <td><?= $dk['NAMA_KAMAR'] ?></td>
                <td><?= $dk['ALAMAT_KOS'] ?></td>
                <td><?= $dk['TIPE_KAMAR'] ?></td>
                <td>Rp <?= number_format($dk['JUMLAH_PEMBAYARAN']); ?></td>
            </tr>
        </table>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>