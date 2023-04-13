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
$alternatif = [];
$result = $koneksi->query('SELECT * FROM karyawan ORDER BY id_karyawan ASC');
$index = 0;
while($row = mysqli_fetch_array($result)):
    $alternatif['id_karyawan'][$index] = $row['id_karyawan'];
    $alternatif['nama'][$index] = $row['nama'];

    $index+=1;
endwhile;

// ambil nilai penilaian setiap alternatif
foreach ($alternatif['id_karyawan'] as $key => $data) {
    $penilaian = [];
    $result = $koneksi->query('SELECT * FROM penilaian WHERE id_karyawan="'.$data.'" ORDER BY id_kriteria ASC');

    if($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)):
            $penilaian['id_penilaian'][$row['id_kriteria']] = $row['id_penilaian'];
            $penilaian['nilai_bobot'][$row['id_kriteria']] = $row['nilai_bobot'];
        endwhile;
    
        $alternatif['penilaian'][$key] = $penilaian;
    }
}

?>

<h2> Data Penilaian</h2>
<a href="index.php?halaman=penilaiantambah" class="btn btn-primary">Tambah Penilaian</a>
<a href="cetak_datanilai.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a>
<br>
<br>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon Komandan</th>

            <?php
                for ($i=0; $i < count($kriteria['id_kriteria']); $i++) :
            ?>
            <th><?php echo $kriteria['kode_kriteria'][$i]; ?></th>
            <?php
                endfor;
            ?>

            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
            if(!isset($alternatif['penilaian'])) :
        ?>
        <tr>
            <td colspan="<?php echo (3 + count($kriteria['kode_kriteria'])) ?>" align="center">Tidak Ada Data Penilaian
            </td>
        </tr>
        <?php
            else:
                $index = 1;
                foreach ($alternatif['penilaian'] as $key1 => $data) {
                    if(count($data) < 1) {
                        continue;
                    }

                    echo "<tr>";
                    echo "<td>" . $index . "</td>";
                    echo "<td>" . $alternatif['nama'][$key1] . "</td>";

                    foreach ($kriteria['id_kriteria'] as $key2 => $data2) {
                        if($data2 == "" || $data2 == null) {
                            echo "<td> Nilai Kosong </td>";
                        } else {
                            echo "<td>" . $data['nilai_bobot'][$data2] . "</td>";
                        }
                    }

                    echo "<td>";
                    echo '<a href="index.php?halaman=penilaianedit&id_karyawan='.$alternatif['id_karyawan'][$key1].'" class="btn-warning btn">Edit</a>  ';
                    echo '<a href="index.php?halaman=penilaianhapus&id_karyawan='.$alternatif['id_karyawan'][$key1].'" class="btn-danger btn" onclick="return confirm(\'Apakah yakin ingin menghapus data penilaian?\');">Hapus</a>';
                    echo "</td>";

                    echo "</tr>";

                    $index++;
                }
            endif;
        ?>
    </tbody>
</table>

<a href="index.php?halaman=prosesWaspas" class="btn btn-primary">Proses Perhitungan</a>