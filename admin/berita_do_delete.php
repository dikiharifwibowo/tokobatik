<?php

include '../koneksidb.php';

$id_berita = $_GET['id_berita'];

$query = "DELETE FROM berita WHERE id_berita = '$id_berita'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: berita.php');
} else {
    header('location: error.php');
}
