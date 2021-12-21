<?php
//perlu koneksi dan nantinya digunkan me
require 'function.php';

//apakah tombol sudah di pencet
if (isset($_POST["submit"])) {
	//var_dump($_POST);				

	//Cek apakah data berhasil ditambahakan
	if (jabatan_tambah($_POST) > 0) {
		echo "

			<script>
				alert('data berhasil ditambahkan')
				document.location.href='jabatan.php'

			</script>
			";
	} else {
		echo "
			<script>
				alert('data gagal')
				document.location.href='jabatan.php'

			</script>
			";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Tambah Data Jabatan</title>
</head>

<body>
	<h1>Tambah Data Kategori</h1>
	<form action="" method="post">
		<ul>
			<label for="Jabatan">Nama Jabatan : </label>
			<input type="text" name="jabatan" id="jabatan">
			<button type="submit" name="submit">Tambah Data</button>
		</ul>

	</form>

</body>

</html>