<?php
include "../koneksi.php";
if (isset($_POST['save'])) {
		$nama=$_POST['nama'];
		$jenis_kelamin=$_POST['jenis_kelamin'];
$query=mysqli_query($koneksi,"insert into mahasiswa(nama,jenis_kelamin)
value ('$nama','$jenis_kelamin')");//tanda petik 1 & tanda petik 2 jangan sampai salah
if($query) {
	header ("location:tampil_mahasiswa.php"); //ini yang bakal tampil di database setelah diisi
}	else {
	echo mysqli_error ();
}
}

?>

<form method="POST" action="">
<table border="1" >
	<tr>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
	</tr>
	<tr>
		<td><Input type="text" name="nama"></td>
		<td><select name="jenis_kelamin"</td>
			<option value="">--Pilih--</option>
			<option value="pria">pria</option>
			<option value="wanita">wanita</option>

		</Select></td>
		<td><input type="submit" name="save" value="Simpan"></td>
</table>
</form>
