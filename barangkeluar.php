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
        <title>Barang Keluar</title>
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
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Barang Keluar</h1>
                
                    
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
							Tambah Data Barang Keluar
							</button>
                            <a href ="exportkeluar.php" class="btn btn-info">Export Data</a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Barang Keluar</th>
                                                <th>Kode Permintaan</th>
                                                <th>Tanggal</th>
                                                <th>Nama Barang </th>
                                                <th>jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $ambilsemuadatabarangkeluar = mysqli_query($conn, "select * from barangkeluar");
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambilsemuadatabarangkeluar)){
                                            $kodekeluar = $data['kodekeluar'];
                                            $kodepermintaan = $data['kodepermintaan'];
                                            $tanggalkeluar = $data['tanggalkeluar'];
                                            $namabarang = $data['namabarang'];
                                            $jumlah = $data['jumlah'];
                                            $idkeluar = $data['idkeluar'];
                                        
                                        ?> 

                                            <tr>
                                                <td> <?=$i++;?> </td>
                                                <td> <?=$kodekeluar;?> </td>
                                                <td>  <?=$kodepermintaan;?> </td>
                                                <td> <?=$tanggalkeluar;?> </td>
                                                <td>  <?=$namabarang;?> </td>
                                                <td>  <?=$jumlah;?> </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idkeluar;?>">
							                            Edit
							                        </button>
                                                   
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idkeluar;?>">
							                            delete
							                        </button>
                                                </td>
                                            </tr>
                                            
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$idkeluar;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Ubah Data Barang Keluar</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    <input type="text" name="kodekeluar" value="<?=$kodekeluar;?>" class="form-control" >
                                                    <br>
                                                    <select name="kodepermintaankeluar"  value="<?=$kodepermintaankeluar;?>" class="form-control" >
                                                         <option value="<?=$kodepermintaan;?>"><?=$kodepermintaan;?></option>

                                                        <?php
                                                            $ambildatapermintaan = mysqli_query($conn,"select * from permintaanbarang");
                                                            while($fetcharray = mysqli_fetch_array($ambildatapermintaan)){
                                                                $kodepermintaankeluar = $fetcharray['kodepermintaan'];										
                                                        ?>		
                                                         <?php if($kodepermintaankeluar != $kodepermintaan) { ?>
                                                                    <option value="<?=$kodepermintaankeluar;?>"><?=$kodepermintaankeluar;?></option>            
                                                                    <?php
                                                                }
                                                            }
                                                            ?>    
                                                    </select>
                            
                                                    <br>
                                                    <select name="barangkeluar"  class="form-control" >
                                                     <option value="<?=$namabarang;?>"><?=$namabarang;?></option>
                                                    <?php
                                                    $ambildatabarangkeluar = mysqli_query($conn,"select * from barang");
                                                    while($fetcharray = mysqli_fetch_array($ambildatabarangkeluar)){
                                                        $barangkeluar= $fetcharray['namabarang'];										
                                                    ?>		
                                                   <?php if($barangkeluar != $namabarang) { ?>
                                                                    <option value="<?=$barangkeluar;?>"><?=$barangkeluar;?></option>            
                                                                    <?php
                                                                }
                                                            }
                                                            ?>                                                
                                                    </select>
                                                    <br>
                                                    <input type="number" name="jumlah" value="<?=$jumlah;?>" class="form-control" required>
                                                    <br>
                                                    <input type="hidden" name="idkeluar" value="<?=$idkeluar;?>">
                                                    <button type="submit" class="btn btn-primary" name="updatekeluar">Simpan</button>
                                                    </div>
                                                    </form>
                                                
                                                    
                                                </div>
                                                </div>
                                            </div>

                                             <!-- Delete Modal -->
                                             <div class="modal fade" id="delete<?=$idkeluar;?>" >
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Barang Keluar?</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
        
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data <?=$kodekeluar;?>?
                                                    <input type="hidden" name="idkeluar" value="<?=$idkeluar;?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapuskeluar">Hapus</button>
                                                    </div>
                                                    </form>
                                                
                                                    
                                                </div>
                                                </div>
                                            </div>


                                        <?php
                                        };
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
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

     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Barang Keluar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        <input type="text" name="kodekeluar" placeholder="Kode Barang Keluar" class="form-control" required>
        <br>
        <select name="kodepermintaankeluar" class="form-control" required>
			<option value="">- kode permintaan -</option>
			<?php
				$ambildatapermintaan = mysqli_query($conn,"select * from permintaanbarang");
				while($fetcharray = mysqli_fetch_array($ambildatapermintaan)){
					$kodepermintaankeluar = $fetcharray['kodepermintaan'];										
			?>		
			<option value="<?=$kodepermintaankeluar;?>"><?=$kodepermintaankeluar;?></option>			
			<?php
			}
			?>
		</select>
        <br>
        <input type="date" name="tanggalkeluar" placeholder="Tanggal" class="form-control" required>
        <br>
        <select name="barangkeluar" class="form-control" required>
        <option value="">- pilih barang-</option>
			<?php
				$ambildatabarangkeluar = mysqli_query($conn,"select * from barang");
				while($fetcharray = mysqli_fetch_array($ambildatabarangkeluar)){
					$barangkeluar= $fetcharray['namabarang'];										
			?>		
			<option value="<?=$barangkeluar;?>"><?=$barangkeluar;?></option>			
			<?php
			}
			?>
		</select>
          <br>
        <input type="number" name="jumlah" placeholder="Jumlah" class="form-control" required>
        <br>
        <button type="submit" class="btn btn-primary" name="tambahkeluar">Simpan</button>
        </div>
        </form>
    
        
      </div>
    </div>
  </div>
</html>
