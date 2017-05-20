<?php

include '../koneksidb.php';

$id_pel = $_GET['id_pel'];

$query = "DELETE FROM pelanggan WHERE Id_Pelanggan = '$id_pel'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: pelanggan.php');
} else {
    header('location: error.php');
}
