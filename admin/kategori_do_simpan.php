<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (! isset($_SESSION['user'])) {
    header('Location: ../login_admin.php');
    exit();
}

include '../koneksidb.php';


$idkategori = $_POST['id_kategori'];
$namakategori= $_POST['nama_kategori'];

$query = "INSERT INTO kategori (Id_Kategori, Nama_Kategori) 
    VALUES ('$idkategori','$namakategori')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: kategori.php');
} else {
    header('Location: error.php');
}
?>