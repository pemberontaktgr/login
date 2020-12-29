<?php
include '../koneksi.php';

$hapus=mysqli_query($koneksi,"delete from mahasiswa where id_mahasiswa='".$_GET['id_mahasiswa']."'");
if($hapus){
	header("location:tampil_mahasiswa.php");
}else{
	echo mysqli_error();
}

?>
