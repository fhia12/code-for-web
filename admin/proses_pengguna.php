<?php 
	
	include "config.php";

	$nama = $_POST['nama'];
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$hak = $_POST['hak'];
	$status = $_POST['status'];
	$id = $_POST['id'];

	// var_dump($_POST);

	// die();

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM `pemilik` WHERE `id_pmlk` = $id";
		$dbh->query($sql);  
	}
	else if (!isset($id)) {	
		$sql = "INSERT INTO pemilik
				(id_pmlk,nama_lgkp, username, password, hak, status) 
				VALUES (null,'$nama','$user','$pass','$hak','$status')";
		$dbh->query($sql);
	}else if (isset($id)) {

		$sql = "UPDATE `pemilik` SET `nama_lgkp` = '$nama',
										`username` = '$user',
										`hak` = '$hak',
										`status` = '$status'
										WHERE id_pmlk = $id";
		$dbh->query($sql);
	}



	header('location:pengguna.php');

?>