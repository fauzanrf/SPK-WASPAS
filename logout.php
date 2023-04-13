<?php
	session_destroy();
	echo "<script>alert ('Anda Sudah Logout');</script>";
    echo "<script>location='login.php';</script>";
?>