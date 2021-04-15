<?php include 'header.php';?>

<div class="container">
  <div class="row">
  	<div class="col-md-4">
  	<h1>Tambah Pembeli</h1>
  	<form action="proses_pembeli.php" method="POST" >
  		<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required=""><br>
  		<input type="text" name="user" class="form-control" placeholder="Username" required=""><br>
  		<input type="password" name="pass" class="form-control" placeholder="Password" required=""><br>
  	  <input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
      <input type="text" name="telepon" class="form-control" placeholder="Telepon" required=""><br>
      <input type="text" name="alamat" class="form-control" placeholder="Alamat" required=""><br>
  		<input type="submit" value="Tambah" class="btn btn-primary btn-block">
  	</form>
  	</div>
  	<div class="col-md-8">
  		<h1>Table Pembeli</h1>
  		<table class="table" border="1">
  			<thead class="bg-info">
	  			<tr>
	  				<th>No</th>
	  				<th>Nama Lengkap</th>
	  				<th>Username</th>
	  		    <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
	 				<th>Aksi</th>
	 			</tr>
  			</thead>
  			<tbody>
  				<?php 
  					$sql="select * from user";
  					$data=$dbh->query($sql);
  					$no=1;
  					foreach ($data as $field) {
  					 ?>
  					
  				<tr>
  					<td><?php echo $no ?></td>
  					<td><?php echo $field["nama_lengkap"] ?></td>
  					<td><?php echo $field["username"] ?></td>
  				  <td><?php echo $field["email"] ?></td>
            <td><?php echo $field["no_hp"] ?></td>
            <td><?php echo $field["alamat"] ?></td>
  					<td>
  						<a href="pembeli_edit.php?id=<?php echo $field['id_user'] ?>">Edit </a>| 
  						<a href="proses_pembeli.php?id=<?php echo $field['id_user'] ?>">Hapus </a>
  					</td>
  				</tr>
  			<?php $no++; } ?>
  			</tbody>
  		</table>
  	</div>
  </div>
</div>

<?php include 'footer.php';?>