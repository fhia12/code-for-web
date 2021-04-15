<?php include "header.php" ?>

<!-- <style>
	.card{
		height: 400px;
	}
</style> -->

<div class="container">
	<div class="jumbotron">
	  <h1 class="display-4">Selamat Datang di Toko Buku XYZ</h1>
	  	<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
	  	<hr class="my-4">
	  	<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
	  	<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
	</div>

<div class="row">
	<?php 
  			$sql="select * from produk order by id_produk desc limit 4";
  			$data=$dbh->query($sql);
  			$no=1;
  			foreach ($data as $field) {
  		?>

  	<div class="col-sm-4 col-md-3 mb-3">
		<div class="card" >
		  <img src="gambar/<?php echo $field['gambar'] ?>" alt="" class="card-img-top">
		  	<div class="card-body">
		    <h5 class="card-title"><?php echo $field['nama_produk'] ?></h5>
		    <p class="card-text"><?php echo $field['detail'] ?></p>
		    <a href="#" class="btn btn-primary">Go somewhere</a>
	  		</div>
		</div>
	</div>
	<?php } ?>

</div>
</div>

<?php 
  include "footer.php";
?>