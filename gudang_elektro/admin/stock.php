<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../conn.php';
    $query = "SELECT * FROM detail_kategori"; 
    //eksekusi query
    $kategorii = mysqli_query(connection(),$query);  
    $query2 = "SELECT * FROM detail_kategori"; 
    //eksekusi query
    $kategorii2 = mysqli_query(connection(),$query2);
    include 'cek.php';

    if(isset($_POST['update'])){
        $kode_barang=$_POST['kode_barang'];
        $nama_barang=$_POST['nama_barang'];
        $merk_barang=$_POST['merk_barang'];
        $id_kategori=$_POST['id_kategori'];
        $id_lokasi=$_POST['id_lokasi'];

        $updatedata = mysqli_query(connection(),"update stok_barang set nama_barang='$nama_barang', merk_barang='$merk_barang', id_kategori='$id_kategori', id_lokasi='$id_lokasi' where kode_barang='$kode_barang'");
        
        //cek apakah berhasil
        if ($updatedata){

            echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= stock.php'/>  ";
            } else { echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= stock.php'/> ";
            }
    };

    if(isset($_POST['hapus'])){
        $kode_barang = $_POST['kode_barang'];

        $delete = mysqli_query(connection(),"delete from stok_barang where kode_barang='$kode_barang'");
        //hapus juga semua data barang ini di tabel keluar-masuk
         $deltabelkeluar = mysqli_query(connection(),"delete from barang_keluar where kode_barang='$kode_barang'");
         $deltabelmasuk = mysqli_query(connection(),"delete from barang_masuk where kode_barang='$kode_barang'");
        
        //cek apakah berhasil
        if ($delete){

            echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= stock.php'/>  ";
            } else { echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= stock.php'/> ";
            }
    };
	?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gudang Elektronik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <a href="index.php"><img src="../logo.png" alt="logo" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php"><i class="fa fa-area-chart"></i><span>Dashboard</span></a>
                            </li>
                            <li class="active">
                                <a href="stock.php"><i class="ti-package"></i><span>Stock Barang</span></a>
                            </li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Transaksi Data
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="masuk.php"><i class="ti-import"></i><span>Barang Masuk</span></a></li>
                                    <li><a href="keluar.php"><i class="ti-export"></i><span>Barang Keluar</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="logout.php"><i class="ti-close"></i><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <h2>Hi, <?=$_SESSION['role'];?> <?=$_SESSION['username'];?></h2>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
			<?php 
			
				$periksa_bahan=mysqli_query(connection(),"select * from stok_barang where jumlah_stok <1");
				while($p=mysqli_fetch_array($periksa_bahan)){	
					if($p['jumlah_stok']<=1){	
						?>	
						<script>
							$(document).ready(function(){
								$('#pesan_sedia').css("color","white");
								$('#pesan_sedia').append("<i class='ti-flag'></i>");
							});
						</script>
						<?php
						echo "<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Stok  <strong><u>".$p['nama_barang']. "</u> <u>".($p['merk_barang'])."</u> &nbsp <u>".$p['id_kategori']."</u></strong> yang tersisa sudah habis</div>";		
					}
				}
				?>
			
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Daftar Barang</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <h2 style="text-align : right">Gudang Elektronik</h2>
                        <!-- <div class="user-profile pull-right" style="color:black; padding:0px;">
                            <img src="log.jpg" width="220px" class="user-name dropdown-toggle" data-toggle="dropdown"\>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Stock Barang</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span><i class="fa fa-plus-square"></i>&nbsp &nbsp Tambah Barang</button>
                                </div>
                                    <div class="table-responsive">
										 <table id="tes123" class="table table-hover"><thead class="thead-dark">
											<tr>
                                                <th>No</th>
                                                <th>Qr Code</th>
                                                <th>Kode Barang</th>
												<th>Nama Barang</th>
                                                <th>Merk</th>
												<th>Kategori</th>
												<th>Jumlah Stock</th>
                                                <th>Lokasi</th>
												<th></th>
                                                <th>Opsi</th>
                                                <th></th>
											</tr></thead><tbody>
											<?php
                                                $sql = "SELECT * FROM stok_barang";
                                                $result = connection()->query($sql);
                                                $no=1;
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        $idb=$row['kode_barang'];
                                            ?>
												
												<tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><img src='<?php echo $row['image']?>' width='50px'></td>
                                                    <td><?php echo $row['kode_barang']?></td>
                                                    <td><?php echo $row['nama_barang']?></td>
                                                    <td><?php echo $row['merk_barang']?></td>
                                                    <td><?php echo mysqli_fetch_array(mysqli_query(connection(),"select content from detail_kategori where id_kategori=".$row['id_kategori']))[0] ?></td>
                                                    <td><?php echo $row['jumlah_stok']?></td>
                                                    <td><?php echo mysqli_fetch_array(mysqli_query(connection(),"select keterangan_lokasi from detail_lokasi where id_lokasi=".$row['id_lokasi']))[0] ?></td>
                                                    <td><button data-toggle="modal" data-target="#edit<?=$idb;?>" class="tombol btn-warning"><i class="fa fa-pencil-square-o"></i>Edit</button></td>
                                                    <td><button data-toggle="modal" data-target="#del<?=$idb;?>" class="tombol btn-danger"><i class="fa fa-trash-o"></i>Del</button></td>
                                                    <td><button class="tombol btn-secondary"><a href="<?php echo "exportqrcode.php?qrcode=".$row['kode_barang']; ?>" target="_blank"><i class="fa fa-print"> Print</a></button></td>
                                                </td>
                                                </tr>


                                                <!-- The Modal -->
                                                    <div class="modal fade" id="edit<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Edit Barang <br> <?php echo $row['kode_barang']?> - <?php echo $row['merk_barang']?> - <?php echo $row['nama_barang']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            
                                                            <label for="nama">Nama barang</label>
                                                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="<?php echo $row['nama_barang'] ?>">

                                                            <label for="merk_barang">Merk barang</label>
                                                            <input type="text" id="merk_barang" name="merk_barang" class="form-control" value="<?php echo  $row['merk_barang'] ?>">

                                                            <label for="id_kategori">Kategori</label>
                                                            <select id= "kategorii" class="custom-select" name="id_kategori" required="required">
                                                                <option value="">Pilih Salah Satu</option>
                                                                <?php while($data = mysqli_fetch_array($kategorii)): ?>
                                                                    <option value="<?php echo $data['id_kategori'] ?>"><?php echo  $data['content']?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                            <label for="jumlah_stok">Jumlah Stock</label>
                                                            <input type="number" id="jumlah_stok" name="jumlah_stock" class="form-control" value="<?php echo  $row['jumlah_stok'] ?>" disabled>

                                                            <label for="id_lokasi">Lokasi</label>
                                                            <select id="lokasii" class="custom-select" name="id_lokasi" required="required">
                                                                <option value="">Pilih Kategori dahulu</option>
                                                            </select>
                                                            <span id="load_lokasii" style="display: none;">Loading Lokasi...</span>
                                                                        
                                                            <input type="hidden" name="kode_barang" value="<?=$idb;?>">

                                                            
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" name="update">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>



                                                    <!-- The Modal -->
                                                    <div class="modal fade" id="del<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Barang <br> <?php echo $row['kode_barang']?> - <?php echo $row['merk_barang']?> - <?php echo $row['nama_barang']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus barang ini dari daftar stock?
                                                            <input type="hidden" name="kode_barang" value="<?=$idb;?>">
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?php	
                                                        }
                                                        }
                                                        else {
                                                            echo "0 results";
                                                        }
                                                        mysqli_close(connection());
                                                    ?>
										</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Gudang Elektronik</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Masukkan stok Barang</h4>
						</div>
						<div class="modal-body">
							<form action="tambahbarang.php" method="POST">
								<div class="form-group">
									<label>Kode Barang</label>
									<input name="kode_barang" type="number" class="form-control" placeholder="Kode Barang" required>
								</div>
								<div class="form-group">
									<label>Nama Barang</label>
									<input name="nama_barang" type="text" class="form-control" placeholder="Nama Barang" required>
								</div>
								<div class="form-group">
									<label>Merk Barang</label>
									<input name="merk_barang" type="text" class="form-control" placeholder="Merk Barang" required>
								</div>
								<div class="form-group">
									<label>Kategori Barang</label>
                                                <select id= "kategorii2" class="custom-select" name="id_kategori" required="required">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php while($data2 = mysqli_fetch_array($kategorii2)): ?>
                                                        <option value="<?php echo $data2['id_kategori'] ?>"><?php echo  $data2['content']?></option>
                                                    <?php endwhile; ?>
                                                </select>
								</div>
								<div class="form-group">
									<label>Jumlah Stock</label>
									<input name="jumlah_stok" type="number" min="0" class="form-control" placeholder="Jumlah" required>
								</div>
								<div class="form-group">
                                <label>Lokasi</label> <br>
									<select id="lokasii2" class="custom-select" name="id_lokasi" required="required">
                                     <option value="">Pilih Kategori dahulu</option>
                                     </select>
                                     <span id="load_lokasii2" style="display: none;">Loading Lokasi...</span>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>

    <script type="text/javascript">

    $("#kategorii2").on("change",function(){
        $("#load_lokasii2").show();
        var id_kategori= $("#kategorii2").val();
        $.ajax({
            type: "GET",
            url: "ajax_lokasi.php?id_kategori=" + id_kategori,
            success: function(msg){
                $("#load_lokasii2").hide();
                $('#lokasii2').html(msg);
            }   
        });
    });

    $("#kategorii").on("change",function(){
        $("#load_lokasii").show();
        var id_kategori= $("#kategorii").val();
        $.ajax({
            type: "GET",
            url: "ajax_lokasi.php?id_kategori=" + id_kategori,
            success: function(msg){
                $("#load_lokasii").hide();
                $('#lokasii').html(msg);
            }   
        });
    });

    
</script>
	
	<script>
		$(document).ready(function() {
		$('input').on('keydown', function(event) {
			if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
			   var $t = $(this);
			   event.preventDefault();
			   var char = String.fromCharCode(event.keyCode);
			   $t.val(char + $t.val().slice(this.selectionEnd));
			   this.setSelectionRange(1,1);
			}
		});
	});
	
	$(document).ready(function() {
    $('#tes123').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );


	</script>


	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
		<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
	<script src="../assets/js/ajax.js"></script>
	
</body>

</html>
