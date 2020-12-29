<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>TAMPIL MAHASISWA</title>
  </head>
  <body>
    <h1>LIST MAHASISWA</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>

<?php
include "../koneksi.php";

$total_mhs=mysqli_query($koneksi,
"select count(id_mahasiswa) as ttl_mhs from mahasiswa");
$all_mhs=mysqli_fetch_array($total_mhs);

$total_mhs_pria=mysqli_query($koneksi,
"select count(id_mahasiswa) as all_pria from mahasiswa where jenis_kelamin='pria'");
$all_pria=mysqli_fetch_array($total_mhs_pria);

$total_mhs_wanita=mysqli_query($koneksi,
"select count(id_mahasiswa) as all_wanita from mahasiswa where jenis_kelamin='wanita'");
$all_wanita=mysqli_fetch_array($total_mhs_wanita);

?>
<table class="table table-dark">
	<tr>
		<td>No</td>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
		<td colspan="2">Action</td>
	</tr>
	<?php
		$no=1;
		$query=mysqli_query($koneksi,"select * from mahasiswa");
		while($list_mahasiswa=mysqli_fetch_array($query))
		{
		?>
	<tr>
		<td><?php echo $no++?></td>
		<td><?php echo $list_mahasiswa ['nama'];?></td>
		<td><?php echo $list_mahasiswa ['jenis_kelamin'];?>
		<td><a href="edit_mahasiswa.php?id_mahasiswa=<?php echo $list_mahasiswa['id_mahasiswa'];?>">Edit</td>
		<td><a href="hapus_mahasiswa.php?id_mahasiswa=<?php echo $list_mahasiswa['id_mahasiswa'];?>">Hapus</td>
	</tr>
	<?php } ?>
	<tr>
		<td>Jumlah semua mahasiswa 		  <?php echo $all_mhs ['ttl_mhs'];		?></td>
		<td>Jumlah semua mahasiswa pria   <?php echo $all_pria ['all_pria'];	?></td>
		<td>Jumlah semua mahasiswa wanita <?php echo $all_wanita ['all_wanita'];?></td>
	</tr>
</table>
</html>
