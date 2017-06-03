<?php
include '../koneksidb.php';

$judul = $_POST['judul']; //ke balik ga masalah
$isi = $_POST['isi'];
$fileName = $_FILES['gambar']['name'];
$id_berita = $_POST['id_berita'];

$query = "UPDATE berita 
    SET judul = '$judul', isi = '$isi', foto = '$fileName'
    WHERE id_berita = '$id_berita'";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$_FILES['gambar']['name']);
    header('Location: berita.php');
} else {
    header('Location: error.php');
}

?>
