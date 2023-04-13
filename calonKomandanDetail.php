<h2>Detail Calon Komandan</h2>
<a href="index.php?halaman=calonKomandan" class=" btn btn-warning pull-right">
    << Kembali </a>
        <?php
        $ambil = $koneksi->query("SELECT * FROM karyawan WHERE id_karyawan='$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        ?>
        <!-- <pre>
    <?php print_r($detail); ?>
</pre> -->
        <h2><strong><?php echo $detail['nama']; ?></strong> </h2>

        <form method="post">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" required="required"
                    value="<?php echo $detail['nama']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" required="required"
                    value="<?php echo $detail['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <input type="double" class="form-control" name="jabatan" required="required"
                    value="<?php echo $detail['jabatan']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Bagian</label>
                <input type="double" class="form-control" name="bagian" required="required"
                    value="<?php echo $detail['bagian']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="double" class="form-control" name="alamat" required="required"
                    value="<?php echo $detail['alamat']; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="text" class="form-control" name="Photo" required="required"
                            value="<?php echo $detail['blangko']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <br>
                    <button><a href="download.php?file=<?php echo $detail['blangko'] ?>" class="btn btn-primary"><span
                                class="glyphicon glyphicon-download"></span> Download</a></button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <br>
                        <br>
                        <label>Hasil Penilaian</label>
                        <input type="double" class="form-control" name="hasil" required="required"
                            value="<?php echo $detail['hasil']; ?>" readonly>
                    </div>
                </div>
            </div>
            <input type="submit" name="save" value="Simpan Perubahan" class="btn btn-success">
        </form>
        <?php
        if (isset($_POST['save'])) {
            $ket = $_POST["ket"];
            $koneksi->query("UPDATE karyawan SET keterangan='$ket' WHERE id_karyawan='$_GET[id]'");
            echo "<div class='alert alert-info'>Data tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=calonKomandan'>";
        }
        ?>