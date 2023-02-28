<?php 
require 'functions.php';

if(isset($_POST["submit"])){
	if(tambah_lokasi($_POST) > 0 ){
		echo "<script>alert('Data Berhasil Ditambah');</script>";
	}else{
		echo "<script>alert('Data gagal Ditambah');</script>";
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Lokasi</title>
</head>
<body>
<h1>Tambah Lokasi</h1>

<form action="" method="post">
	<ul>
		<li>
			<label for="kode">Kode Lokasi: </label>
			<input type="text" name="kode" id="kode">
		</li>
		<li>
			<label for="daerah">Daerah: </label>
			<input type="text" name="daerah" id="daerah">
		</li>
		<button type="submit" name="submit">Kirimkan</button>
	</ul>
</form>
</body>
</html>