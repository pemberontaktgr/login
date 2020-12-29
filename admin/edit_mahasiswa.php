<?php
include '../koneksi.php';

if(isset($_POST['save']))
{
	$query_edit=mysqli_query($koneksi, "update mahasiswa set nama='".$_POST['nama']."',
	jenis_kelamin='".$_POST['jenis_kelamin']."'
	where id_mahasiswa='".$_POST['id_mahasiswa']."'");

	if($query_edit){
		header("location:tampil_mahasiswa.php");
	}else{
		echo mysqli_error();
	}

}

$data_dari_tampil_mahasiswa=mysqli_query($koneksi,"select * from mahasiswa where id_mahasiswa='".$_GET['id_mahasiswa']."'");
$tampil=mysqli_fetch_array($data_dari_tampil_mahasiswa);
?>
<form method="POST">
	<table border="1">
	<input type="hidden" name="id_mahasiswa" value="<?php echo $tampil['id_mahasiswa'];?>"
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $tampil['nama'];?>"></td>
		<tr>
		<tr>
		<td>Jenis Kelamin</td>
		<td><select name="jenis_kelamin">
			<option value="">--Pilih--</option>
			<option value="pria">Pria</option>
			<option value="wanita">Wanita</option>
		</select></td>
		</tr>
		<tr>
		<td><input type="submit" name="save"></td>
		</tr>
	</table>
</form>
</form>
