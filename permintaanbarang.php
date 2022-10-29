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
    <title>Permintaan Barang</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Cherry Beauty</a>
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
                    <h1 class="mt-4">Data Permintaan Barang</h1>

                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                             Tambah Data Permintaan Barang
                         </button>
                         <a href ="export.php" class="btn btn-info">Export Data</a>
                     </div>

                     <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Permintaan</th>
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Pelanggan</th>
                                        <th>jumlah</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $ambilsemuadatapermintaanbarang = mysqli_query($conn, "select * from permintaanbarang");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatapermintaanbarang)){

                                        $kodepermintaan = $data['kodepermintaan'];
                                        $tglpermintaan = $data['tglpermintaan'];
                                        $namabarang = $data['namabarang'];
                                        $namapelanggan = $data['namapelanggan'];
                                        $jumlah = $data['jumlah'];
                                        $idp = $data['idpermintaan'];

                                        
                                        ?>
                                        <tr>
                                            <td> <?=$i++;?> </td>
                                            <td> <?=$kodepermintaan;?> </td>
                                            <td> <?=$tglpermintaan;?> </td>
                                            <td> <?=$namabarang;?> </td>
                                            <td> <?=$namapelanggan;?> </td>
                                            <td> <?=$jumlah;?> </td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idp;?>">
                                                 Edit
                                             </button>

                                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?=$idp;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ubah Data Permintaan Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="text" name="kodepermintaan" value= "<?=$kodepermintaan;?>" class="form-control" >
                                                        <br>
                                                        <select name="namabarang" class="form-control" >
                                                            <option value="<?=$namabarang;?>" selected><?=$namabarang;?></option>   
                                                            <?php
                                                            $ambildatabarangpermintaan = mysqli_query($conn,"select * from barang");
                                                            while($fetcharray = mysqli_fetch_array($ambildatabarangpermintaan)){
                                                                $barangpermintaan= $fetcharray['namabarang'];										
                                                                ?>		

                                                                <?php if($barangpermintaan != $namabarang) { ?>
                                                                    <option value="<?=$barangpermintaan;?>"><?=$barangpermintaan;?></option>			
                                                                    <?php
                                                                }
                                                            }
                                                            ?>   	

                                                        </select>
                                                        <br>

                                                        <select name="namapelanggan" value=" <?=$namapelanggan;?>" class="form-control" >

                                                             <option value="<?=$namapelanggan;?>"><?=$namapelanggan;?></option>

                                                            <?php
                                                            $ambildatapelanggan = mysqli_query($conn,"select * from pelanggan");
                                                            while($fetcharray = mysqli_fetch_array($ambildatapelanggan)){
                                                                $pelanggannya = $fetcharray['namapelanggan'];										
                                                                ?>					
                                                                <?php if($pelanggannya != $namapelanggan) { ?>
                                                                    <option value="<?=$pelanggannya;?>"><?=$pelanggannya;?></option>            
                                                                    <?php
                                                                }
                                                            }
                                                            ?>                                              
                                                        </select>
                                                        <br>
                                                        <input type="num" name="jumlah" value=" <?=$jumlah;?>" class="form-control" >
                                                        <br>   
                                                        <input type="hidden" name="idp" value="<?=$idp;?>">                               
                                                        <button type="submit" class="btn btn-primary" name="updatepermintaan">Simpan</button>
                                                    </div>
                                                </form>
                                                

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete" >
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Permintaan Barang?</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data <?=$kodepermintaan;?>?
                                                        <input type="hidden" name="kodepermintaan" value="<?=$kodepermintaan;?>">
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="hapuspermintaan">Hapus</button>
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
          <h4 class="modal-title">Tambah Data Permintaan Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
      </div>

      <!-- Modal body -->
      <form method="post">
        <div class="modal-body">
            <input type="text" name="kodepermintaan" placeholder="Kode Permintaan" class="form-control" required>
            <br>
            <input type="date" name="tglpermintaan" placeholder="Tanggal" class="form-control" required>
            <br>
            <select name="barangnya" class="form-control" required>
             <option value="">- pilih barang-</option>
             <?php
             $ambildatabarang = mysqli_query($conn,"select * from barang");
             while($fetcharray = mysqli_fetch_array($ambildatabarang)){
               $barangnya= $fetcharray['namabarang'];										
               ?>		
               <option value="<?=$barangnya;?>"><?=$barangnya;?></option>			
               <?php
           }
           ?>
       </select>
       <br>
       <select name="pelanggannya" class="form-control" required>
         <option value="">- pilih pelanggan -</option>
         <?php
         $ambildatapelanggan = mysqli_query($conn,"select * from pelanggan");
         while($fetcharray = mysqli_fetch_array($ambildatapelanggan)){
           $pelanggannya = $fetcharray['namapelanggan'];										
           ?>					
           <option value="<?=$pelanggannya;?>"><?=$pelanggannya;?></option>
           <?php
       }
       ?>
   </select>
   <br>
   <input type="number" name="jumlah" placeholder="Jumlah" class="form-control" required>
   <br>
   <button type="submit" class="btn btn-primary" name="tambahpermintaan">Simpan</button>
</div>
</form>


</div>
</div>
</div>
</html>
