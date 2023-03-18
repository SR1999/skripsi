<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

$id = $_GET["id_lokasi"];

$lokasi = query("SELECT * FROM lokasi WHERE id_lokasi = $id")[0];

if(isset($_POST["submit"])) {
	if(edit_list_location($_POST) > 0){
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href='add_company_location.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal diubah!');
				
			</script>
		";
	}

}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Lokasi</title>
</head>
<body>
	<h1>Ubah Data Lokasi</h1>
	<a href="add_company_location.php">back</a>

	<form action="" method="post">
		<ul>
		<!-- id -->
		<input type="hidden" name="id" value="<?php echo $lokasi["id_lokasi"]; ?>">
		<!-- kode -->
		<li>
			<label for="kode">Kode Lokasi: </label>
			<input type="text" name="kode" id="kode" value="<?php echo $lokasi["kode"]; ?>">
		</li>
		<!-- daerah -->
		<li>
			<label for="daerah">Daerah: </label>
			<input type="text" name="daerah" id="daerah" value="<?php echo $lokasi["daerah"]; ?>">
		</li>

		<button type="submit" name="submit">Kirimkan</button>
		</ul>
	</form>
</body>
</html>