<?php
    include('../assets/hasil-laporan/plugins/dompdf/autoload.inc.php');
    include('../config/koneksi.php');
    ob_start();
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Penilaian Karyawan </title>

    <style>
    .table {
        width: 100%;
        background-color: transparent;
        border-collapse: collapse;
        display: table;
    }

    .table tr th {
        background: green;
        color: #fff;
        font-weight: normal;
    }
    </style>
</head>

<body>
    <center>
        <h1>Laporan Data Penilaian Karyawan</h1>

        <hr /><br /><br /><br />

        <table class="table" border="1px">
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


                </tr>
            </thead>

            <tbody>
                <?php
            if(!isset($alternatif['penilaian'])) :
        ?>
                <tr>
                    <td colspan="<?php echo (3 + count($kriteria['kode_kriteria'])) ?>" align="center">Tidak Ada Data
                        Penilaian
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

                    

                    echo "</tr>";

                    $index++;
                }
            endif;
        ?>
            </tbody>
        </table>
    </center>

    <br><br><br>

</body>

</html>

<?php
$html = ob_get_clean();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('data_nilai.pdf');
?>