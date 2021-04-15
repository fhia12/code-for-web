<?php 
	include "header.php";
	$id_user = $_GET['id']; //acuan get dilihat dari url http://localhost/lat_ecommerce/admin/pembeli_edit.php?id=25 , yg dilihat id=25
	$sql = "select * from user where id_user = $id_user";
	$data = $dbh->query($sql)->fetch();
?>

<div class="container">
  <div class="row">
  	<div class="col-md-4">
  	<h1>Edit Pembeli</h1>
  	<form action="proses_pembeli.php" method="POST" >
  		<input type="hidden" name="id" value="<?php echo $id_user ?>">
  		<input type="text" name="nama" value="<?php echo $data['nama_lengkap'] ?>" class="form-control" placeholder="Nama Lengkap" required=""><br>
  		<input type="text" name="user" value="<?php echo $data['username'] ?>" class="form-control" placeholder="Username" required=""><br>
      <input type="text" name="email" value="<?php echo $data['email'] ?>" class="form-control" placeholder="Email" required=""><br>
      <input type="text" name="telepon" value="<?php echo $data['no_hp'] ?>" class="form-control" placeholder="Telepon" required=""><br>
      <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" class="form-control" placeholder="Alamat" required=""><br>

  		<input type="submit" value="Edit" class="btn btn-success btn-block">
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
  						<a href="pembeli_edit.php?id=<?php echo $field['id_user'] ?>">Edit </a> | 
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