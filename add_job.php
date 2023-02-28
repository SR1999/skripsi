<?php 
require 'functions.php';

if(isset($_POST["submit"])){
	if (tambah_jabatan($_POST) > 0) {
		echo "<script>alert('Data Berhasil Ditambah');</script>";
	}else{
		echo "<script>alert('Data Gagal Ditambah');</script>";
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Jabatan</title>
</head>
<body>
<h1>Tambah Jabatan</h1>
<form action="" method="post">
	<ul>
		<li>
			<label for="nama_jabatan">Jabatan: </label>
			<input type="text" name="nama_jabatan" id="nama_jabatan">
		</li>
		<li>
			<label for="divisi">Divisi: </label>
			<input type="text" name="divisi" id="divisi">
		</li>
		<button type="submit" name="submit">Kirimkan</button>
	</ul>
</form>
</body>
</html>