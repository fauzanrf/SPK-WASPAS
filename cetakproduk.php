<?php

require_once __DIR__ . '/vendor/autoload.php';
include '../koneksi.php';
$mpdf = new \Mpdf\Mpdf();
$html= '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
     <link href="assets/css/custom.css" rel="stylesheet" />
	<title>Laporan Stok Produk E-warong KUBE Kec. Medan Sunggal</title>
</head>
<body>
	<h1>Laporan Stok Produk E-warong KUBE Kec. Medan Sunggal</h1>
	<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>';
    $nomor=1;
         $ambil=$koneksi->query("SELECT * FROM produk");
        while($pecah = $ambil->fetch_assoc()){;
        	$html.=    '<tr>
        				<td>'.$nomor++.'</td>
        				<td>'.$pecah["nama_produk"].'</td>
        				<td> Rp.'.number_format($pecah["harga_produk"]).'</td>
        				<td>'.$pecah["stok_produk"].'</td>
        				<td><img src="../foto_produk/'.$pecah["foto_produk"].'" width="50"></td>


        	</tr>';
        };
$html.=    '
		</tbody>
</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();?>