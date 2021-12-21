<?php
//MEMANGIL FUNGSI
require 'function.php';
//menampilkan data dalam tabel jabatan
$jabatan = query("SELECT * FROM JABATAN");

//melakukan pencarian jika tombol cari di pencet dan akan di lempar pada fungsi cari
if (isset($_POST["cari"])) {
    $jabatan = jabatan_cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JABATAN KARYAWAN</title>
</head>

<body>
    <i-- INI FORM MENU -->
        <form>
            <a href="index.php">GO HOME</a>|
            <a href="jabatan.php">JABATAN</a>|
            <a href="karyawan.php">KARYAWAN</a>
        </form>

        <h1>DATA JABATAN KARYAWAN</h1>

        <a href="jabatan_tambah.php">Tambah Data Kategori</a>|

        <br><br>
        <form action="" method="post">
            <input type="text" name="keyword" size="35" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
            <button type="submit" name="cari">SEARCH</button>
            <br>
        </form>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>AKSI</th>
                <th>ID_JABATAN</th>
                <th>JABATAN</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($jabatan as $row) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>
                        <a href="jabatan_ubah.php?id=<?= $row["id_jabatan"]; ?>">ubah</a>
                        <a href="jabatan_hapus.php?id=<?= $row["id_jabatan"]; ?>">hapus</a>
                    </td>
                    <td><?= $row["id_jabatan"]; ?></td>
                    <td><?= $row["jabatan"]; ?></td>
                </tr>

                <?php $i++  ?>
            <?php endforeach; ?>
        </table>
</body>

</html>