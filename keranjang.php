<?php include "header.php";

$sql="select * from produk where id_produk = $_GET[id]";
$data=$dbh->query($sql)->fetch();



?>

<div class="container">
	<div class="row">

		<div class="col-sm-3">
			<form action="produk.php" method="POST">
				<input type="submit" value="Back" class="btn btn-primary btn-block">
			</form>	
		</div>

		<div class="col-sm-9">
			
					<h3>Invoice</h3>

						<h5>Nama 		: </h5><?php echo $field["nama_lengkap"] ?><p>
						<h5>Harga		: </h5><?php echo number_format($data['harga']) ?><p>
						<h5>Qty 		: </h5><p>
						<h5>Email 		: </h5><?php echo $field["email"] ?><p>
						<h5>Alamat 		: </h5><?php echo $field["alamat"] ?><p>	
						<h5>Pembayaran	: </h5><p>
						<h5>Total		: </h5><p>	

			
		</div>
		</div>
	</div>
</div>

<?php 
  include "footer.php";
?>
