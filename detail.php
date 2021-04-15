<?php 
	include "header.php";
	
	$sql="select * from produk where id_produk = $_GET[id]";
	$data=$dbh->query($sql)->fetch();
?>

<div class="container">
	<div class="row">
		<div class="col-sm-3 mb-3">
			<img src="gambar/<?php echo $data['gambar'] ?>" class="img-fluid" alt="">
		</div>
	
		<div class="col-sm-9">
			<h1><?php echo $data['nama_produk'] ?></h1>
			<hr>
			<h3>Rp <?php echo number_format($data['harga']) ?></h3>
			<p><?php echo $data['detail'] ?></p>

			<div class="row">
				<div class="col-sm-3">
					
					<h3>Pembelian</h3>
					<form action="" method="POST">
						<input type="hidden" name="nama_produk" value="<?php echo $data['nama_produk']?>">
						<input type="hidden" name="harga" value="<?php echo $data['harga']?>">
						<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>"><p>
						<input type="number" name="qty" class="form-control" placeholder="qty"><p>
						<textarea name="alamat_tujuan" class="form-control" placeholder="Alamat Tujuan" ></textarea> 
						<h4>Pembayaran</h4>
						<input type="radio" name="payment" value="Pembayaran anda akan dilakukan dengan COD"> COD
						<input type="radio" name="payment" value="Transaksi anda akan diproses setelah mentransfer ke rekening BCA dengan nomor rekening 123"> Transfer BCA<p>
						<input type="radio" name="payment" value="Transaksi anda akan diproses setelah mentransfer ke rekening BNI dengan nomor rekening 123"> Transfer BNI 
						<input type="submit" name="proses" value="Beli" class="btn btn-primary btn-block" href="detail.php">
					</form>
				</div>

				<?php  
					// var_dump($_POST);
					if (isset($_POST['proses'])) {

						include "admin/config.php";

						$produk = $_POST['nama_produk'];
						$harga = $_POST['harga'];
						$id_user = $_POST['id_user'];
						$qty = $_POST['qty'];
						$payment = $_POST['payment'];
						$alamat_tujuan = $_POST['alamat_tujuan'];
						$total_bayar = $harga*$qty;

						$sql = "INSERT INTO `transaksi`
									(`id_user`, `produk`, `qty`, `alamat_tujuan`, `harga_beli`, `total_bayar`, `payment`) 
								VALUES ('$id_user','$produk','$qty','$alamat_tujuan','$harga','$total_bayar','$payment')";
						$dbh->query($sql); 
				
				?>

				<div class="col-sm-9">
					<h3>INVOICE</h3>
					<h5>Nama 		: <?php echo $_SESSION['nama_user']?></h5>
					<h5>Harga		: Rp <?php echo number_format($harga)?></h5>
					<h5>Qty 		: <?php echo $qty?></h5>
					<h5>Alamat 		: <?php echo $alamat_tujuan ?></h5>	
					<h5>Pembayaran	: <?php echo $payment ?></h5>
					<h5>Total		: <?php echo $total_bayar ?></h5>	
				</div>

			<?php } ?>


			</div>
		</div>
	</div>
</div>
<?php 
  include "footer.php";
?>