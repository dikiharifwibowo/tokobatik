<?php
include '../koneksidb.php';

$kategori = $_POST['nama_kategori']; //ke balik ga masalah
$id_kategori = $_POST['id_kategori'];

$query = "UPDATE kategori 
    SET nama_kategori = '$kategori'
    WHERE id_kategori = '$id_kategori'";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    header('Location: kategori.php');
} else {
    header('Location: error.php');
}
