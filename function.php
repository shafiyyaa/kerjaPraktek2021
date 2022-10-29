<?php
session_start();
//koneksi database
$conn = mysqli_connect("localhost","root","","pengadaancherry");

//data barang
if(isset($_POST['tambahbarang'])){
	$namabarang = $_POST['namabarang'];
	$merk = $_POST['merk'];
	$stok = $_POST['stok'];
	$hargajual = $_POST['hargajual'];
	
	$addtotable = mysqli_query($conn,"insert into barang (namabarang, merk, stok, hargajual) values('$namabarang', '$merk', '$stok', '$hargajual')");
	if($addtotable){
		header('location:barang.php');
	} else {
		echo 'Gagal';
		header('location:barang.php');
	}
}

//data pelanggan
if(isset($_POST['tambahpelanggan'])){
	$namapelanggan = $_POST['namapelanggan'];
	$notelpelanggan = $_POST['notelpelanggan'];
	
	$addtotable = mysqli_query($conn,"insert into pelanggan (namapelanggan, notelp) values('$namapelanggan', '$notelpelanggan')");
	if($addtotable){
		header('location:pelanggan.php');
	} else {
		echo 'gagal';
		header('location:pelanggan.php');
	}
	
}

//data supplier
if(isset($_POST['tambahsupplier'])){
	$namasupplier = $_POST['namasupplier'];
	$notelpsupp = $_POST['notelpsupp'];
	$alamat = $_POST['alamat'];
	
	$addtotable = mysqli_query($conn,"insert into supplier (namasupplier, notelp, alamat) values('$namasupplier', '$notelpsupp', '$alamat')");
	if($addtotable){
		header('location:supplier.php');
	} else {
		echo 'gagal';
		header('location:supplier.php');
	}
	
}

//permintaan barang
if(isset($_POST['tambahpermintaan'])){
	$kodepermintaan = $_POST['kodepermintaan'];
	$tglpermintaan = $_POST['tglpermintaan'];
	$barangnya = $_POST['barangnya'];
    $pelanggannya = $_POST['pelanggannya'];
	$jumlah = $_POST['jumlah'];
	
	$addtopermintaanbarang = mysqli_query($conn,"insert into permintaanbarang(kodepermintaan, tglpermintaan, namabarang, namapelanggan, jumlah) values('$kodepermintaan', '$tglpermintaan', '$barangnya', '$pelanggannya', '$jumlah')");
	if($addtotable){
		header('location:permintaanbarang.php');
	} else {
		echo "gagal";
		header('location:permintaanbarang.php');
	}
	
}

//pemesanan barang
if(isset($_POST['tambahpemesanan'])){
	$tglpemesanan = $_POST['tglpemesanan'];
	$kodepesan = $_POST['kodepesan'];
	$barangpesan = $_POST['barangpesan'];
    $supplierpesan = $_POST['supplierpesan'];
	$jumlah = $_POST['jumlah'];
	
	$addtopemesananbarang = mysqli_query($conn, "insert into pemesananbarang (tanggalpemesanan, kodepemesanan, namabarang, namasupplier, jumlah) values('$tglpemesanan', '$kodepesan', '$barangpesan', '$supplierpesan', '$jumlah')");
	if($addtotable){
		header('location:pemesananbarang.php');
	} else {
		echo 'gagal';
		header('location:pemesananbarang.php');
	}
}

//barang masuk
if(isset($_POST['tambahmasuk'])){
	$kodemasuk = $_POST['kodemasuk'];
	$tanggalmasuk = $_POST['tanggalmasuk'];
	$suppliermasuk = $_POST['suppliermasuk'];
    $barangmasuk = $_POST['barangmasuk'];
	$jumlah = $_POST['jumlah'];

	$cekstoksekarang = mysqli_query($conn, "select * from barang where namabarang= '$barangmasuk'");
	$ambildatanya = mysqli_fetch_array($cekstoksekarang);
	
	$stoksekarang = $ambildatanya['stok'];
	$tambahkanstoksekarang = $stoksekarang + $jumlah;

	$addtobarangmasuk = mysqli_query($conn, "insert into barangmasuk (kodemasuk, tglmasuk, namasupplier, namabarang,  jumlah) values('$kodemasuk', '$tanggalmasuk', '$suppliermasuk', '$barangmasuk', '$jumlah')");
	$updatestokmasuk = mysqli_query($conn, "update barang set stok='$tambahkanstoksekarang' where namabarang= '$barangmasuk'");

	if($addtotable&&$updatestokmasuk){
		header('location:barangmasuk.php');
	} else {
		echo 'gagal';
		header('location:index.php');
	}
}

