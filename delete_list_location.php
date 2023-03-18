<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

$id = $_GET["id_lokasi"];

if(hapus_lokasi($id) > 0){
	echo "<script>alert('Data Berhasil Dihapus');
	document.location.href='add_company_location.php';
	</script>";
}else{
	echo "<script>alert('Data Gagal Dihapus');
	</script>";
}



 ?>