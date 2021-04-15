<?php include 'header.php' ;
//bagian untuk mengeksekusi saat user melakukan aksi
	if (isset($_GET['id'])){
		$id= $_GET['id'];
		$sql = "select * from produk where id_produk = $id";
		$data = $dbh->query($sql)->fetch();
		$btn = 'success';
		$kata = 'edit';
	}
	else{
		$data = [
					'nama_produk'=>'',
					'id_kp'=>'',
					'harga'=>'',
					'berat'=>'',
					'gambar'=>'',
					'detail'=>'',
					'status'=>''
				];
	    $btn = 'primary';
		$kata = 'tambah';
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h1>Tambah Produk</h1>
			<form action="proses_produk.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="nama_produk" value="<?php echo $data['nama_produk'] ?>" class="form-control" placeholder="Nama Produk" required=""><br>
				<select name="kategori" class="form-control">
					<?php 
					$sql= "select * from kat_produk";
					$datakat = $dbh->query($sql);
					foreach ($datakat as $kat) {
						if ($data['id_kp'] == $kat['id_kp']) {
							$add = 'selected';
						}
						else{
							$add = '';
						}
						echo "<option value='$kat[id_kp]' $add >$kat[nama_kat]</option>";
					  }  
					  ?>
				</select><br>

				<input type="number" name="harga" value="<?php echo $data['harga'] ?>" class="form-control" placeholder="Harga" required=""><br>
				<input type="text" name="berat" value="<?php echo $data['berat'] ?>" class="form-control" placeholder="Berat" required=""><br>
				<textarea name="detail" class="form-control" id="" rows="5" placeholder="Detail"><?php echo $data['detail'] ?></textarea><br>
				<p>Silahkan upload gambar produk</p>
				<input type="file" name="gambar" class="form-control" >
				<img src="../gambar/<?php echo $data['gambar'] ?>" alt="" height="70px">
				<h6 style="color: red">* max 1 mb</h6>
				<br>
				<p>Status</p>
				<select name="status" class="form-control">
					<?php 
						$status = array(
									'on' => 'Aktif',
									'off' => 'Tidak Aktif'
								);
						foreach ($status as $key => $value) {
							if ($data['status'] == $key) {
								$add = 'selected';
							}
							else{
								$add = '';
							}
					 		echo "<option value='$key' $add >$value</option>";
					 	}  
					?>
		  		</select><br>
		  		<?php if (isset($id)): ?>
		  		<input type="hidden" name="id" value="<?php echo $id ?>">
		  		<input type="hidden" name="gambar_lama" value="<?php echo $data['gambar'] ?>">
		  		<?php endif ?>
		  		<input type="submit" value="Tambah" class="btn btn-primary btn-block">
			</form>
		</div>

		<div class="col-md-8">
			<h1>Table Produk</h1>
  		<table class="table" border="1">
  			<thead class="bg-info">
	  			<tr>
	  				<th>No</th>
	  				<th>Nama Barang</th>
	  				<th>Kategori</th>
	  				<th>Harga</th>
	 				<th>Gambar</th>
	 				<th>Status</th>
	 				<th>Aksi</th>
	 			</tr>
  			</thead>
  			<tbody>
  				<?php 
  					$sql="select * from produk,kat_produk where produk.id_kp = kat_produk.id_kp order by id_produk desc";
  					$data=$dbh->query($sql);
  					$no=1;
  					foreach ($data as $field) {
  					 ?>
  					
  				<tr>
  					<td><?php echo $no ?></td>
  					<td><?php echo $field["nama_produk"] ?></td>
  					<td><?php echo $field["nama_kat"] ?></td>
  					<td><?php echo $field["harga"] ?></td>
  					<td><img src="../gambar/<?php echo $field['gambar'] ?>" alt="" height="70px"></td>
  					<td><?php echo $field["status"] ?></td>
  					<td>
						<a href="produk.php?id=<?php echo $field['id_produk'] ?>" class="btn btn-success">Edit </a>
						<a href="proses_produk.php?id=<?php echo $field['id_produk'] ?>" class="btn btn-danger" >Hapus</a>
						</td>
  				</tr>
  			<?php $no++; } ?>
  			</tbody>
  		</table>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>