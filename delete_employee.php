<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

$id = $_GET["id_karyawan"];

if(hapus($id) > 0){
	echo "<script>alert('Data Berhasil Dihapus');
	document.location.href = 'add_employee.php';</script>";
}else{
	echo "<script>alert('Data Gagal Dihapus');
	document.location.href = 'add_employee.php';</script>";
}



 ?>