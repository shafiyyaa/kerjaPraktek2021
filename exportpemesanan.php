<?php
require 'function.php';
require 'cek.php';
?>
<html>
<head>
  <title>Pemesanan Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Pemesanan Barang</h2>
			
				<div class="data-tables datatable-dark">
					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
                    <table class="table table-bordered" id="datatablepesan" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Tanggal</th>
                                                <th>Kode Pemesanan</th>
                                                <th>Nama Barang</th>
                                                <th>Nama Supplier</th>
                                                <th>jumlah</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $ambilsemuadatapemesananbarang = mysqli_query($conn, "select * from pemesananbarang");
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambilsemuadatapemesananbarang)){
                                            $tanggalpemesanan = $data['tanggalpemesanan'];
                                            $kodepemesanan = $data['kodepemesanan'];
                                            $namabarang = $data['namabarang'];
                                            $namasupplier = $data['namasupplier'];
                                            $jumlah = $data['jumlah'];
                                            $idpemesanan = $data['idpemesanan'];
                                        
                                        ?>
                                            <tr>
                                                <td> <?=$i++;?> </td>
                                                <td> <?php echo $tanggalpemesanan;?> </td>
                                                <td> <?php echo $kodepemesanan;?> </td>
                                                <td> <?php echo $namabarang;?> </td>
                                                <td> <?php echo $namasupplier;?> </td>
                                                <td> <?php echo $jumlah;?> </td>
                                                
                                            </tr>

                                            

                                            

                                
                                        <?php
                                        };
                                        ?> 

                                        </tbody>
                                    </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#datatablepesan').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>