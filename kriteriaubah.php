<h2>Edit Data Kriteria</h2>
<a href="index.php?halaman=kriteria" class=" btn btn-warning  pull-right">
    << Kembali </a>
        <br>
        <br>
        <?php

$ambil = $koneksi->query("SELECT * FROM kriteria WHERE id_kriteria='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Kode Kriteria</label>
                <input type="text" class="form-control" name="kode" value="<?php echo $pecah['kode_kriteria'];?>"
                    readonly>
            </div>
            <div class="form-group">
                <label>Nama Kriteria</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_kriteria'];?>">
            </div>
            <div class="form-group">
                <label>Bobot Kriteria</label>
                <input type="double" class="form-control" name="bobot" value="<?php echo $pecah['bobot'];?>">
            </div>
            <button class="btn btn-primary" name="ubah">Ubah</button>
        </form>
        <?php 
if(isset($_POST['ubah']))
{
    
        $koneksi->query("UPDATE kriteria SET nama_kriteria='$_POST[nama]',
        bobot='$_POST[bobot]' WHERE id_kriteria='$_GET[id]'");
echo "<script>alert('Data telah berhasil di ubah');</script>";
echo "<script>location='index.php?halaman=kriteria';</script>";
}
?>