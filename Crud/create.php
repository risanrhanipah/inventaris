<?php 
include 'koneksi.php';
session_start();
if ($_SESSION['login'] == 0) {
	echo "<script>window.location.href = 'index.php'</script>"	;
}

if (isset($_POST['save'])) {
	 	$nama = $_POST['nama'];
		$jenis = $_POST['jenis'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
		$tanggal_masuk = $_POST['tanggal_masuk'];
		$exp = $_POST['exp'];
		echo $nama,$jenis,$harga,$stok,$tanggal_masuk,$exp;
		$sql = mysqli_query($con,"INSERT INTO `tb_barang` (`id_barang`, `nama`, `jenis`, `harga`, `stok`, `tanggal_masuk`, `exp`) VALUES (NULL, '$nama', '$jenis', '$harga', '$stok', '$tanggal_masuk', '$exp')");
		if ($sql) {
			echo 'success';
		}else{
			echo 'gagal';
		}
		$_SESSION['success'] = "Data Berhasil Diinput!";
		echo "<script>window.location.href = 'home.php'</script>";
}
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
		<h1>Tambah Barang</h1>
		<a href="home.php" class="btn btn-success">Kembali</a>
		<br>
		<br>
		<br>
		<div class="card">
			<div class="card-body">
				<form action="" method="post">
				<div class="form-group">
					<label for="">Nama</label>
					<input type="text" name="nama" id="" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="">Jenis</label>
					<input type="text" name="jenis" id="" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="">Harga</label>
					<input type="number" name="harga" id="" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="">Stok</label>
					<input type="number" name="stok" id="" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="">Tanggal Masuk</label>
					<input type="date" name="tanggal_masuk" id="" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="">Tanggal Expired</label>
					<input type="date" name="exp" id="" class="form-control" required="">
				</div>
				<br>
				<button type="submit" class="btn btn-primary" name="save">Simpan!</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>