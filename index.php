<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pengadaan Barang Cherry Beauty</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Cherry Beauty</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>


        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="permintaanbarang.php">
                                <div class="sb-nav-link-icon"><i class="far fa-list-alt"></i></div>
                                Permintaan Barang
                            </a>
                            <a class="nav-link" href="pemesananbarang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck-loading"></i></div>
                                Pemesanan Barang
                            </a>
                            <a class="nav-link" href="barangmasuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="barangkeluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                                Barang Keluar
                            </a>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
							
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="supplier.php">Supplier</a>
                                    <a class="nav-link" href="barang.php">Barang</a>
									<a class="nav-link" href="pelanggan.php">Pelanggan</a>
									
                                </nav>
                            </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
    
      <!--si kotak kotak-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h2 class="mt-4">Dashboard</h2>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Permintaan Barang</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                        //ambil data total 
                                        $get1 = mysqli_query($conn, "select * from permintaanbarang");
                                        $count1 = mysqli_num_rows($get1);
                                        ?>
                                        <a class="small text-white" >Jumlah : <?=$count1;?></a>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">pemesanan Barang </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                        //ambil data total 
                                        $get2 = mysqli_query($conn, "select * from pemesananbarang");
                                        $count2 = mysqli_num_rows($get2);
                                        ?>
                                     <a class="small text-white">Jumlah : <?=$count2;?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Barang Masuk</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                        //ambil data total 
                                        $get3 = mysqli_query($conn, "select * from barangmasuk");
                                        $count3 = mysqli_num_rows($get3);
                                        ?>
                                     <a class="small text-white" >Jumlah : <?=$count3;?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Barang Keluar</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                        //ambil data total 
                                        $get4 = mysqli_query($conn, "select * from barangkeluar");
                                        $count4 = mysqli_num_rows($get4);
                                        ?>
                                     <a class="small text-white" >Jumlah : <?=$count4;?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </main>
                
            </div>
        </div>

<br>
        <div class="halaman">
	    <center><h1>Sistem Informasi Pengadaan Barang Cherry Beauty</h1></center>
        <br>
	    <center><img src="circle.png" width="200" height="200"></center>
         </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
 
    </body>
</html>
