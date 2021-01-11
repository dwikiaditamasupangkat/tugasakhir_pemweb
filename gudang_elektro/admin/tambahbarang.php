<?php 
include '../conn.php';

include "../phpqrcode/qrlib.php";
 
//direktory tempat menyimpan hasil generate qrcode jika folder belum dibuat maka secara otomatis akan membuat terlebih dahulu
$tempdir = "../temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

$kode_barang=$_POST['kode_barang'];
$nama_barang=$_POST['nama_barang'];
$merk_barang=$_POST['merk_barang'];
$id_kategori=$_POST['id_kategori'];
$jumlah_stok=$_POST['jumlah_stok'];
$id_lokasi=$_POST['id_lokasi'];

$image="../temp/$kode_barang.png";

$query = mysqli_query(connection(),"insert into stok_barang values('$kode_barang','$nama_barang','$merk_barang','$id_kategori','$jumlah_stok','$id_lokasi','$image')");
if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= stock.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= stock.php'/> ";
}
?>
 <?php
        if (isset($_POST['submit'])) { 
            //Isi dari QRCode Saat discan
            $isi_teks = $kode_barang;
            //Nama file yang akan disimpan pada folder temp 
            $namafile = $kode_barang.".png";
            //Kualitas dari QRCode 
            $quality = 'H'; 
            //Ukuran besar QRCode
            $ukuran = 8; 
            $padding = 1; 
            QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
        }
    ?>
  <html>
<head>
  <title>Tambah Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>