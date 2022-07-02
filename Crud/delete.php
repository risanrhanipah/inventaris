<?php 
include 'koneksi.php';
session_start();

$id = $_GET['id_barang'];
$sql = mysqli_query($con, "DELETE FROM tb_barang WHERE id_barang='$id'");
$_SESSION['success'] = "Data Berhasil Dihapus";
echo "<script>window.location.href='home.php'</script>";
 ?>