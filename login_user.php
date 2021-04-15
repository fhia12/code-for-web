<?php
include "admin/config.php";

$user = $_POST['user'];
$pass = md5($_POST['pass']);

$sql= "select * from user where username = '$user' and password = '$pass' ";
$data = $dbh->query($sql)->fetch();
//print_r($data);

if($data){
	session_start();
	$_SESSION['id_user'] = $data['id_user'];
	$_SESSION['nama_user'] = $data['nama_lengkap'];
	header('location:index.php');
}
else{
	header('location:index.php');
}

 
?>