
<?php
session_start();
//skrip koneksi
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Karyawan</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="config/loginRegister/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="config/loginRegister/css/style.css">
</head>
<style>
    a:hover{
        color: blueviolet;
    }
    .back{
        margin-left: 5em;
    }
</style>
<body>

    <div class="main">
<?php 
                    if (isset($_POST["signup"]))
                    {
                    $name= $_POST["name"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $password2 =$_POST["password2"];
                    $jabatan = $_POST["jabatan"];
                    $bagian = $_POST["bagian"];
                                       //cek password
                    if ($password !== $password2) {
                        
                     echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
                     echo "<script>location='register.php';</script>";

                     return false ;   
                    }

                    $ambil= $koneksi->query("SELECT * FROM karyawan WHERE email='$email'");
                    $yangcocok= $ambil->num_rows;
                    if ($yangcocok==1)
                    {
                     echo "<script>alert('Pendaftaran Gagal, Email Sudah digunakan');</script>";
                     echo "<script>location='register.php';</script>";
                     }
                     else{
                     $koneksi->query("INSERT INTO karyawan(nama,email,password,jabatan,bagian) VALUES('$name','$email','$password','$jabatan','$bagian')");

                     echo "<div class='alert alert-info'>Data tersimpan , silahkan Login</div>";
                     echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                     }
                     }
                    ?>
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Tambah Karyawan</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="password2"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password2" id="password2" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <label for="jabatan"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="jabatan" id="jabatan" placeholder="Jabatan"/>
                            </div>
                            <div class="form-group">
                                <label for="bagian"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="bagian" id="bagian" placeholder="Bagian"/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Tambah"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="config/loginRegister/images/1.jpg" alt="sing up image"></figure>

                        <a href="login.php" class="signup-image-link" type="button">Login</a>
                        <a href="login.php" class="signup-image-link back" type="button">Back to Home</a>
                    </div>
                </div>
            </div>
        </section>

        
    </div>

    <!-- JS -->
    <script src="assets/loginRegister/vendor/jquery/jquery.min.js"></script>
    <script src="assets/loginRegister/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>