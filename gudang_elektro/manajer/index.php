<!doctype html>
<html lang="en">

<?php
    include '../conn.php';
    include 'cek.php';
    
    $total_stok=0;
    $stok=mysqli_query(connection(),"select jumlah_stok from stok_barang");
	while($p=mysqli_fetch_array($stok)){
      $total_stok+= $p['jumlah_stok']; 
    }
    $total_keluar=0;
    $klr=mysqli_query(connection(),"select jumlah from barang_keluar");
	while($q=mysqli_fetch_array($klr)){
      $total_keluar+= $q['jumlah']; 
    }
    $total_masuk=0;
    $msk=mysqli_query(connection(),"select jumlah from barang_masuk");
	while($r=mysqli_fetch_array($msk)){
      $total_masuk+= $r['jumlah']; 
    }
    
?>
    

<head>
  <meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Gudang Elektronik</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/themify-icons.css">
<link rel="stylesheet" href="../assets/css/metisMenu.css">
<link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="../assets/css/slicknav.min.css">
<link rel="stylesheet" type="text/css" href="../Final Project/Final Project/gudang_elektro/admin/style.css">
  <!-- DASHBOAR CSS -->
  <meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
Material Dashboard by Creative Tim
</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../assets/demo/demo.css" rel="stylesheet" />

<!-- --------------------------------------------------------------- -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-144808195-1');
</script>
<!-- amchart css -->
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
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
                            <li class="active">
                                <a href="index.php"><i class="fa fa-area-chart"></i><span>Dashboard</span></a>
                            </li>
                            <li>
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
						echo "<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Stok  <strong><u>".$p['nama_barang']. "</u> <u>".($p['merk_barang'])."</u> &nbsp <u>".$p['kategori']."</u></strong> yang tersisa sudah habis</div>";
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
                                <li><span>Dashboard</span></li>
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
                <br>
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <i class="fa fa-list-ol fa-5x"></i>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <h4 class="announcement-heading">Total Stok : </h4>
                                            <h2 class="announcement-text"><?php echo $total_stok?></h2>
                                        </div>
                                    </div>
                                </div>
                                <a href="stock.php">
                                <div class="panel-footer announcement-bottom">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Details Stok
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <i class="fa fa-arrow-circle-up fa-5x"></i>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                        <h4 class="announcement-heading">Total Keluar : </h4>
                                            <h2 class="announcement-text"><?php echo $total_keluar?></h2>
                                        </div>
                                    </div>
                                </div>
                                <a href="keluar.php">
                                <div class="panel-footer announcement-bottom">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Details Barang Keluar
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <i class="fa fa-arrow-circle-down fa-5x"></i>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                        <h4 class="announcement-heading">Total Masuk : </h4>
                                            <h2 class="announcement-text"><?php echo $total_masuk?></h2>
                                        </div>
                                    </div>
                                </div>
                                <a href="masuk.php">
                                <div class="panel-footer announcement-bottom">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Details Barang Masuk
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>   
                        </div>
                    </div>   	
                    <div class="col-md-12">
                        <div class="card card-chart">
                            <br><br>
                            <table><tr>
                                <td><embed style="border: 3px solid gray" src="grafik_barang_keluar.php" width="100%" height="375px"></embed></td>
                                <td>&nbsp</td>
                                <td><embed style="border: 3px solid gray"src="grafik_barang_masuk.php" width="100%" height="375px"></embed></td>
                            </tr>
                            </table>
                            <br/><br>
                            <embed style="border: 3px solid gray" src="grafik_stok_barang.php" width="100%" height="500px"></embed>
                        </div>
                    </div>
                </div>
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

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
    <script src="../assets/js/Chart.bundle.js"></script>
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
