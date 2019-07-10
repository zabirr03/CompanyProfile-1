<?php 
	$koneksi = new mysqli("localhost","root","","progresss_bisnis_db_ridho");

	$id_news = $_POST['id_news'];
	$title = htmlentities($_POST['title'],ENT_QUOTES);
	$description = htmlentities($_POST['description'],ENT_QUOTES);
	$image_old = $_POST['image_old'];

	// ini adalah kondisi jika images tidak ada error atau sebuah images ada dimasukkan file baru
	if($_FILES['images']['error'] == 0){
		//jika kondisi diatas benar maka file image yg baru tersebut akan di upload kedalam sebuah folder yg ditentukan.
		$image = $_FILES['images']['name'];
		move_uploaded_file($_FILES['images']['tmp_name'],'../../news_images/'.$image);
	//perintah sql untuk memasukan data-data yg diupdate ke dalam masing2 field yg ada didalam tabel tersebut.
	$sql = "UPDATE news_tbl SET title = '$title', description = '$description', images = '$image' WHERE id_news = $id_news";
	
//	echo $sql; exit;

} else {
	//jika ketika edit form adminnya tidak memasukan gambar baru maka panggil image_old / image lama
	$sql = "UPDATE news_tbl SET title = '$title', description = '$description', images = '$image_old' WHERE id_news = $id_news";
	
//	echo $sql; exit;
}

$qnews = $koneksi->query($sql);

header("location:../news_admin.php");

?>