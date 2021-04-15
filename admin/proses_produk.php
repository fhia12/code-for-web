<?php 
	
	// var_dump($_FILES);
	// var_dump($_POST);
	// die();
	include "config.php";

	$nama_produk = $_POST['nama_produk'];
	$nama_kat = $_POST['kategori'];
	$harga = $_POST['harga'];
	$berat = $_POST['berat'];
	$detail = $_POST['detail'];
	$status = $_POST['status'];

	$nama_gambar = rand(0,100000).'-'.$_FILES['gambar']['name'];
	$tmp_file = $_FILES['gambar']['tmp_name'];
	$ukuran = $_FILES['gambar']['size'];
	$tipe = $_FILES['gambar']['type'];
	$tipe_file = array('image/jpeg','image/jpg','image/png');

	$id = $_POST['id'];
	$gambar_lama = $_POST['gambar_lama'];



	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM `produk` WHERE `id_produk` = $id";
		$dbh->query($sql);  
	}
	else if (!isset($id)) {//buat insert
		if ($ukuran< 1000000 && in_array($tipe, $tipe_file)===true) {
			move_uploaded_file($tmp_file, '../gambar/'.$nama_gambar);
			echo "berhasil";
			$sql = "INSERT INTO produk values (null, '$nama_kat', '$nama_produk', '$harga', '$berat', '$detail', '$nama_gambar', '$status')";
			$dbh->query($sql);
		}
		else{
			echo "gagal";
		}

	}
	else {//buat edit
			if (empty($tmp_file)) {//tdk ganti gambar
				$sql = "UPDATE `produk` SET 
										`id_kp`='$nama_kat',
										`nama_produk`='$nama_produk',
										`harga`='$harga',
										`berat`='$berat',
										`detail`='$detail',
										`status`='$status' 

						WHERE id_produk = $id";
				$dbh->query($sql);
		}
		else{
			if ($ukuran< 1000000 && in_array($tipe, $tipe_file)===true) {
				move_uploaded_file($tmp_file, '../gambar/'.$nama_gambar);
				unlink('../gambar/'.$gambar_lama);
				$sql = "UPDATE `produk` SET 
									`id_kp`='$nama_kat',
									`nama_produk`='$nama_produk',
									`harga`='$harga',
									`berat`='$berat',
									`detail`='$detail',
									`gambar`='$nama_gambar',
									`status`='$status' 

					WHERE id_produk = $id";
			$dbh->query($sql);
			}
			else{
				echo "gagal";
			}
		}
	}


	header('location:produk.php');
?>