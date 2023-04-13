<?php 

?>

<h2 class="text-center"> Laporan Hasil Perhitungan Waspas </h2>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nilai Qi</th>
            <th>Rangking</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1 ;
       
         $ambil = $koneksi->query("SELECT *,FIND_IN_SET( hasil, (SELECT GROUP_CONCAT( hasil ORDER BY hasil DESC ) FROM karyawan )) AS ranking FROM karyawan"); 
       ?>
        <?php while ($detail = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $detail['nama']; ?></td>
            <td><?php echo $detail['hasil']; ?></td>
            <td><?php echo $detail['ranking']; ?></td>
            <?php if ($detail['ranking']==1 ):  ?>
            <td><strong>Terpilih</strong></td>
            <?php else:  ?>
            <td>Tidak terpilih
            </td>
            <?php endif ?>
        </tr>
        <?php $nomor++ ; } ?>

    </tbody>
</table>
<a href="cetak_penilaian.php" class="btn btn-success text-center" target="_blank"><span
        class="glyphicon glyphicon-download"></span>
    Cetak Laporan </a>