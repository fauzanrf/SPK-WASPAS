<?php

$ambil = $koneksi->query("SELECT * FROM karyawan WHERE id_karyawan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM karyawan WHERE id_karyawan='$_GET[id]'");

echo "<script>alert('Apakah Ingin menghapus Calon Komandan? ');</script>";
echo "<script>location='index.php?halaman=calonKomandan';</script>";
?>