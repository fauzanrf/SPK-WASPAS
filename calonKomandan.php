<h2> Data Karyawan</h2>
<a href="register.php" class="btn btn-primary">Tambah karyawan</a>
<!-- <a href="cetakproduk.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a>  -->
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>Bagian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM karyawan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama']; ?></td>
                <td><?php echo $pecah['jabatan']; ?></td>
                <td><?php echo $pecah['bagian']; ?></td>    

                <td>
                    <a href="index.php?halaman=calonKomandanDetail&id=<?php echo $pecah['id_karyawan']; ?>" class="btn-warning btn">Detail</a>

                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>