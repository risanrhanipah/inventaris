<?php 
	include 'koneksi.php'; //untuk mnghubungkan database lwat konerksi
	session_start();
	$error = 0;
	$_SESSION['login'] = 0;
	if (isset($_POST['login'])) {  
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = mysqli_query($con,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		$cek = mysqli_num_rows($sql);
		if ($cek > 0) {
			$_SESSION['login'] = 1;
			echo "<script>window.location.href = 'home.php'</script>";
		}else{
			$error = 1;
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>logink</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<?php 
				if ($error == 1) {
					//echo $error					echo "<script><div class='alert alert-danger'>Username atau Password salahh!!</div></script>";
				}
				 ?>
				<div class="card">
					<div class="card-body">
						<form action="" method="post">
							<div class="form-group">
								<label for="">Username</label> 
								<input type="text" name="username" id="" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" id="" class="form-control">
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="login">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
