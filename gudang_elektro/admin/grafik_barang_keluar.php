<html>
<head>

<title>Grafik Batang</title>

</head>
<body>
<?php
include '../conn.php';
include 'cek.php';
if(!connection()){
//die("Databse tidak berhasil diakses . . .<br>");
}else{
//	print("Database berhasil diakses . . .<br><br>");
	
}
$akses_tabel = mysqli_query(connection(), "SELECT kode_barang,jumlah FROM barang_keluar");
if(!$akses_tabel){
	//die("Tabel tidak berhasil diakses . . .<br>");
}else{
	//print("Tabel berhasil diakses . . .<br><br>");	
}
?>
<?php
$sumbu_y = 'Pengeluaran Barang';
	$k = 0;
	while($row = mysqli_fetch_array($akses_tabel)){  
		$y = $row["jumlah"];
		$barang_keluar = $row["kode_barang"];
		$dataPoints[$k] = array("y"=> $y, "label"=> $barang_keluar);
		$k += 1;   				
	}
?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Barang Keluar"
	},
	axisY: {
		title: "Jumlah Barang Keluar"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: <?php print json_encode("Kode Barang Keluar"); ?>,
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]	
});
chart.render();

}
</script>
<div id="chartContainer" style="min-height: 345px; max-width: 500px; margin: 10px auto;"></div>
<script src="../assets/js/canvasjs.min.js"></script>


</body>
</html>