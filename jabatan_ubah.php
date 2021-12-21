<?php
require 'function.php';
//ambil  data yang di lempar dari form jabatan
$id_jabatan = $_GET["id"];

//query data jabatan berdasarkan id_jabatan
$jabatan = query("SELECT * FROM jabatan WHERE id_jabatan= $id_jabatan ")[0];

//jika tombol subbit telah di pencet maka 
if (isset($_POST["submit"])) {
	//var_dump($_POST);	

	//Cek apakah data berhasil ditambahakan dengan menggunkan java script
	if (jabatan_ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah')
				document.location.href='jabatan.php'
			</script>
			";
	} else {
		echo "
			<script>
				alert('data gagal diubah')
				document.location.href='jabatan.php'

			</script>
			";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Ubah Data Kategori</title>
</head>

<body>
	<h1>Ubah Data Kategori</h1>
	<form action="" method="post">
		<ul>
			<input type="hidden" name="id_kategori" value="<?= $kat["id_kategori"]; ?>">
			<li>
				<label for="kategori">KATEGORI : </label>
				<input type="text" name="kategori" id="kategori" required value=" <?= $kat["kategori"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data</button>
			</li>
		</ul>


	</form>

</body>

</html>