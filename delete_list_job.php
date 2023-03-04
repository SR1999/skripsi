<?php 
require 'functions.php';

$id = $_GET["id_jabatan"];

if(hapus_jabatan($id) > 0){
	echo "<script>alert('Data Berhasil Dihapus');
	document.location.href='add_job.php';
	</script>";
}else{
	echo "<script>alert('Data Gagal Dihapus');
	</script>";
}



 ?>