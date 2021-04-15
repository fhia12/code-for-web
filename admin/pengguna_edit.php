<?php 
	include "header.php";
	$id_pmlk = $_GET['id']; //acuan get dilihat dari url http://localhost/lat_ecommerce/admin/pengguna_edit.php?id=25 , yg dilihat id=25
	$sql = "select * from pemilik where id_pmlk = $id_pmlk";
	$data = $dbh->query($sql)->fetch();
?>

<div class="container">
  <div class="row">
  	<div class="col-md-4">
  	<h1>Edit Pengguna</h1>
  	<form action="proses_pengguna.php" method="POST" >
  		<input type="hidden" name="id" value="<?php echo $id_pmlk ?>">
  		<input type="text" name="nama" value="<?php echo $data['nama_lgkp'] ?>" class="form-control" placeholder="Nama Lengkap" required=""><br>
  		<input type="text" name="user" value="<?php echo $data['username'] ?>" class="form-control" placeholder="Username" required=""><br>
  		<!-- Hak -->
  		<select name="hak" class="form-control">
  			<?php 
  				$hak = array(
  					'1' => 'User Utama',
  					'2' => 'Pegawai'
  				);

  				foreach ($hak as $key => $value) {
  					if ($data['hak'] == $key) {
  						$add = "selected";
  					}
  					else{
  						$add = "";
  					}
  					echo "<option value='$key' $add>$value</option>";
  				}
  			?>
  		</select><br>
  		<!-- Status -->
  		<select name="status" class="form-control" >
  				<?php 
  				$status = array(  
  					'on' => 'On',
  					'off' => 'Off'
  				);

  				foreach ($status as $key => $value) {
  					if ($data['status'] == $key) {
  						$nambah = "selected";
  					}
  					else{
  						$nambah = "";
  					}
  					echo "<option value='$key' $nambah>$value</option>";
  				}
  			?>
  		</select><br>

  		<input type="submit" value="Edit" class="btn btn-success btn-block">
  	</form>
  	</div>

  	<div class="col-md-8">
  		<h1>Table Pengguna</h1>
  		<table class="table" border="1">
  			<thead class="bg-info">
	  			<tr>
	  				<th>No</th>
	  				<th>Nama Lengkap</th>
	  				<th>Username</th>
	  				<th>Hak</th>
	  				<th>Status</th>
	 				<th>Aksi</th>
	 			</tr>
  			</thead>
  			<tbody>
  				<?php 
  					$sql="select * from pemilik";
  					$data=$dbh->query($sql);
  					$no=1;
  					foreach ($data as $field) {
  					 ?>
  					
  				<tr>
  					<td><?php echo $no ?></td>
  					<td><?php echo $field["nama_lgkp"] ?></td>
  					<td><?php echo $field["username"] ?></td>
  					<td><?php echo $field["hak"] ?></td>
  					<td><?php echo $field["status"] ?></td>
  					<td>
  						<a href="pengguna_edit.php?id=<?php echo $field['id_pmlk'] ?>">Edit </a> | 
  						<a href="proses_pengguna.php?id=<?php echo $field['id_pmlk'] ?>">Hapus </a>
  					</td>
  				</tr>
  			<?php $no++; } ?>
  			</tbody>
  		</table>
  	</div>
  </div>
</div>

<?php include 'footer.php';?>