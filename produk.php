<?php include "header.php" ?>


<div class="container">
	<div class="row">
		<div class="col-sm-3 mb-3">
			<div class="list-group">
				<?php 
					$sql = "select * from kat_produk";
					$data = $dbh->query($sql);
					foreach ($data as $kat) {
				?>
					<a href="produk.php?kateg=<?php echo $kat['id_kp'] ?>" class="list-group-item list-group-item-action"><?php echo $kat['nama_kat'] ?></a>
				<?php } ?>
			</div>
		</div>
	
	<div class="col-sm-9">
		<h1>Produk</h1>
		<div class="row">
			<?php 
				if (isset($_GET['kateg'])) {
					$kateg = $_GET['kateg'];
					$sql="select * from produk where id_kp = $kateg order by id_produk desc";
				}
				else{
					$sql="select * from produk order by id_produk desc";
				}
	  			$data=$dbh->query($sql);
	  			foreach ($data as $field) {
  			?>
			<div class="col-sm-3  mb-3">
				<div class="card" >
				  <img src="gambar/<?php echo $field['gambar'] ?>" class="card-img-top" alt="">
				  	<div class="card-body">
				    <h5 class="card-title"><?php echo $field['nama_produk'] ?></h5>
				    <hr>
				    <p>Rp <?php echo number_format($field['harga']) ?></p>

				    <a href="detail.php?id=<?php echo $field['id_produk'] ?>" class="btn btn-primary">Detail</a>
			  		</div>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</div>
</div>
<?php 
  include "footer.php";
?>