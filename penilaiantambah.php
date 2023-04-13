 <?php 

    $ambil_kriteria = $koneksi->query("SELECT * FROM kriteria");
    $ambil_karyawan = $koneksi->query("SELECT * FROM karyawan");
    //    hitung jumlah data kriteria []
    $j_kriteria = mysqli_num_rows($ambil_kriteria);
    // gitung jumlah data karyawan
    $j_karyawan = mysqli_num_rows($ambil_karyawan);
    ?>

 <h2>Tambah Penilaian</h2>
 <a href="index.php?halaman=penilaian" class=" btn btn-warning  pull-right">
     << Kembali </a>
         <br>
         <br>
         <form method="post" action="penilaiantambahproses.php">
         <label for="karyawan">Nama Karyawan</label>
<select name="karyawan" id="karyawan" class="form-control" style="color:brown" required>
	<option disabled="disabled" selected="selected"> - Pilih -</option>
	<?php  
	while($pecah = $ambil_karyawan->fetch_assoc()) {
		echo '<option value="'.$pecah['id_karyawan'].'">'.$pecah['nama'].'</option>';
	}
	?>
</select>
<br>
<br>

             <table class="table table-bordered">
                 <thead>
                     <th>No</th>
                     <th>Kode Kriteria</th>
                     <th>Kriteria</th>
                     <th>Bobot Kriteria</th>
                 </thead>
                 <tbody>
                 <?php $nomor = 1; 
                 ?>
                            <?php while ($pecah_kriteria = $ambil_kriteria->fetch_assoc()) { ?>
                                <tr>
                        
                         <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah_kriteria['kode_kriteria']; ?></td>
                                <td><input type="text" name ="kriteria" class="form-control" value="<?php echo $pecah_kriteria['nama_kriteria'];?>" readonly></td>
                         <!-- <td name=""></td> -->
                                <input type='hidden' name='id_kriteria[]' value='<?php echo $pecah_kriteria['id_kriteria'];?>'>
                             <td> <select name="nilai_bobot[]">
                                     <option disabled="disabled" selected="selected">--Pilih--</option>
                                     <option value="4">Sangat Baik</option>
                                     <option value="3"> Baik</option>
                                     <option value="2">Cukup Baik</option>

                                     <option value="1">Kurang Baik</option>
                                 </select></td>

                     <?php $nomor++; ?>
                         <?php } ?>
                     </tr>

                    
                 </tbody>
             </table>
             
             <button class="btn btn-primary" name="save">Simpan</button>
         </form>
         