//barangkeluar
if(isset($_POST['tambahkeluar'])){
	$kodekeluar = $_POST['kodekeluar'];
	$kodepermintaankeluar = $_POST['kodepermintaankeluar'];
	$tanggalkeluar = $_POST['tanggalkeluar'];
    $barangkeluar = $_POST['barangkeluar'];
	$jumlah = $_POST['jumlah'];

	$cekstoksekarang = mysqli_query($conn, "select * from barang where namabarang= '$barangkeluar'");
	$ambildatanya = mysqli_fetch_array($cekstoksekarang);

	$stoksekarang = $ambildatanya['stok'];
	$tambahkanstoksekarang = $stoksekarang - $jumlah;

	$addtobarangkeluar = mysqli_query($conn, "insert into barangkeluar (kodekeluar, kodepermintaan, tanggalkeluar, namabarang,  jumlah) values('$kodekeluar', '$kodepermintaankeluar', '$tanggalkeluar', '$barangkeluar', '$jumlah')");
	$updatestokkeluar = mysqli_query($conn, "update barang set stok='$tambahkanstoksekarang' where namabarang= '$barangkeluar'");
	if($addtotable&&$updatestokmasuk){
		header('location:barangkeluar.php');
	} else {
		echo 'gagal';
		header('location:index.php');
	}
}

