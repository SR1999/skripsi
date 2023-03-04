<?php 
require 'functions.php';

if(isset($_POST["submit"])){
	if(tambah_lokasi($_POST) > 0 ){
		echo "<script>alert('Data Berhasil Ditambah');</script>";
	}else{
		echo "<script>alert('Data gagal Ditambah');</script>";
	
	}
}
$lokasi = query("SELECT * FROM lokasi");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Lokasi</title>
</head>
<body>
<h1>Tambah Lokasi</h1>
<a href="add_employee.php">back</a>

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
	<table border="1" cellpadding="10" cellspacing="0" >
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Kode</th>
			<th>Daerah</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach($lokasi as $lk) :?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><a href="edit_list_location.php?id_lokasi=<?php	echo $lk["id_lokasi"];?>">Edit</a> | 
			<a href="delete_list_location.php?id_lokasi=<?php echo $lk["id_lokasi"];?>" onclick = "return confirm('yakin?')">Hapus</a></td>
			<td><?php echo $lk["kode"]; ?></td>
			<td><?php echo $lk["daerah"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>

</form>
</body>
</html>