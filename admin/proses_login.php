<?php
include "config.php";

$user = $_POST['user'];
$pass = md5($_POST['pass']);

$sql= "select * from pemilik where username = '$user' and password = '$pass' and status = 'on'";
$data = $dbh->query($sql)->fetch();
//print_r($data);

if($data){
	session_start();
	$_SESSION['id_pmlk'] = $data['id_pmlk'];
	$_SESSION['nama'] = $data['nama_lgkp'];
	$_SESSION['hak'] = $data['hak'];
	header('location:home.php');
}
else{
	header('location:index.php');
}

 
?>