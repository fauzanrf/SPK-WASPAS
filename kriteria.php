<h2> Data Kriteria</h2>
<a href="index.php?halaman=kriteriatambah" class="btn btn-primary">Tambah kriteria</a>
<!-- <a href="cetakproduk.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a> -->
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Kriteria</th>
            <th>Kriteria</th>
            <th>Bobot</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1;
        $c = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM kriteria order by id_kriteria ASC"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['kode_kriteria']; ?></td>
            <td><?php echo $pecah['nama_kriteria']; ?></td>
            <td><?php echo $pecah['bobot']; ?></td>
            <td>
                <a href="index.php?halaman=kriteriaubah&id=<?php echo $pecah['id_kriteria']; ?>"
                    class="btn-warning btn">Edit</a>
                <a href="index.php?halaman=kriteriahapus&id=<?php echo $pecah['id_kriteria']; ?>" class="btn-danger btn"
                    onclick="return confirm('Apakah yakin ingin menghapus data kriteria?');">Hapus</a>
            </td>
        </tr>
        <?php $nomor++;
            $c++; ?>
        <?php } ?>
    </tbody>
</table>