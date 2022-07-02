<?php 
include 'koneksi.php';
session_start();

if ($_SESSION['login'] == 0) {
	echo "<script>alert('Login dluu Waa');
	window.location.href = 'index.php'</script>"	;
}

$data = mysqli_query($con, "SELECT * FROM tb_barang");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>CRUD</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container mt-5">
		<h1>Data Barang</h1>
		<a href="create.php" class="btn btn-success">Tambah</a>
		<br>
		<br>
		<br>
		<?php 
			if (@$_SESSION['success']) {
				?><div class="alert alert-success"><?php echo $_SESSION['success']; ?></div><?php
			}
		 ?>
		<table class="table">
			<tr>
				<td>No.</td>
				<td>Nama</td>
				<td>jenis</td>
				<td>harga</td>
				<td>stok</td>
				<td>Tanggal Masuk</td>
				<td>Expired</td>
				<td colspan="2">Aksi</td>
			</tr>
			<?php 
			$nmr = 1;
			while ($item = mysqli_fetch_assoc($data)) {
				?>
				<tr>
					<td><?php echo $nmr++ ?></td>
					<td><?php echo $item['nama'] ?></td>
					<td><?php echo $item['jenis'] ?></td>
					<td><?php echo $item['harga'] ?></td>
					<td><?php echo $item['stok'] ?></td>
					<td><?php echo $item['tanggal_masuk'] ?></td>
					<td><?php echo $item['exp'] ?></td>
					<td><a href="edit.php?id_barang=<?php echo $item['id_barang'] ?>">Edit</a></td>
					<td><a href="delete.php?id_barang=<?php echo $item['id_barang'] ?>" onClick="confirm('hapus??')">HAPUS</a></td>
				</tr>
				 <?php
			}
			 ?>
		</table>
	</div>
</body>
</html>