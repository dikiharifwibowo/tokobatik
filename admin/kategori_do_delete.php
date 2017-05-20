<?php

include '../koneksidb.php';

$id_kategori = $_GET['id_kategori'];

$query = "DELETE FROM kategori WHERE Id_Kategori = '$id_kategori'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: kategori.php');
} else {
    header('location: error.php');
}
