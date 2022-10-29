<?php
//import koneksi ke database
require 'function.php';
require 'cek.php';
?>
<html>
<head>
  <title>Barang Keluar</title>
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
			<h2>Barang Keluar</h2>
			
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered" id="datatablekeluar" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Barang Keluar</th>
                                                <th>Kode Permintaan</th>
                                                <th>Tanggal</th>
                                                <th>Nama Barang </th>
                                                <th>jumlah</th>
                                                
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
    $('#datatablekeluar').DataTable( {
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