<?php

include '../koneksidb.php';

$Kd_Order = $_GET['Kd_Order'];

$query = "DELETE FROM orderan WHERE Kd_Order = '$Kd_Order'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: orderan.php');
} else {
    header('location: error.php');
}
