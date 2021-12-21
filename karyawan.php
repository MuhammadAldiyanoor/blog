<?php
//library fungsi
require 'function.php';
//query menampilkan data yang ada dalam tabel karyawan dan sudah berelasi dengan tabel jabatan.
$karyawan = query("SELECT karyawan.id_karyawan,jabatan.id_jabatan,karyawan.nama,karyawan.jenis_kelamin,karyawan.agama,karyawan.alamat,karyawan.no_hp 
    FROM KARYAWAN,JABATAN WHERE jabatan.id_jabatan=karyawan.id_jabatan");

//Perintah melakukan pencarain, data pada $buku akan di timpal jika pencarian ditemukan.
if (isset($_POST["cari"])) {
    $karyawan = karyawan_cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA BUKU</title>

</head>

<body>
    <form><a href="index.php">GO HOME</a>|
        <a href="jabatan.php">JABATAN</a>|
        <a href="karyawan.php">KARYAWAN</a>
    </form>

    <h1>DATA KARYAWAN</h1>
    <a href="karyawan_tambah.php">Tambah Data Karyawan</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword" size="35" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">CARI</button>
        <br>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>AKSI</th>
            <th>ID KARYAWAN</th>
            <th>ID JABATAN</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>ALAMAT</th>
            <th>NO HP</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach ($karyawan as $row) : ?>

            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="karyawan_ubah.php?id=<?= $row["id_karyawan"]; ?>">ubah</a>
                    <a href="karyawan_hapus.php?id=<?= $row["id_karyawan"]; ?>">hapus</a>
                </td>
                <td><?= $row["id_karyawan"]; ?></td>
                <td><?= $row["id_jabatan"] ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["jenis_kelamin"]; ?></td>
                <td><?= $row["agama"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["no_hp"]; ?></td>
            </tr>

            <?php $i++  ?>
        <?php endforeach; ?>
    </table>
</body>

</html>