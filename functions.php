<?php 
$conn = mysqli_connect("localhost","root","","webpresensi");


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){ //tambah data karyawan
	global $conn;

	/**
	 * Collect Data
	 */
	$jabatan = $data["jabatan"];
	$lokasi = $data["lokasi"];
	$nama_karyawan = htmlspecialchars($data["nama"]);
	$nip = htmlspecialchars($data["nip"]);

	try {
		$query = "INSERT INTO karyawan VALUES ('', $jabatan, $lokasi, '$nama_karyawan', '$nip')";
		mysqli_query($conn, $query);
		
		return mysqli_affected_rows($conn);
	} catch(Exception $e) {
		print_r($e->getMessage());die;
	}
}

function tambah_jabatan($data){
	global $conn;

	$nama_jabatan = htmlspecialchars($data["nama_jabatan"]);
	$divisi = htmlspecialchars($data["divisi"]);

	try{
		$query = "INSERT INTO jabatan VALUES(
		'','$nama_jabatan','$divisi'
	)";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
	}catch(Exception $e){
		print_r($e -> getMessage());die;
	}
}

function tambah_lokasi($data){
	global $conn;
	$kode = htmlspecialchars($data["kode"]);
	$daerah = htmlspecialchars($data["daerah"]);

	try {
		$query = "INSERT INTO lokasi VALUES(
		'','$kode','$daerah'
	)";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
	} catch (Exception $e) {
		print_r($e -> getMessage());die;
	}
}



 ?>