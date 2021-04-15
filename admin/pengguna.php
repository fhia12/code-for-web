<?php include 'header.php';?>

<div class="container">
  <div class="row">
  	<div class="col-md-4">
  	<h1>Tambah Pengguna</h1>
  	<form action="proses_pengguna.php" method="POST" >
  		<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required=""><br>
  		<input type="text" name="user" class="form-control" placeholder="Username" required=""><br>
  		<input type="password" name="pass" class="form-control" placeholder="Password" required=""><br>
  		<select name="hak" class="form-control" required="">
  			<option value="1">User Utama</option>
  			<option value="2">Pegawai</option>
  		</select><br>
  		<select name="status" class="form-control" required="">
  			<option value="on">On</option>
  			<option value="off">Off</option>
  		</select><br>
  		<input type="submit" value="Tambah" class="btn btn-primary btn-block">
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
  						<a href="pengguna_edit.php?id=<?php echo $field['id_pmlk'] ?>">Edit </a>| 
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