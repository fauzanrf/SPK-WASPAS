<h2> Data Sub-Kriteria</h2>
<a href="index.php?halaman=subkriteriatambah" class="btn btn-primary">Tambah Data Sub kriteria</a>
<a href="cetakproduk.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a> 
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Kriteria</th>
            <th>Nama Kriteria</th>
            <th>Nama Sub-Kriteria</th>
            <th>Nilai</th>
            
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;
        $c=1;?>
        <?php $ambil=$koneksi->query("SELECT * FROM sub_kriteria 
             JOIN kriteria ON sub_kriteria.id_kriteria=kriteria.id_kriteria Order By kriteria.id_kriteria ASC , sub_kriteria.bobot_sub DESC");
             
             ?>
        <?php while($pecah = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['kode_kriteria']; ?></td>
            <td><?php echo $pecah['nama_kriteria']; ?></td>
            <td><?php echo $pecah['nama_sub'];?></td>
            <td><?php echo $pecah['bobot_sub'];?></td>
           
                        <td>
                <a href="index.php?halaman=subkriteriaubah&id=<?php echo $pecah['id_subkriteria'];?>" class="btn-warning btn">Edit</a>
                <a href="index.php?halaman=subkriteriahapus&id=<?php echo $pecah['id_subkriteria'];?>" class="btn-danger btn" onclick="return confirm('Apakah yakin ingin menghapus data sub-kriteria?');" >Hapus</a>
            </td> 
        </tr>
        <?php $nomor++;
        $c++;?>
        <?php }?>
    </tbody>
</table>
