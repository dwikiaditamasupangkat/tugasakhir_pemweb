<?php 
include '../conn.php';
$barang=$_POST['barang']; //id barang
$jumlah=$_POST['jumlah'];
$tanggal=$_POST['tanggal'];
$penerima=$_POST['penerima'];
$keterangan=$_POST['keterangan'];

$dt=mysqli_query(connection(),"select * from stok_barang where kode_barang='$barang'");
$data=mysqli_fetch_array($dt);
$sisa=$data['jumlah_stok']-$jumlah;
$query1 = mysqli_query(connection(),"update stok_barang set jumlah_stok='$sisa' where kode_barang='$barang'");

$query2 = mysqli_query(connection(),"insert into barang_keluar (kode_barang,tanggal,jumlah,penerima,keterangan) values('$barang','$tanggal','$jumlah','$penerima','$keterangan')");

if($query1 && $query2){
    echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= keluar.php'/>  ";

} else {
    echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= keluar.php'/> ";
}

?>

<html>
<head>
  <title>Barang Keluar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>