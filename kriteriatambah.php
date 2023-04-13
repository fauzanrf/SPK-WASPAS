<!-- mengambil data barang dengan kode paling besar -->
<?php $query = mysqli_query($koneksi, "SELECT max(kode_kriteria) as kodeTerbesar FROM kriteria");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
 
	// <!-- mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int) -->
	$urutan = (int) substr($kodeBarang, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya -->
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG  -->
	$huruf = "C";
	$kodeBarang = $huruf . sprintf("%03s", $urutan);
	?>
<h2>Tambah Kriteria</h2>
<a href="index.php?halaman=kriteria" class=" btn btn-warning  pull-right">
    << Kembali </a>
        <br>
        <br>
        <form method="post">
            <div class="form-group">
                <label>Kode Kriteria</label>
                <input type="text" class="form-control" name="kode" required="required">
            </div>
            <div class="form-group">
                <label>Nama Kriteria</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bobot</label>
                <input type="double" class="form-control" name="bobot">
            </div>
            <button class="btn btn-primary" name="save">Simpan</button>
        </form>
        <?php
        if (isset($_POST['save'])) {
            $koneksi->query("INSERT INTO kriteria (kode_kriteria,nama_kriteria,bobot) VALUES('$_POST[kode]','$_POST[nama]','$_POST[bobot]')");
            echo "<div class='alert alert-info'>Data tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kriteria'>";
        }
        ?>