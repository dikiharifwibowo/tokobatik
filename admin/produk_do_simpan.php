
<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (! isset($_SESSION['user'])) {
    header('Location: ../login_admin.php');
    exit();
}

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

//urutan di sini hrs urut sesuai database
$query = "INSERT INTO produk (Id_Produk, Id_Kategori,Nama_Produk, Harga_Produk, Stock, Size,Gambar, Tanggal)  
    VALUES ('$id_produk','$nama_kategori','$nama_produk','$harga_produk','$stock','$size','$fileName',now())";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$_FILES['gambar']['name']);
    header('Location: produk.php');
} else {
    header('Location: error.php');
}
?>
