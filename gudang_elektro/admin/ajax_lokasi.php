<?php
	include ('../conn.php');

	if ($_SERVER['REQUEST_METHOD']=== 'GET') {
		if (isset($_GET['id_kategori'])){

	    $id_kategori=$_GET['id_kategori'];


		$sql= "SELECT * FROM detail_lokasi WHERE id_kategori='$id_kategori'";
		$keterangan=mysqli_query(connection(),$sql);

		while ($data = mysqli_fetch_array($keterangan)) {
			echo "<option value='".$data['id_lokasi']."'>".$data['keterangan_lokasi']."</option>";
		}
		
	}
}
?>