<?php
try{
	$dbh = new PDO('mysql:host=localhost;dbname=lat_ecommerce', 'root', '');
}

catch (PDOException $e) {
    print "Ada kesalahan: " . $e->getMessage() . "<br/>";
    die();
}
?>