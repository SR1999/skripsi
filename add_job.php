<?php 
require 'functions.php';

if(isset($_POST["submit"])){
	if (tambah_jabatan($_POST) > 0) {
		echo "<script>alert('Data Berhasil Ditambah');</script>";
		
		
	}else{
		echo "<script>alert('Data Gagal Ditambah');</script>";
	}
}
$jabatan = query("SELECT * FROM jabatan");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Jabatan</title>
</head>
<body>
<h1>Tambah Jabatan</h1>
<a href="add_employee.php">back</a>

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
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Aksi</th>
		<th>Jabatan</th>
		<th>Divisi</th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach($jabatan as $row) : ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><a href="edit_list_job.php?id_jabatan=<?php echo $row["id_jabatan"];?>">Edit</a> | 
		<a href="delete_list_job.php?id_jabatan=<?php echo $row["id_jabatan"];?>" onclick = "return confirm('yakin?')">Hapus</a></td>
		<td><?php echo $row["nama_jabatan"]; ?></td>
		<td><?php echo $row["divisi"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	</table>
</form>
</body>
</html>