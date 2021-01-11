<?php 
	include '../conn.php';
	
if (isset($_POST["hasilscan"])) {
        $qrcode = $_POST["hasilscan"];
    $brg=mysqli_query(connection(),"SELECT * from stok_barang");
    while($row=mysqli_fetch_array($brg)){
        $kodebarang = $row['kode_barang'];
        if($kodebarang == $qrcode){
?>
		<option value="<?php echo $row['kode_barang'] ?>">
			<?php echo "Kode Barang : ".$row['kode_barang'] ?> ~
			<?php echo "Nama Barang : ".$row['nama_barang'] ?> ~
			<?php echo "Merk Barang : ".$row['merk_barang'] ?> ~
			<?php echo "Kategori : ".mysqli_fetch_array(mysqli_query(connection(),"select content from detail_kategori where id_kategori=".$row['id_kategori']))[0] ?> ~
			<?php echo "Lokasi : ".mysqli_fetch_array(mysqli_query(connection(),"select keterangan_lokasi from detail_lokasi where id_lokasi=".$row['id_lokasi']))[0] ?>
		</option>
<?php
		}
	}
}
?>
