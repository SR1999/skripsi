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

function edit($data){
	global $conn;
	$id = $data["id"];
	$jabatan = $data["jabatan"];
	$lokasi = $data["lokasi"];
	$nama = htmlspecialchars($data["nama"]);
	$nip = htmlspecialchars($data["nip"]);
	try {
		$query = "UPDATE karyawan SET
		id_jabatan = $jabatan,
		id_lokasi = $lokasi,
		nama_karyawan = '$nama',
		nip = '$nip'
		WHERE id_karyawan = $id";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
		
	} catch (Exception $e) {
		print_r($e->getMessage());die;
	}
}

function edit_list_location($data){
	global $conn;
	$id = $data["id"];
	$kode = htmlspecialchars($data["kode"]);
	$daerah = htmlspecialchars($data["daerah"]);

	try {
		$query = "UPDATE lokasi SET
		kode = '$kode',
		daerah = '$daerah'
		WHERE id_lokasi = $id";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
		
	} catch (Exception $e) {
		print_r($e->getMessage());die;
	}
}

function edit_list_job($data){
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$divisi = htmlspecialchars($data["divisi"]);

	try {
		$query = "UPDATE jabatan SET
		nama_jabatan = '$nama',
		divisi = '$divisi'
		WHERE id_jabatan = $id";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
		
	} catch (Exception $e) {
		print_r($e->getMessage());die;
	}
}

function hapus($id){ //karyawan
	global $conn;
	try {
	$query = "DELETE FROM karyawan WHERE id_karyawan=$id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
		
	} catch (Exception $e) {
		print_r($e -> getMessage());die;
	}
}


function hapus_lokasi($id){
	global $conn;
	try {
	$query = "DELETE FROM lokasi WHERE id_lokasi=$id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
		
	} catch (Exception $e) {
		print_r($e -> getMessage());die;
	}
}


function hapus_jabatan($id){
	global $conn;
	try {
	$query = "DELETE FROM jabatan WHERE id_jabatan=$id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
		
	} catch (Exception $e) {
		print_r($e -> getMessage());die;
	}
}

function register($data){
	global $conn;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2 = mysqli_real_escape_string($conn,$data["password2"]);


	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>alert('username sudah terdaftar');</script>";
		return false;
	}
	// cek konfirmasi password
	if($password !== $password2){
		echo "<script>alert('Password tidak sesuai!');</script>";
		return false;
	}
	

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	try{
		mysqli_query($conn, "INSERT INTO users VALUES('','$username','$password')");
		return mysqli_affected_rows($conn);
	}catch (Exception $e){
		print_r( $e -> getMessage() ); die;
	}

	
}


 ?>