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

function tambah($data){
	global $conn;

	/**
	 * Collect Data
	 */
	$jabatan = $data["id_jabatan"];
	$lokasi = $data["id_lokasi"];
	$nama_karyawan = htmlspecialchars($data["nama_karyawan"]);
	$nip = htmlspecialchars($data["nip"]);

	try {
		$query = "INSERT INTO karyawan VALUES ('', $jabatan, $lokasi, '$nama_karyawan', '$nip')";
		mysqli_query($conn, $query);
		
		return mysqli_affected_rows($conn);
	} catch(Exception $e) {
		print_r($e->getMessage());die;
	}
}




 ?>