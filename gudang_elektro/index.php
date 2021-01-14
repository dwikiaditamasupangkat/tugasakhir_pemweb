<?php
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "gagal"){
		echo "Username atau Password salah!";
	}else if($_GET['pesan'] == "logout"){
		echo "Anda berhasil keluar dari sistem";
	}else if($_GET['pesan'] == "belum_login"){
		echo "Anda harus Login";
	}else if($_GET['pesan'] == "noaccess"){
		echo "Akses Ditutup";
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/style.css">
	<title>Gudang Elektronik</title>
</head>

<body>
<h2></h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form>
			<h2>Harap hubungi Manajer untuk Perbaikan akun</h2>
		</form>	
	</div>
	<div class="form-container sign-in-container">
		<form action="login.php" method="post" id="login-form">
			<h1>Masuk</h1>
			<span></span>
			<input type="text" name="username" placeholder="username" required />
			<input type="password" name="password" placeholder="password" required />
			<a href="#" id="signUp">Lupa Password?</a>
			<button name="login" id="login">Login</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Selamat Datang</h1>
				<p></p>
				<button class="ghost" id="signIn">Masuk</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Selamat Datang </h1>
				<p>Masukkan akun login Anda </p>
			</div>
		</div>
	</div>
</div>

<footer>
	
</footer>

<script src="login/js/main.js"></script>
</body>

</html>