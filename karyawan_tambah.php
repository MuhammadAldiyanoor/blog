<?php
//memanggil fungsi yang di gunkan untuk koneksi dan menambah data
require 'function.php';


//apakah tombol sudah di pencet
if (isset($_POST["submit"])) {
	//var_dump($_POST);				

	//Cek apakah data berhasil ditambahakan
	if (karyawan_tambah($_POST) > 0) {
		echo "

			<script>
				alert('data berhasil ditambahkan')
				document.location.href='karyawan.php'

			</script>
			";
	} else {
		echo "
			<script>
				alert('data gagal')
				document.location.href='karyawan.php'

			</script>
			";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Tambah data karyawan</title>
</head>

<body>
	<h1>tambah data karyawan</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="nama">nama : </label>
				<input type="text" name="nama" id="nama">
			</li>

			<li>
				<label for="jenis_kelamin">Jenis Kelamin : </label>
				<input type="text" name="jenis_kelamin" id="jenis_kelamin">
			</li>

			<li>
				<label for="id_jabatan">Jabatan : </label>
				<select name="id_jabatan">
					<?php
					$query = "SELECT id_jabatan,jabatan FROM jabatan order by jabatan";
					$result = mysqli_query($conn, $query);

					if ($result) {
						$indeks = 1;
						while ($row = mysqli_fetch_array($result)) {
							?>
							<?php echo "<option value='$row[id_jabatan]'> $row[jabatan]</option>";
							?>
							<?php
							$indeks++;
						}
						mysqli_free_result($result);
					}
					?>
				</select>

			</li>

			<li>
				<label for="agama">Agama : </label>
				<input type="text" name="agama" id="agama">
			</li>

			<li>
				<label for="alamat">Alamat : </label>
				<input type="text" name="alamat" id="alamat">
			</li>

			<li>
				<label for="no_hp">No HP: </label>
				<input type="text" name="no_hp" id="no_hp">
			</li>

			<li>
				<button type="submit" name="submit">Tambah Data</button>

			</li>
		</ul>

	</form>

</body>

</html>