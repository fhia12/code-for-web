<?php include 'header.php';
//bagian untuk mengeksekusi saat user melakukan aksi
	if (isset($_GET['id'])){
		$id= $_GET['id'];
		$sql = "select * from kat_produk where id_kp = $id";
		$data = $dbh->query($sql)->fetch();
		$btn = 'success';
		$kata = 'edit';
	}
	else{
		$data = [
					'nama_kat'=>''
				];
	    $btn = 'primary';
		$kata = 'tambah';
	}

?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h1>Tambah Barang</h1>
			<form action="proses_kategori.php" method="POST">
				<?php if (isset($id)): ?>
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<?php endif ?>
				<input type="text" name="nama_kat" value="<?php echo $data['nama_kat'] ?>" class="form-control" placeholder="Nama Barang" required=""><br>
				<input type="submit" value="<?php echo $kata ?>" class="btn btn-<?php echo $btn ?>">
			</form>
		</div>
		<div class="col-md-8">
			<h1>Kategori Barang</h1>
			<table class="table" border="1">
				<thead class="bg-info">
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
  					$sql="select * from kat_produk";
  					$data=$dbh->query($sql);
  					$no=1;
  					foreach ($data as $field) {
  					 ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $field['nama_kat']; ?></td>
						<td>
							<a href="kategori.php?id=<?php echo $field['id_kp'] ?>" class="btn btn-success">Edit </a>
							<a href="proses_kategori.php?id=<?php echo $field['id_kp'] ?>" class="btn btn-danger" >Hapus</a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include 'footer.php';?>