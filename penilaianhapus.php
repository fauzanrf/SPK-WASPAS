<?php

$koneksi->query("DELETE FROM penilaian WHERE id_karyawan='".$_GET['id_karyawan']."'");

echo "<script>alert('Data berhasil dihapus secara permanen.');</script>";
echo "<script>location='index.php?halaman=penilaian';</script>";
?>