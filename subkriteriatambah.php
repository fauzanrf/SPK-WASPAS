

<h2>Tambah Sub-Kriteria</h2>
<a href="index.php?halaman=subkriteria" class=" btn btn-warning  pull-right">
    << Kembali </a>
        <br>
        <br>
        <form method="post">
        <div class="form-group">
        <label>Kode Kriteria</label>
                <select name="id_kriteria" id="id_kriteria" class="form-control" onchange='changeValue(this.value)' required >  
                          <?php   
                          $query = mysqli_query($koneksi, "select * from kriteria order by id_kriteria esc");  
                          $result = mysqli_query($koneksi, "select * from kriteria");  
                          $a          = "var nama_kriteria = new Array();\n;";  
                        
                          while ($row = mysqli_fetch_array($result)) {  
                               echo '<option name="id_kriteria" value="'.$row['id_kriteria'] . '">' . $row['kode_kriteria'] . '</option>';   
                          $a .= "nama_kriteria['" . $row['id_kriteria'] . "'] = {nama_kriteria:'" . addslashes($row['nama_kriteria'])."'};\n";  
                          
                          }  
                          ?>  
                     </select>
            </div>
            <div class="form-group">
                <label>Nama Kriteria</label>
                <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" required readonly>
            </div>
            <div class="form-group">
                <label>Nama Sub-Kriteria</label>
                <input type="text" class="form-control" name="nama_sub" required>
            </div>
            <div class="form-group">
                <label>Bobot</label>
                <input type="double" class="form-control" name="bobot_sub" required>
            </div>
            <button class="btn btn-primary" name="save">Simpan</button>
        </form>
        <?php
        if (isset($_POST['save'])) {
            $koneksi->query("INSERT INTO sub_kriteria (id_kriteria,nama_sub,bobot_sub) VALUES('$_POST[id_kriteria]','$_POST[nama_sub]','$_POST[bobot_sub]')");
            echo "<div class='alert alert-info'>Data tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=subkriteria'>";
        }
        ?>
        <script type="text/javascript">   
                          <?php   
                          echo $a;   
                        ?>  
                          function changeValue(id){  
                            document.getElementById('nama_kriteria').value = nama_kriteria[id].nama_kriteria;  
                         
                          };  
                          </script>  