<?php
include('database.php');
$koneksi = new database();

//----PELANGGAN----//
$action = $_GET['action'];
if ($action == "add")
{
    $koneksi->tambah_data($_POST['id_pelanggan'], $_POST['nm_pel'],$_POST['alamat'], $_POST['hp']);
    header('location:Pelanggan/tampil.php');
}
elseif ($action=="update") 
{
	$koneksi->update_data($_POST['id_pelanggan'], 
	$_POST['nm_pel'],$_POST['alamat'], $_POST['hp']);
    header('location:Pelanggan/tampil.php');
}

elseif ($action=="delete")
{
	$id_pelanggan = $_GET['id'];
	$koneksi->delete_data($id_pelanggan);
	header('location:Pelanggan/tampil.php');
}


//----PAKET----//

else if ($action == "addpaket")
{
    $koneksi->tambah_data_paket($_POST['id_paket'], $_POST['nm_paket'],$_POST['harga']);
    header('location:Paket/tampil.php');
}
elseif ($action=="updatepaket") 
{
	$koneksi->update_data_paket($_POST['id_paket'], $_POST['nm_paket'],$_POST['harga']);
    header('location:Paket/tampil.php');
}

elseif ($action=="deletepaket")
{
	$id_paket = $_GET['idpaket'];
	$koneksi->delete_data_paket($id_paket);
	header('location:Paket/tampil.php');
}

//----KASIR----//

else if ($action == "addkasir")
{
    $koneksi->tambah_data_kasir($_POST['id_user'], $_POST['nm_user'],$_POST['password'], $_POST['level']);
    header('location:Kasir/tampil.php');
}
elseif ($action=="updatekasir") 
{
	$koneksi->update_data_kasir($_POST['id_user'], $_POST['nm_user'],$_POST['password'], $_POST['level']);
    header('location:Kasir/tampil.php');
}

elseif ($action=="deletekasir")
{
	$id_user = $_GET['idkasir'];
	$koneksi->delete_data_kasir($id_user);
	header('location:Kasir/tampil.php');
}

//----TRANSAKSI----//

else if ($action == "addtran")
{	
	$harga = ($_POST['harga']);
	$jml_kilo = ($_POST['jml_kilo']);
	$tp = $harga * $jml_kilo ;
    $koneksi->tambah_data_tran($_POST['id_transaksi'],$_POST['id_user'], $_POST['id_pelanggan'],$_POST['id_paket'],
	$_POST['tgl_transaksi'], $_POST['harga'], $_POST['jml_kilo'], $tp);
    header('location:Transaksi/tampil.php');
}
elseif ($action=="updatetran") 
{
	$koneksi->tambah_data_tran($_POST['id_transaksi'], $_POST['id_pelanggan'],$_POST['id_paket'], $_POST['tgl_transaksi'], $_POST['harga'], $_POST['jml_kilo'], $_POST['total']);
    header('location:Transaksi/tampil.php');
}

elseif ($action=="deletetran")
{
	$id_transaksi = $_GET['idtran'];
	$koneksi->delete_data_tran($id_transaksi);
	header('location:Transaksi/tampil.php');
}

elseif ($action=="logout") 
{
	session_start();
	session_destroy();
	header('location:../index.php');
} elseif ($action == "login") {
	session_start();
	$koneksi->cek_data($_POST['nm_user'],$_POST['password']);
}

?>