<?php 
//ambil var name
$username = $_POST['username'];
$password = $_POST['password'];
//config $mysqli local
include "../../config/config.php";
//start session login
session_start();
//panggil data dari database (tabel)
$sql= "SELECT * FROM admin_tbl WHERE username = '$username' and password = '$password'";
$quser = $koneksi->query($sql);
$rowuser = $quser->fetch_assoc();
//logic
if(!empty($rowuser)){
	$_SESSION['username'] = $username;
	header("location:../news_admin.php");
}else {
	header("location:../index.php?error1");
}

?>