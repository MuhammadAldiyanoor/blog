<?php

require 'function.php';
//ambil  data di url
$id_karyawan = $_GET["id"];

//query data karyawan berdasarkan id
$buku = query("SELECT * FROM karyawan WHERE id_karyawan= $id_karyawan ")[0];

//koneksi data base
//$conn=mysqli_connect("localhost","root","","phpdasar");

//apakah tombol sudah di pencet
if (isset($_POST["submit"])) {
	var_dump($_POST);

	//Cek apakah data berhasil ditambahakan
	if (buku_ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah')
				document.location.href='buku.php'
			</script>
			";
	} else {
		echo "
			<script>
				alert('data gagal diubah')
				document.location.href='buku.php'

			</script>
			";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Ubah data Karyawan</title>
</head>

<body>
	<h1>ubah data karyawan</h1>
	<form action="" method="post">
		<ul>
			<input type="hidden" name="id_karyawan" value="<?= $karyawan["id_karyawan"]; ?>">
			<li>
				<label for="id_jabatan">JABATAN : </label>
				<select name="id_jabatan">
					<?php
					$query = "SELECT id_jabatan,jabatan FROM jabatan order by id_jabatan";
					$result = mysqli_query($conn, $query);

					if ($result) {
						$indeks = 1;
						while ($row = mysqli_fetch_array($result)) {
							?>
							<?php $selected = ($row['id_jabatan'] == $karyawan['id_jabatan']) ? "selected" : ""; ?>
							<?php echo "<option value='$row[id_jabatan]' $selected > $row[jabatan]</option>";
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
				<label for="nama">NAMA : </label>
				<input type="text" name="nama" id="nama" required value=" <?= $karyawan["nama"]; ?>">
			</li>

			<li>
				<label for="isbn">JENIS KELAMIN : </label>
				<input type="text" name="jenis_kelamin" id="jenis_kelamin" required value=" <?= $karyawan["jenis_kelamin"]; ?>">
			</li>

			<li>
				<label for="penerbit">AGAMA : </label>
				<input type="text" name="agama" id="agama" required value=" <?= $karyawan["agama"]; ?>">
			</li>

			<li>
				<label for="penulis">ALAMAT : </label>
				<input type="text" name="alamat" id="alamat" required value=" <?= $karyawan["alamat"]; ?>">
			</li>

			<li>
				<button type="submit" name="submit">Ubah Data</button>

			</li>
		</ul>


	</form>

</body>

</html>