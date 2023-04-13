<?php

include '../config/koneksi.php';
$nomor = 1;
$ambil = $koneksi->query("SELECT * FROM penilaian  JOIN karyawan ON 
        karyawan.id_karyawan=penilaian.id_karyawan
         JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria
        --  WHERE kriteria.id_kriteria=penilaian.id_penilai
        --  Group by penilaian.id_karyawan
         ");

// $ambil_kriteria = $koneksi->query("SELECT * FROM penilaian  JOIN karyawan ON 
//         karyawan.id_karyawan=penilaian.id_karyawan
//          JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria
//          GROUP BY penilaian.id_kriteria
//          ");

//  tabel kriteria
$kriteria = $koneksi->query("SELECT * FROM kriteria");

// tabel penilaian
$penilaian = $koneksi->query("SELECT * FROM penilaian");

$j_kriteria = mysqli_num_rows($kriteria);
// gitung jumlah data karyawan
// $j_karyawan = mysqli_num_rows($ambil_karyawan);

// nilai max 
$nilai_max = $koneksi->query("SELECT id_kriteria, MAX(nilai_bobot) As nilai_max 
FROM penilaian GROUP BY id_kriteria");


$wsm_wp = $koneksi->query("SELECT kriteria.bobot*(SELECT penilaian.nilai_bobot/4)
 As perkalian_matriks, pow(kriteria.bobot,
 (SELECT penilaian.nilai_bobot/4)) AS nilai_wsm 
 FROM penilaian JOIN karyawan ON 
 karyawan.id_karyawan=penilaian.id_karyawan 
 JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria 
 WHERE kriteria.id_kriteria 
 Group by penilaian.id_karyawan,penilaian.id_kriteria");

// $ambilnilai=$wsm_wp->fetch_assoc();

// martiks ternormalisasi
$n_matriks = $koneksi->query("SELECT nilai_bobot/(SELECT MAX(nilai_bobot) FROM penilaian) AS Nilai_matriks 
FROM penilaian  JOIN kriteria ON kriteria.id_kriteria=penilaian.id_penilaian 
ORDER BY penilaian.id_kriteria");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Penilai | Kodim 0201/BS Medan</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>



    <h2> Proeses Penilaian</h2>
    <br>
    <br>

    <table class="table table-bordered">
        <thead>
            <th>No </th>
            <th>Nilai wsm </th>
            <th>Nilai wsp </th>
        </thead>
        <tbody>
        
        
        <?php $nomor = 1;
        while ($pecah_wsm = $wsm_wp->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td>

                    <?php echo $wsm = $pecah_wsm['perkalian_matriks']; ?>
                </td>
                <td>

                    <?= $wp = $pecah_wsm['nilai_wsm']; ?></td>
            </tr>

</tbody>
            <?php $nomor++;
        } ?>

    </table>
</body>
<?php 
$nilai = mysqli_free_result($wsm_wp);
print_r($nilai);
?>
</html>