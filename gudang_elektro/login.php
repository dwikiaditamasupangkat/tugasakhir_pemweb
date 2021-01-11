<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'conn.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query(connection(),"select * from logindata where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['role']=="admin" || $data['role']=="Admin" || $data['role']=="ADMIN"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");

	// cek jika user login sebagai pegawai
	}else if($data['role']=="manajer" || $data['role']=="Manajer" || $data['role']=="MANAJER"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "manajer";
		// alihkan ke halaman dashboard admin
		header("location:manajer/index.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>