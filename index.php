<?php
session_start();
//koneksi ke database
include 'config/koneksi.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPK WAS PAS</title>
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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Penilai</a>

            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><span id="tanggalwaktu"></span> <a href="index.php?halaman=logout"
                    class="btn btn-danger square-btn-adjust" style="background-color: #009B50;"> Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/5.png" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=calonKomandan"><i class="fa fa-user"></i>Data Karyawan</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=kriteria"><i class="fa fa-file"></i> Data Kriteria</a>
                    </li>
                    <!-- <li>
                        <a href="index.php?halaman=subkriteria"><i class="fa fa-file"></i> Data Sub-Kriteria</a>
                    </li> -->
                    <li>
                        <a href="index.php?halaman=penilaian"><i class="fa fa-check-square"></i> Data Penilaian</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=laporan"><i class="fa fa-database"></i> Laporan</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "calonKomandan") {
                        include 'calonKomandan.php';
                    } elseif ($_GET['halaman'] == "calonKomandanDetail") {
                        include 'calonKomandanDetail.php';
                    } elseif ($_GET['halaman'] == "calonKomandanHapus") {
                        include 'calonKomandanHapus.php';
                    } elseif ($_GET['halaman'] == "kriteria") {
                        include 'kriteria.php';
                    } elseif ($_GET['halaman'] == "subkriteria") {
                        include 'subkriteria.php';
                    } elseif ($_GET['halaman'] == "kriteriatambah") {
                        include 'kriteriatambah.php';
                    } elseif ($_GET['halaman'] == "kriteriahapus") {
                        include 'kriteriahapus.php';
                    } elseif ($_GET['halaman'] == "kriteriaubah") {
                        include 'kriteriaubah.php';
                    } elseif ($_GET['halaman'] == "subkriteriatambah") {
                        include 'subkriteriatambah.php';
                    } elseif ($_GET['halaman'] == "subkriteriahapus") {
                        include 'subkriteriahapus.php';
                    } elseif ($_GET['halaman'] == "subkriteriaubah") {
                        include 'subkriteriaubah.php';
                    } elseif ($_GET['halaman'] == "penilaian") {
                        include 'penilaian.php';
                    } elseif ($_GET['halaman'] == "penilaiantambah") {
                        include 'penilaiantambah.php';
                    } elseif ($_GET['halaman'] == "penilaianedit") {
                        include 'penilaianedit.php';
                    } elseif ($_GET['halaman'] == "penilaianhapus") {
                        include 'penilaianhapus.php';
                    } elseif ($_GET['halaman'] == "prosesWaspas") {
                        include 'prosesWaspas.php';
                    } elseif ($_GET['halaman'] == "laporan") {
                        include 'laporan.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    }
                } else {
                    include 'home.php';
                }
                ?>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>

        <!-- tanggal dan waktu  -->
        <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
        else(a = tw.getTime());
        tw.setTime(a);
        var tahun = tw.getFullYear();
        var hari = tw.getDay();
        var bulan = tw.getMonth();
        var tanggal = tw.getDate();
        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "Nopember", "Desember");
        document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] +
            " " + tahun + " Jam " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10) ?
                "0" : "") + tw.getMinutes() + (" WIB ");
        </script>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- MORRIS CHART SCRIPTS -->
        <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
        <script src="assets/js/morris/morris.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>


</body>

</html>