<h2>Edit Data Kriteria</h2>
<a href="index.php?halaman=subkriteria" class=" btn btn-warning  pull-right" > << Kembali </a>
<br>
<br>
<?php

$ambil = $koneksi->query("SELECT * FROM subkriteria WHERE id_subkriteria='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Kriteria</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_sub'];?>">
    </div>
    <div class="form-group">
        <label>Bobot Kriteria</label>
            <input type="double" class="form-control" name="bobot" value="<?php echo $pecah['bobot_sub'];?>">
    </div>

    <button class="btn btn-primary" name="ubah">Ubah</button>
    </form>
<?php 
if(isset($_POST['ubah']))
{
    
        $koneksi->query("UPDATE sub_kriteria SET nama_sub='$_POST[nama_sub]',
        bobot_sub='$_POST[bobot_sub]' WHERE id_kriteria='$_GET[id]'");
echo "<script>alert('Data telah berhasil di ubah');</script>";
echo "<script>location='index.php?halaman=kriteria';</script>";
}
?>

