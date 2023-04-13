<?php

    // ambil nilai kriteria
    $kriteria = [];
    $result = $koneksi->query('SELECT * FROM kriteria ORDER BY id_kriteria ASC');
    $index = 0;
    while($row = mysqli_fetch_array($result)):
        $kriteria['id_kriteria'][$index] = $row['id_kriteria'];
        $kriteria['kode_kriteria'][$index] = $row['kode_kriteria'];
        $kriteria['nama_kriteria'][$index] = $row['nama_kriteria'];
        $kriteria['bobot'][$index] = $row['bobot'];

        $index+=1;
    endwhile;

    // mengambil nilai alternatif
    $alternatif = null;
    $result = $koneksi->query('SELECT * FROM karyawan WHERE id_karyawan="'.$_GET['id_karyawan'].'"');
    if($result->num_rows > 0) {
        $alternatif = $result->fetch_assoc();
    } else {
        echo "<script>";
        echo "alert('Data yang anda pilih tidak ditemukan!');";
        echo "window.location = 'index.php?halaman=penilaian';";
        echo "</script>";
    }

    // ambil penilaian dari sialternatif
    $result = $koneksi->query('SELECT * FROM penilaian WHERE id_karyawan="'.$_GET['id_karyawan'].'" ORDER BY id_kriteria ASC');
    if($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)):
            $penilaian['id_penilaian'][$row['id_kriteria']] = $row['id_penilaian'];
            $penilaian['nilai_bobot'][$row['id_kriteria']] = $row['nilai_bobot'];
        endwhile;
    
        $alternatif['penilaian'] = $penilaian;
    } else {
        echo "<script>";
        echo "alert('Data nilai pada alternatif yang anda pilih tidak ditemukan!. Silahkan tambah terlebih dahulu!');";
        echo "window.location = 'index.php?halaman=penilaiantambah';";
        echo "</script>";
    }

?>

 <h2>Edit Penilaian <strong> <?= $alternatif['nama']?></strong> </h2>
 <a href="index.php?halaman=penilaian" class=" btn btn-warning  pull-right">
     << Kembali </a>
         <br>
         <br>
         <form method="post">
<br>

             <table class="table table-bordered">
                 <thead>
                     <th>No</th>
                     <th>Kode Kriteria</th>
                     <th>Kriteria</th>
                     <th>Bobot Kriteria</th>
                 </thead>
                 
                 <tbody>
                    <?php
            
                        $no=1;

                        foreach ($kriteria['id_kriteria'] as $key1 => $data1):
                    ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $kriteria['kode_kriteria'][$key1] ?></td>
                                <td>
                                    <input type='text' name ='kriteria' class='form-control' value='<?= $kriteria['nama_kriteria'][$key1] ?>' readonly>
                                </td>
                                <td>
                                    <select name="nilai_bobot[<?= $data1 ?>]" id="nilai_bobot" class="form-control">
                                        <option disabled="disabled" selected>--Pilih--</option>
                                        <option value="4" <?= ($alternatif['penilaian']['nilai_bobot'][$data1] == 4) ? "selected" : "" ?>> Sangat Baik</option>
                                        <option value="3" <?= ($alternatif['penilaian']['nilai_bobot'][$data1] == 3) ? "selected" : "" ?>> Baik</option>
                                        <option value="2" <?= ($alternatif['penilaian']['nilai_bobot'][$data1] == 2) ? "selected" : "" ?>> Cukup Baik</option>
                                        <option value="1" <?= ($alternatif['penilaian']['nilai_bobot'][$data1] == 1) ? "selected" : "" ?>> Tidak Baik</option>
                                    </select>
                                </td>
                            </tr>
                    <?php
                            $no++;
                        endforeach;

                    ?>
                 </tbody>
             </table>
             
             <button class="btn btn-primary" name="Ubah">Ubah</button>
         </form>

         <?php
         
            if (isset($_POST['Ubah'])) {
                $bobot = $_POST['nilai_bobot'];

                foreach ($bobot as $key => $data) {
                    $koneksi->query("UPDATE penilaian SET nilai_bobot='".$data."' WHERE id_karyawan='".$_GET['id_karyawan']."' AND id_kriteria='".$key."'");

                    echo "<div class='alert alert-info'>Data tersimpan</div>";
                }

                echo "<script>";
                echo "alert('Data berhasil diperbarui!');";
                echo "window.location = 'index.php?halaman=penilaian';";
                echo "</script>";
            }
    
        ?>