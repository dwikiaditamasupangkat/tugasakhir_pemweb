<!doctype html>
<html class="no-js" lang="en">

<?php 
	include 'cek.php';
	include '../conn.php';
?>

<html>
<head>
<title>Data Barang Masuk</title>
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
	<div class="container">
		<h2>Transaksi Barang Masuk</h2>
			<div class="data-tables datatable-dark">
				<table class="display" id="dataTable3" style="width:100%"><thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Merk Barang</th>
					<th>kategori</th>
                    <th>Lokasi</th>
					<th>Jumlah</th>
					<th>Keterangan</th>
				</tr></thead><tbody>
				<?php 
				$brg=mysqli_query(connection(),"SELECT * from barang_masuk sb, stok_barang st where st.kode_barang=sb.kode_barang order by sb.id_masuk DESC");
				$no=1;
				while($b=mysqli_fetch_array($brg)){
					$kodebarang = $b['kode_barang'];
					$idmasuk = $b['id_masuk'];

					?>
					
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php $tanggals=$b['tanggal']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
						<td><?php echo $b['kode_barang'] ?></td>
						<td><?php echo $b['nama_barang'] ?></td>
						<td><?php echo $b['merk_barang'] ?></td>
						<td><?php echo mysqli_fetch_array(mysqli_query(connection(),"select content from detail_kategori where id_kategori=".$b['id_kategori']))[0] ?></td>
                        <td><?php echo mysqli_fetch_array(mysqli_query(connection(),"select keterangan_lokasi from detail_lokasi where id_lokasi=".$b['id_lokasi']))[0] ?></td>
						<td><?php echo $b['jumlah'] ?></td>
						<td><?php echo $b['keterangan'] ?></td>
					</tr>

					<?php 
						}	
					?>
				</tbody>
				</table>
			</div>
	</div>
	
<script>
$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print',
        ]
    } );
} );

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