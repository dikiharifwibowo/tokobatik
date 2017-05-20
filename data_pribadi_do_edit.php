<?php
include 'koneksidb.php';


$id_pel= $_POST['id_pelanggan']; //id katgor
$username= $_POST['username'];
$password= $_POST['password'];
$alamat= $_POST['alamat'];
$email= $_POST['email'];
$telephon= $_POST['telephon'];


$query = "UPDATE pelanggan 
    SET Username='$username', Password = '$password', Alamat='$alamat', Email='$email', Telepon=$telephon
    WHERE Id_Pelanggan = '$id_pel'";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
	echo "<script>window.alert('Data Anda Telah Berubah');
        window.location=('profil.php')</script>";
} else {
    header('Location: error.php');
}
