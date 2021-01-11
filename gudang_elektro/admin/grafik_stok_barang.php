<html>
<head>

<title>Grafik Batang</title>

</head>
<body>
<?php

$akses_database = mysqli_connect("localhost", "root", "", "gudang");

if(!$akses_database)
{
//	die("Databse tidak berhasil diakses . . .<br>");
}
else
{
	//print("Database berhasil diakses . . .<br><br>");

}
?>
<?php
$akses_tabel = mysqli_query($akses_database, "SELECT nama_barang, jumlah_stok FROM stok_barang");
if(!$akses_tabel)
{
	//die("Tabel tidak berhasil diakses . . .<br>");
}
else
{
	//print("Tabel berhasil diakses . . .<br><br>");

}
?>
<?php
$sumbu_y = 'Jumlah Stok';
	$k = -1;
	while($row = mysqli_fetch_array($akses_tabel))
                          {


					           $y = $row["jumlah_stok"];
							   $nama_barang = $row["nama_barang"];



							   $k = $k + 1;


							$dataPoints[$k] = array("label"=> $nama_barang,"y"=> $y);

							   }
?>
<script>
window.onload = function() {
 
 
 var chart = new CanvasJS.Chart("chartContainer", {
	 animationEnabled: true,
	 theme: "light1",
	 title: {
		 text: "Stok Barang Tersedia"
	 },
	 data: [{
		 type: "pie",
		 yValueFormatString: "#",
		 indexLabel: "{label} ({y})",
		 dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
  
 }
</script>
<div id="chartContainer" style="height: 470px; max-width: 100%; margin: 0px auto;"></div>
<script src="../assets/js/canvasjs.min.js"></script>
</body>
</html>
