<?php

$koneksi = new mysqli("localhost","root","","progresss_bisnis_db_ridho");

$id_news = $_GET['id_news'];
$sql = "DELETE FROM news_tbl WHERE id_news = $id_news";

$query = $koneksi->query($sql);

header("location:../news_admin.php");


?>