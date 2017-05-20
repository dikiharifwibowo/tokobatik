<?php
include '../koneksidb.php';

$id_produk= $_POST['id_produk'];
$nama_kategori= $_POST['nama_kategori'];
$nama_produk= $_POST['nama_produk']; //id katgor
$harga_produk= $_POST['harga_produk'];
$size= $_POST['size'];
$stock= $_POST['stock'];

if (isset($_POST['Simpan'])){
 $fileName = $_FILES['gambar']['name'];
}

$query = "UPDATE produk 
    SET Id_Kategori='$nama_kategori', Nama_Produk='$nama_produk', Harga_Produk = '$harga_produk', Size='$size', Stock='$stock', Gambar='$fileName'
    WHERE Id_Produk = '$id_produk'";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$_FILES['gambar']['name']);
    header('Location: produk.php');
} else {
    header('Location: error.php');
}
