<?php
include '../config/koneksi.php';

$nilai_max = $koneksi->query("SELECT id_kriteria, MAX(nilai_bobot) As nilai_max 
FROM penilaian GROUP BY id_kriteria");

$penilaian = $koneksi->query("SELECT * FROM penilaian");

//  tabel kriteria
$kriteria = $koneksi->query("SELECT * FROM kriteria");
// ambil bobot kriteria 
     while ($row_kriteria = mysqli_fetch_array($kriteria)) {
     $id_kriteria = $row_kriteria['id_kriteria'];
     $bobot = $row_kriteria['bobot'];
     $bobot_kriteria []= $bobot;
     }
// tabel penilaian
$karyawan = $koneksi->query("SELECT * FROM karyawan");
// ambil bobot kriteria 
     while ($row_komandan = mysqli_fetch_array($karyawan)) {
     $id_karyawan = $row_komandan['id_karyawan'];
     $nama_calon = $row_komandan['nama'];
     $nama []= $nama_calon;
     }
//      while ($row_kriteria = mysqli_fetch_array($kriteria)) {
//      $id_karyawan = $row_table1['id_karyawan'];
//      $id_komandan = $row_table1['id_komandan'];

//      $select_table2  = "select * from table2 where type in('$type') and category in('$category')";
//      $connect_table2 = mysqli_query($con, $select_table2);
//      while ($row_table2 = mysqli_fetch_array($connect_table2)) {
//           $amount = $row_table2['amount'];
//           $myArray[] = $amount;
//      }
// }
// $maxAmount = max($myArray);
$j_nama=count($nama);
for ($x=0; $x<$j_nama ; $x++);{

print_r($nama) ;

}


// 'br';
// echo $bobot_kriteria[2];
$ambil = $koneksi->query("SELECT * FROM penilaian  JOIN karyawan ON 
        karyawan.id_karyawan=penilaian.id_karyawan
         JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria
         group by penilaian.id_kriteria,penilaian.id_karyawan
         ");

$penilaian = $koneksi->query("SELECT * FROM penilaian group by id_karyawan");

$html = '<table class="table table-bordered">';

while($row = mysqli_fetch_array($ambil)) 
{
	$html .= 
    '<thead>
  
            <th>No </th>
            <th>'. $row['nama_kriteria'] .' </th>

        </thead>
        <tbody>
        '
        ;
    // '<tr> <td>' 
    // . $row['nilai_bobot'] . ' </td></tr>';
	
	$sql_subkat 	= 'SELECT nilai_bobot FROM penilaian WHERE id_kriteria = ' . $row['id_kriteria'];
	$query_subkat 	= mysqli_query($koneksi, $sql_subkat);
	while($row_subkat = mysqli_fetch_array($query_subkat)) {
		$html .= '<tr>' . $row_subkat['nilai_bobot'] . '</tr>';
	}
	// $html .= '</table>';
}
$html .= ' </tbody></table>';
echo $html;

?>