<html>
<head>

<title>Grafik Batang</title>

</head>
<body>
<?php

include '../conn.php';
include 'cek.php';

if(!connection())
{
//	die("Databse tidak berhasil diakses . . .<br>");
}
else
{
//	print("Database berhasil diakses . . .<br><br>");
	
}
?>
<?php
$akses_tabel = mysqli_query(connection(), "SELECT kode_barang,jumlah FROM barang_masuk");
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
$sumbu_y = 'Pemasukan Barang';
	$k = -1;
	while($row = mysqli_fetch_array($akses_tabel))  
                          {  
					  
							
					           $y = $row["jumlah"];
							   $barang_keluar = $row["kode_barang"];
							   
							   
							
							   $k = $k + 1;
							   
							  
							$dataPoints[$k] = array("y"=> $y, "label"=> $barang_keluar);
							   				
							   }
?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Barang Masuk"
	},
	axisY: {
		title: "Jumlah Barang Masuk"
	},
	data: [{        
		type: "line",  
		showInLegend: true, 
		backgroundColor: "blue",
		legendMarkerColor: "green",
		borderColor: '#F0B41A',
		legendText: <?php print json_encode("Kode Barang Masuk"); ?>,
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]	
});
chart.render();

}
</script>
<!-- diagram batang -->
<div id="chartContainer" style="height: 350px; max-width: 920px; margin: 0px auto;"></div>
<script src="../assets/js/canvasjs.min.js"></script>
</body>
</html>