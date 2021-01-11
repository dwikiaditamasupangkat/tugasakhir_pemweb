<?php 
include '../conn.php';
$id_pegawai=$_POST['id_pegawai'];
$nama_pegawai=$_POST['nama_pegawai'];
$jabatan=$_POST['jabatan'];
$password=md5($_POST['password']);
$username=$_POST['username'];
	  
$query = mysqli_query(connection(),"insert into logindata values('$id_pegawai','$nama_pegawai','$jabatan','$password','$username','$jabatan')");
if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= user.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= user.php'/> ";
}
 
?>
 
  <html>
<head>
  <title>Tambah Data Pegawai</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>