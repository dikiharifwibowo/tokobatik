<?php
if (session_status()!=PHP_SESSION_ACTIVE) {
	session_start();
}

// ... jika belum login, alihkan ke halaman login
if (! isset($_SESSION['user'])) {
    header('Location: ../login_admin.php');
    exit();
}



include '../koneksidb.php'; //maksimal titiknya 2

$query = "SELECT * FROM kategori";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_produk = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_produk[] = $row;
}


