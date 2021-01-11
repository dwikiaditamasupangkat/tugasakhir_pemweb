<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../conn.php';
    include 'cek.php';

    if(isset($_POST['update'])){
        $idmasuk = $_POST['idmasuk']; //iddata
        $kodebarang = $_POST['kodebarang']; //idbarang
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $tanggal = $_POST['tanggal'];

        $lihatstock = mysqli_query(connection(),"select * from stok_barang where kode_barang='$kodebarang'"); //lihat stock barang itu saat ini
        $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
        $stockskrg = $stocknya['jumlah_stok'];//jumlah stocknya skrg

        $lihatdataskrg = mysqli_query(connection(),"select * from barang_masuk where id_masuk='$idmasuk'"); //lihat qty saat ini
        $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
        $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

        if($jumlah >= $qtyskrg){
            //ternyata inputan baru lebih besar jumlah masuknya, maka tambahi lagi stock barang
            $hitungselisih = $jumlah-$qtyskrg;
            $tambahistock = $stockskrg+$hitungselisih;

            $queryx = mysqli_query(connection(),"update stok_barang set jumlah_stok='$tambahistock' where kode_barang='$kodebarang'");
            $updatedata1 = mysqli_query(connection(),"update barang_masuk set tanggal='$tanggal',jumlah='$jumlah',keterangan='$keterangan' where id_masuk='$idmasuk'");
            
            //cek apakah berhasil
            if ($updatedata1 && $queryx){

                echo " <div class='alert alert-success'>
                    <strong>Success!</strong> Redirecting you back in 1 seconds.
                </div>
                <meta http-equiv='refresh' content='1; url= masuk.php'/>  ";
                } else { echo "<div class='alert alert-warning'>
                    <strong>Failed!</strong> Redirecting you back in 3 seconds.
                </div>
                <meta http-equiv='refresh' content='3; url= masuk.php'/> ";
                };

            } else {
                //ternyata inputan baru lebih kecil jumlah masuknya, maka kurangi lagi stock barang
                $hitungselisih = $qtyskrg-$jumlah;
                $kurangistock = $stockskrg-$hitungselisih;
    
                $query1 = mysqli_query(connection(),"update stok_barang set jumlah_stok='$kurangistock' where kode_barang='$kodebarang'");
    
                $updatedata = mysqli_query(connection(),"update barang_masuk set tanggal='$tanggal', jumlah='$jumlah', keterangan='$keterangan' where id_masuk='$idmasuk'");
                
                //cek apakah berhasil
                if ($query1 && $updatedata){
    
                    echo " <div class='alert alert-success'>
                        <strong>Success!</strong> Redirecting you back in 1 seconds.
                    </div>
                    <meta http-equiv='refresh' content='1; url= masuk.php'/>  ";
                    } else { echo "<div class='alert alert-warning'>
                        <strong>Failed!</strong> Redirecting you back in 3 seconds.
                    </div>
                    <meta http-equiv='refresh' content='3; url= masuk.php'/> ";
                    };
    
            };
    


        
    };

    if(isset($_POST['hapus'])){
        $idmasuk = $_POST['idmasuk'];
        $kodebarang = $_POST['kodebarang'];

        $lihatstock = mysqli_query(connection(),"select * from stok_barang where kode_barang='$kodebarang'"); //lihat stock barang itu saat ini
        $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
        $stockskrg = $stocknya['jumlah_stok'];//jumlah stocknya skrg

        $lihatdataskrg = mysqli_query(connection(),"select * from barang_masuk where id_masuk='$idmasuk'"); //lihat qty saat ini
        $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
        $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

        $adjuststock = $stockskrg-$qtyskrg;

        $queryx = mysqli_query(connection(),"update stok_barang set jumlah_stok='$adjuststock' where kode_barang='$kodebarang'");
        $del = mysqli_query(connection(),"delete from barang_masuk where id_masuk='$idmasuk'");

        
        //cek apakah berhasil
        if ($queryx && $del){

            echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= masuk.php'/>  ";
            } else { echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= masuk.php'/> ";
            }
    };
	?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <title>Gudang Elektronik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
	
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
                            <li>
                                <a href="stock.php"><i class="ti-package"></i><span>Stock Barang</span></a>
                            </li>
							<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Transaksi Data
                                    </span></a>
                                <ul class="active">
                                    <li class="active"><a href="masuk.php"><i class="ti-import"></i><span>Barang Masuk</span></a></li>
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
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Barang Masuk</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <h2 style="text-align : right">Gudang Elektronik</h2>
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
									<h2>Barang Masuk</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span><i class="fa fa-plus-square"></i>&nbsp &nbsp Tambah Barang Masuk</button>
                                    <a href="scan_masuk.php" class="btn btn-info col-md-2" style="margin-bottom:20px"><span class="glyphicon glyphicon-plus"></span><i class="fa fa-qrcode"></i>&nbsp &nbsp Scan QR Code</a> 
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
										 <table id="dataTable3" class="table table-hover"><thead class="thead-dark">
											<tr>
												<th>No</th>
                                                <th>Id Masuk</th>
												<th>Tanggal</th>
												<th>Kode Barang</th>
                                                <th>Nama Barang</th>
												<th>Merk Barang</th>
												<th>kategori</th>
                                                <th>Lokasi</th>
												<th>Jumlah</th>
												<th>Keterangan</th>
												
												<th>Opsi</th>
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
                                                    <td><?php echo $b['id_masuk'] ?></td>
													<td><?php $tanggals=$b['tanggal']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
													<td><?php echo $b['kode_barang'] ?></td>
													<td><?php echo $b['nama_barang'] ?></td>
													<td><?php echo $b['merk_barang'] ?></td>
                                                    <td><?php echo mysqli_fetch_array(mysqli_query(connection(),"select content from detail_kategori where id_kategori=".$b['id_kategori']))[0] ?></td>
													<td><?php echo mysqli_fetch_array(mysqli_query(connection(),"select keterangan_lokasi from detail_lokasi where id_lokasi=".$b['id_lokasi']))[0] ?></td>
                                                    <td><?php echo $b['jumlah'] ?></td>
													<td><?php echo $b['keterangan'] ?></td>
                                                    <td><button data-toggle="modal" data-target="#edit<?=$idmasuk;?>" class="btn btn-warning">Edit</button> <button data-toggle="modal" data-target="#del<?=$idmasuk;?>" class="btn btn-danger">Del</button></td>
												</tr>

                                                <!-- The Modal -->
                                                <div class="modal fade" id="edit<?=$idmasuk;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">

                                                            <label for="tanggal">Tanggal</label>
                                                            <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?php echo $b['tanggal'] ?>">
                                                            
                                                            <label for="kode_barang">Kode Barang</label>
                                                            <input type="text" id="kode_barang" name="kode_barang" class="form-control" value="<?php echo $b['kode_barang'] ?>" disabled>

                                                            <label for="nama_barang">Nama Barang</label>
                                                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="<?php echo $b['nama_barang'] ?>" disabled>

                                                            <label for="jumlah">Jumlah</label>
                                                            <input type="number" id="jumlah" name="jumlah" class="form-control" value="<?php echo $b['jumlah'] ?>">

                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $b['keterangan'] ?>">
                                                            <input type="hidden" name="idmasuk" value="<?=$idmasuk;?>">
                                                            <input type="hidden" name="kodebarang" value="<?=$kodebarang;?>">

                                                            
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
                                                    <div class="modal fade" id="del<?=$idmasuk;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Barang <?php echo $b['kode_barang']?> - <?php echo $b['nama_barang']?> - <?php echo $b['merk_barang']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus barang ini dari daftar stock  masuk?
                                                            <br>
                                                            *Stock barang akan berkurang
                                                            <input type="hidden" name="idmasuk" value="<?=$idmasuk;?>">
                                                            <input type="hidden" name="kodebarang" value="<?=$kodebarang;?>">
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
							<h4 class="modal-title">Input Barang Masuk</h4>
						</div>
						<div class="modal-body">
							<form action="barang_masuk.php" method="post">
								<div class="form-group">
									<label>Tanggal</label>
									<input name="tanggal" type="date" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Barang</label>
									<select name="barang" class="custom-select form-control" required>
									<option selected>Pilih barang</option>
									<?php
									$det=mysqli_query(connection(),"select * from stok_barang order by kode_barang ASC");
									while($d=mysqli_fetch_array($det)){
									?>
										<option value="<?php echo $d['kode_barang'] ?>"><?php echo $d['kode_barang'] ?>, <?php echo $d['nama_barang'] ?></option>
										<?php
								}
								?>
									</select>
								</div>
								<div class="form-group">
									<label>Jumlah</label>
									<input name="jumlah" type="number" min="1" class="form-control" placeholder="jumlah" required>
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
								</div>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input type="submit" class="btn btn-primary" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>

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
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
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
	
</body>

</html>
