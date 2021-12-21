<?php
//koneksi data base 
$conn = mysqli_connect("localhost", "root", "", "karyawan_aldiyanoor");

function query($query)
{
    global $conn;
    //ambil data dari querry 
    $result = mysqli_query($conn, $query);

    //siapkan array penampung
    $rows = [];

    //mengambil data dari result, dengan array asosiatif
    while ($row = mysqli_fetch_assoc($result)) {
        //ambil data simpan di row,dimana untuk manambahkan elemen baru tiap array
        $rows[] = $row;
    }
    return $rows;
}

//fungsi untuk menambah data ke tabel jabatan
function jabatan_tambah($data)
{
    global $conn;

    //$id_jabatan=htmlspecialchars($data["id_jabatan"]);
    $jabatan = htmlspecialchars($data["jabatan"]);

    $query = "INSERT INTO KATEGORI VALUES('','$jabatan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data dalam tabel kategori
function jabatan_hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jabatan WHERE id_jabatan =$id");

    return mysqli_affected_rows($conn);
}

//FUNGSI EDIT pada tabel JABATAN
function jabatan_ubah($data)
{
    global $conn;

    $id_jabatan = $data["id_jabatan"];
    $jabatan = htmlspecialchars($data["jabatan"]);

    $query = "UPDATE jabatan SET 			
			jabatan='$jabatan'
			WHERE id_jabatan=$id_jabatan
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//FUNGSI PENCARIAN DATA DALAM TABEL JABATAN
function jabatan_cari($keyword)
{
    global $conn;
    $query = "SELECT * FROM jabatan WHERE jabatan LIKE '%$keyword%'
        ";
    return query($query);
}

//FUNGSI  UNTUK MENAMBAHKAN DATA KEDALAM TABEL KARYAWAN
function karyawan_tambah($data)
{
    global $conn;
    //$id_karyawan=htmlspecialchars($data["id_karyawan"]);
    $id_jabatan = ($data["id_jabatan"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $agama = htmlspecialchars($data["agama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    $query = "INSERT INTO KARYAWAN VALUES('','$id_jabatan','$nama','$jenis_kelamin','$agama','$alamat','$no_hp')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
//FUNGSI UNTUK MENGHAPUS DATA PADA TABEL KARYAWAN
function karyawan_hapus($id)
{

    global $conn;
    mysqli_query($conn, "DELETE FROM karyawan WHERE id_karyawan =$id");

    return mysqli_affected_rows($conn);
}

//FUNGSI UNTUK MENGHAPUS DATA DALAM TABEL KARYAWAN
function karyawan_ubah($data)
{
    global $conn;

    global $conn;

    $id_karyawan = $data["id_karyawan"];
    $id_jabatan = ($data["id_jabatan"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $agama = htmlspecialchars($data["agama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    $query = "UPDATE karyawan SET 			
            id_jabatan='$id_jabatan',
            nama='$nama',
            jenis_kelamin='$jenis_kelamin',
            agama='$agama',
            alamat='$alamat'
            no_hp='$no_hp'

			WHERE id_karyawan=$id_karyawan
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//FUNGSI PENCARIAN KARYAWAN
function karyawan_cari($keyword)
{
    global $conn;
    //$query="SELECT * FROM karyawan WHERE nama LIKE '%$keyword%' ";

    $query = "SELECT karyawan.id_karyawan,jabatan.jabatan,karyawan.nama,karyawan.jenis_kelamin,karyawan.agama,karyawan.alamat,karyawan.no_hp
        FROM KARYAWAN,JABATAN 
        WHERE jabatan.id_jabatan=karyawan.id_jabatan AND 
        (nama LIKE '%$keyword%' OR
         jenis_kelamin LIKE '%$keyword%' OR
         agama LIKE  '%$keyword%' OR
         alamat  LIKE '%$keyword%' OR
         no_hp LIKE '%$keyword%' 
        )";


    /*$query = "SELECT karyawan.id_karyawan,jabatan.jabatan,karyawan.nama,karyawan.jenis_kelamin,karyawan.agama,karyawan.alamat,karyawan no_hp FROM KARYAWAN
    INNER JOIN JABATAN on jabatan.id_jabatan=karyawan.id_jabatan
    WHERE   
        nama LIKE '%$keyword%' OR
        jabatan LIKE '%$keyword%'  OR
        alamat LIKE '%$keyword%' OR
        agama LIKE '%$keyword%' ;
*/
    return query($query);
}
