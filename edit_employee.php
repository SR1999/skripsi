<?php 
require 'functions.php';

$id = $_GET["id_karyawan"];
$karyawan = query("SELECT * FROM karyawan WHERE id_karyawan = $id")[0];
$jabatan = query("SELECT * FROM jabatan");
$lokasi = query("SELECT * FROM lokasi");

if(isset($_POST["submit"])) {
	if(edit($_POST) > 0){
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href='add_employee.php';
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
	<title>Ubah Data Karyawan</title>
</head>
<body>
	<h1>Nama Karyawan</h1>
	<a href="add_employee.php">back</a>
	<form action="" method="post">
		<ul>
		<!-- id -->
		<input type="hidden" name="id" value="<?php echo $karyawan["id_karyawan"]; ?>">
		<!-- nama -->
		<li>
			<label for="nama">Nama Pegawai: </label>
			<input type="text" name="nama" id="nama" value="<?php echo $karyawan["nama_karyawan"]; ?>">
		</li>
		<!-- jabatan -->
		<li>
			<label for="jabatan">Jabatan: </label>
			<select id="jabatan" name="jabatan">
				<?php foreach ($jabatan as $jb) : ?>

				<option value="<?php echo $jb["id_jabatan"]; ?>"><?php echo $jb["nama_jabatan"]; ?></option>	
				<?php endforeach; ?>
			</select>
		</li>
		<!-- lokasi -->
		<li>
			<label for="lokasi">Lokasi: </label>
			<select id="lokasi" name="lokasi">
				<?php foreach ($lokasi as $lk) : ?>
				<option value="<?php echo $lk["id_lokasi"]; ?>"><?php echo $lk["kode"]; ?></option>
				<?php endforeach; ?>
			</select>
		</li>
		<!-- nip -->
		<li>
			<label for="nip">NIP: </label>
			<input type="text" name="nip" id="nip" value="<?php echo $karyawan["nip"]; ?>">
		</li>

		<button type="submit" name="submit">Kirimkan</button>
		</ul>
	</form>
</body>
</html>