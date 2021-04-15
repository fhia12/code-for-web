<?php 
	
	include "config.php";

	$nama_kat = $_POST['nama_kat'];
	$id = $_POST['id'];

if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM `kat_produk` WHERE `id_kp` = $id";
		$dbh->query($sql);  
	}
	else if (!isset($id)) {	
		$sql = "INSERT INTO kat_produk (id_kp, nama_kat) VALUES (null,'$nama_kat')";
		$dbh->query($sql);
	}else if (isset($id)) {

		$sql = "UPDATE `kat_produk` SET `nama_kat` = '$nama_kat'
										
										WHERE id_kp = $id";
		$dbh->query($sql);
	}

	header('location:kategori.php');

?>