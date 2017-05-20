<?php

include '../koneksidb.php';

$id_produk = $_GET['id_produk'];

$query = "DELETE FROM produk WHERE Id_Produk = '$id_produk'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: produk.php');
} else {
    header('location: error.php');
}