//update barang
if(isset($_POST['updatebarang'])){
	$idb = $_POST['idb'];
	$namabarang = $_POST['namabarang'];
	$merk = $_POST['merk'];
	$stok = $_POST['stok'];
	$hargajual = $_POST['hargajual'];

	$update = mysqli_query($conn, "update barang set namabarang='$namabarang', merk='$merk', stok='$stok', hargajual='$hargajual' where idbarang='$idb'");
	if($update){
		header('location:barang.php');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}

//hapus barang
if(isset($_POST['hapusbarang'])){
	$idb = $_POST['idb'];

	$hapus = mysqli_query($conn, "delete from barang where idbarang='$idb'");
	if($update){
		header('location:barang.php');
	} else {
		echo 'Gagal';
		header('location:barang.php');
	}
}

//update supplier
if(isset($_POST['updatesupplier'])){
	$idsupp = $_POST['idsupp'];
	$namasupplier = $_POST['namasupplier'];
    $notelpsupp = $_POST['notelpsupp'];
    $alamat = $_POST['alamat'];


	$update = mysqli_query($conn, "update supplier set namasupplier='$namasupplier', notelp='$notelpsupp', alamat='$alamat' where idsupplier='$idsupp'");
	if($update){
		header('location:supplier.php');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}

//hapus supplier
if(isset($_POST['hapussupplier'])){
	$idsupp = $_POST['idsupp'];

	$hapus = mysqli_query($conn, "delete from supplier where idsupplier='$idsupp'");
	if($update){
		header('location:supplier.php');
	} else {
		echo 'Gagal';
		header('location:supplier.php');
	}
}

//update pelanggan
if(isset($_POST['updatepelanggan'])){
	$idpelanggan = $_POST['idpelanggan'];
	$namapelanggan = $_POST['namapelanggan'];
	$notelpelanggan = $_POST['notelpelanggan'];

	$update = mysqli_query($conn, "update pelanggan set namapelanggan='$namapelanggan', notelp='$notelpelanggan' where idpelanggan='$idpelanggan'");
	if($update){
		header('location:pelanggan.php');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}

//hapus pelanggan
if(isset($_POST['hapuspelanggan'])){
	$idpelanggan = $_POST['idpelanggan'];

	$hapus = mysqli_query($conn, "delete from pelanggan where idpelanggan='$idpelanggan'");
	if($update){
		header('location:pelanggan.php');
	} else {
		echo 'Gagal';
		header('location:pelanggan.php');
	}
}

//update permintaan barang
if(isset($_POST['updatepermintaan'])){
	$idp = $_POST['idp'];
	$kodepermintaan = $_POST['kodepermintaan'];
	$namabarang = $_POST['namabarang'];
	$namapelanggan = $_POST['namapelanggan'];
	$jumlah = $_POST['jumlah'];

	$update = mysqli_query($conn, "update permintaanbarang set kodepermintaan='$kodepermintaan', namabarang='$namabarang', namapelanggan='$namapelanggan', jumlah='$jumlah' where idpermintaan='$idp'");

	if($update){
		header('location:permintaanbarang.php');
	} else {
		echo 'Gagal';
		header('location:permintaanbarang.php');
	}

}

//hapus permintaan
if(isset($_POST['hapuspermintaan'])){
	$kodepermintaan = $_POST['kodepermintaan'];

	$hapus = mysqli_query($conn, "delete from permintaanbarang where kodepermintaan='$kodepermintaan'");
	if($update){
		header('location:permintaanbarang.php');
	} else {
		echo 'Gagal';
		header('location: permintaanbarang.php');
	}
}

//update pemesanan
if(isset($_POST['updatepemesanan'])){
	$idpemesanan = $_POST['idpemesanan'];
	$kodepesan = $_POST['kodepesan'];
	$barangpesanan = $_POST['barangpesanan'];
	$supplierpesanan = $_POST['supplierpesanan'];
	$jumlah = $_POST['jumlah'];

	$update = mysqli_query($conn, "update pemesananbarang set kodepemesanan='$kodepesan', 
	namabarang='$barangpesanan', namasupplier='$supplierpesanan', jumlah='$jumlah' where idpemesanan='$idpemesanan'");

	if($update){
		header('location:pemesananbarang.php');
	} else {
		echo 'Gagal';
		header('location:pemesananbarang.php');
	}


}



//hapus pemesanan
if(isset($_POST['hapuspemesanan'])){
	$idpemesanan = $_POST['idpemesanan'];

	$hapus = mysqli_query($conn, "delete from pemesananbarang where idpemesanan='$idpemesanan'");

if($update){
		header('location:pemesananbarang.php');
	} else {
		echo 'Gagal';
		header('location: pemesananbarang.php');
	}
}

//update barang masuk
if(isset($_POST['updatemasuk'])){
	$idmasuk = $_POST['idmasuk'];
	$kodemasuk = $_POST['kodemasuk'];
	$suppliermasuk = $_POST['suppliermasuk'];
	$barangmasuk = $_POST['barangmasuk'];
	$jumlah = $_POST['jumlah'];
	

	$lihatbarang = mysqli_query($conn, "select * from barang where idbarang='$idb'");
	$jumlahnya = mysqli_fetch_array($lihatbarang);
	$jumlahskrg = $jumlahnya['stok'];

	$skrg = mysqli_query($conn, "select * from barangmasuk where idmasuk='$idmasuk'");
	$jmlh = mysqli_fetch_array($skrg);
	$skrg = $jmlh['jumlah'];

	if($jumlah>$skrg){
		$hitung = $jumlah-$skrg;
		$kurangin = $jumlahskrg - $hitung;
		$kurangistok = mysqli_query($conn, "update barang set stok='$kurangin' where idbarang='$idb'");
		$update = mysqli_query($conn, "update barangmasuk set kodemasuk='$kodemasuk', namasupplier='$suppliermasuk', namabarang='$barangmasuk', jumlah='$jumlah' where idmasuk='$idmasuk'");
			if($kurangistok&&update){	
				header('location:barangmasuk.php');
				} else {
					echo 'Gagal';
					header('location:barangmasuk.php');
			}
	} else {
		$hitung = $skrg-$jumlah;
		$kurangin = $jumlahskrg + $hitung;
		$kurangistok = mysqli_query($conn, "update barang set stok='$kurangin' where idbarang='$idb'");
		$update = mysqli_query($conn, "update barangmasuk set kodemasuk='$kodemasuk', namasupplier='$suppliermasuk', namabarang='$barangmasuk', jumlah='$jumlah' where idmasuk='$idmasuk'");
			if($kurangistok&&update){	
				header('location:barangmasuk.php');
				} else {
					echo 'Gagal';
					header('location:barangmasuk.php');
			}

	}



	

}

//hapus barang masuk
if(isset($_POST['hapusmasuk'])){
	$idmasuk = $_POST['idmasuk'];

	$hapus = mysqli_query($conn, "delete from barangmasuk where idmasuk='$idmasuk'");

if($update){
		header('location:barangmasuk.php');
	} else {
		echo 'Gagal';
		header('location: barangmasuk.php');
	}
}

//update barang keluar
if(isset($_POST['updatekeluar'])){
	$idkeluar = $_POST['idkeluar'];
	$kodekeluar = $_POST['kodekeluar'];
	$kodepermintaankeluar = $_POST['kodepermintaankeluar'];
	$barangkeluar = $_POST['barangkeluar'];
	$jumlah = $_POST['jumlah'];

	$update = mysqli_query($conn, "update barangkeluar set kodekeluar='$kodekeluar', kodepermintaan='$kodepermintaankeluar', namabarang='$barangkeluar', jumlah='$jumlah' where idkeluar='$idkeluar'");

	if($update){
		header('location:barangkeluar.php');
	} else {
		echo 'Gagal';
		header('location:barangkeluar.php');
	}
} 



//hapus barang keluar 
if(isset($_POST['hapuskeluar'])){
	$idkeluar = $_POST['idkeluar'];

	$hapus = mysqli_query($conn, "delete from barangkeluar where idkeluar='$idkeluar'");

if($update){
		header('location:barangkeluar.php');
	} else {
		echo 'Gagal';
		header('location: barangkeluar.php');
	}
}
?>