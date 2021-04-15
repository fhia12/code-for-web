<?php 
	
	include "config.php";

	$nama = $_POST['nama'];
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
	$alamat = $_POST['alamat'];
	$id = $_POST['id'];

	// var_dump($_POST);

	// die();

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM `user` WHERE `id_user` = $id";
		$dbh->query($sql);  
	}
	else if (!isset($id)) {	
		$sql = "INSERT INTO user
				(id_user,nama_lengkap, username, password, email, alamat, no_hp) 
				VALUES (null,'$nama','$user','$pass','$email','$alamat', '$telepon')";
		$dbh->query($sql);
	}else if (isset($id)) {

		$sql = "UPDATE `user` SET `nama_lengkap` = '$nama',
										`username` = '$user',
										`password` = '$pass',
										`email` = '$email',
										`no_hp` = '$telepon',
										`alamat` = '$alamat'

										WHERE id_user = $id";
		$dbh->query($sql);
	}



	header('location:pembeli.php');

?>