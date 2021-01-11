<!doctype html>
<html class="no-js" lang="en">

<?php 
	include 'cek.php';
	include '../conn.php';
?>

<html>
<head>
<title>Qr Code</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../assets/css/styles.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>

</head>

<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['qrcode'])) {
        //query SQL
        $id = $_GET['qrcode'];
    }
}

?><?php
    $qr=mysqli_query(connection(),"SELECT * from stok_barang where kode_barang = '$id'");
    $no=1;
    while($row=mysqli_fetch_array($qr)){
    ?>
	<div class="container">
			<div class="data-tables datatable-dark">
				<table class="display" id="dataTable3" style="width:auto display: block; margin-left: auto; margin-right: auto;"><thead class="thead-dark">
				<tr>
          <th><center>Qr Code <?php echo $row['nama_barang']?> </center></th>
				</tr></thead><tbody>                        
          <tr>
          <td><center><img src='<?php echo $row['image']?>' width='200px'><center></td>
          </tr>
          </tr>
					<?php 
						}	
					?>
				</tbody>
				</table>
			</div>
	</div>
<script>
		window.print();
	</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

	

</body>

</html>