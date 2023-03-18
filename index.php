<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Website Manajemen Presensi</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<nav>
		<ul>
			<li>
				<a href="#" class="logo">
				<img src="img/logo.jpg">
				<span class="nav-item">Sistem Presensi</span>
				</a>
			</li>
			<li><a href="#">
				<i class="fa-solid fa-house"></i>
				<span class="nav-item">Beranda</span></a>
			</li>
			<li><a href="add_employee.php">
				<i class="fa-solid fa-table"></i>
				<span class="nav-item">Masterdata</span></a>
			</li>
			<li><a href="#">
				<i class="fa-solid fa-clipboard-user"></i>
				<span class="nav-item">Lihat Absen</span></a>
			</li>
			<li><a href="#">
				<i class="fa-solid fa-gear"></i>
				<span class="nav-item">Pengaturan</span></a>
			</li>
			<li><a href="logout.php" class="logout">
				<i class="fa-solid fa-right-from-bracket"></i>
				<span class="nav-item">Logout</span></a>
			</li>
		</ul>
	</nav>
	
</body>
</html>