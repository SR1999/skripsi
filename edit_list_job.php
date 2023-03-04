<?php 
require 'functions.php';

$id = $_GET["id_jabatan"];

$jabatan = query("SELECT * FROM jabatan WHERE id_jabatan = $id")[0];

if(isset($_POST["submit"])) {
	if(edit_list_job($_POST) > 0){
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href='add_job.php';
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
	<title>Ubah Data Jabatan</title>
</head>
<body>
	<h1>Ubah Data Jabatan</h1>
	<a href="add_job.php">back</a>

	<form action="" method="post">
		<ul>
		<!-- id -->
		<input type="hidden" name="id" value="<?php echo $jabatan["id_jabatan"]; ?>">
		<!-- nama -->
		<li>
			<label for="nama">Nama Jabatan: </label>
			<input type="text" name="nama" id="nama" value="<?php echo $jabatan["nama_jabatan"]; ?>">
		</li>
		<!-- divisi -->
		<li>
			<label for="divisi">Divisi: </label>
			<input type="text" name="divisi" id="divisi" value="<?php echo $jabatan["divisi"]; ?>">
		</li>

		<button type="submit" name="submit">Kirimkan</button>
		</ul>
	</form>
</body>
</html>