<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (! isset($_SESSION['user'])) {
    header('Location: ../login_admin.php');
    exit();
}

include '../koneksidb.php';


$idberita = $_POST['id_berita'];
$judul= $_POST['judul'];
$isi = $_POST['isi'];
$fileName = $_FILES['gambar']['name'];


$query = "INSERT INTO berita (id_berita, foto, judul,isi) 
    VALUES ('$idberita','$fileName','$judul','$isi')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$_FILES['gambar']['name']);
    header('Location: berita.php');
} else {
    header('Location: error.php');
}
?>