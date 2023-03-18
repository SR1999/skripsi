<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

if(isset($_POST["submit"])){
	if(tambah($_POST) > 0){
		echo "<script>alert('Data Berhasil Ditambah');</script>";
	}else{
		echo "<script>alert('Data Gagal Ditambah');</script>";
	}
	// var_dump($_POST);
}

$table = query("SELECT id_karyawan, nama_karyawan, nip, nama_jabatan, kode AS Alamat, daerah
FROM karyawan
JOIN jabatan USING(id_jabatan)
JOIN lokasi USING(id_lokasi);");

$jabatan = query("SELECT * FROM jabatan");
$lokasi = query("SELECT * FROM lokasi");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Masterdata</title>
</head>
<body>
	<h1>MASTERDATA</h1>

<!-- INPUT FORM -->

<form action="" method="post">
	<a href="index.php">back</a> | <a href="add_company_location.php">add location</a> | <a href="add_job.php">add job</a>
	<ul>
		<!-- nama -->
		<li>
			<label for="nama">Nama Pegawai: </label>
			<input type="text" name="nama" id="nama" required>
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
			<input type="text" name="nip" id="nip">
		</li>

		<button type="submit" name="submit">Kirimkan</button>
		</ul>

<!-- TABLE -->

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>NIP</th>
			<th>Alamat</th>
			<th>Daerah</th>
		</tr>
<?php $i = 1; ?>
<?php foreach ($table as $row) :?>
		<tr>
			<td><?php echo $i; ?></td>
			<td>
				<a href="edit_employee.php?id_karyawan=<?php echo $row["id_karyawan"]; ?>">Edit</a> | 
				<a href="delete_employee.php?id_karyawan=<?php echo $row["id_karyawan"]; ?>" onclick = "return confirm('yakin?')">Hapus</a>
			</td>
			<td><?php echo $row["nama_karyawan"]; ?></td>
			<td><?php echo $row["nama_jabatan"]; ?></td>
			<td><?php echo $row["nip"]; ?></td>
			<td><?php echo $row["Alamat"]; ?></td>
			<td><?php echo $row["daerah"]; ?></td>
		</tr>
<?php $i++; ?>
<?php endforeach; ?>
	</table>

	
</form>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<body>

<h2>The select Element</h2>

<p>The select element defines a drop-down list:</p>

<form action="/action_page.php">
  <label for="cars">Choose a car:</label>
  <select id="cars" name="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
  <input type="submit">
</form>

</body>
</html> -->