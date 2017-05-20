<?php
include '../koneksidb.php';

// ambil artikel yang mau di edit
$id_kategoriproduk = $_GET['id_kategori'];
$query = "SELECT * FROM kategori WHERE Id_Kategori = '$id_kategoriproduk'";
$hasil = mysqli_query($db, $query);
$data_produk = mysqli_fetch_assoc($hasil);

?>
<!DOCTYPE html>
<html lang="en">
<?php 
include 'headeradmin.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
<div>
    <table class="table">
      <form method="post" action="kategori_do_edit.php">
      <input type="hidden" name="id_kategori" class="form-control"  value="<?php echo $data_produk['Id_Kategori']; ?>" required>
      <tr>
        <td>Nama Kategori : </td>
        <td><input type="text" name="nama_kategori" class="form-control"  value="<?php echo $data_produk['Nama_Kategori'] ?>" required></td>
      </tr>
   
    </table>

 <input type="submit" class="btn btn-info" value="Simpan">
<input type="reset" class="btn btn-danger" value="Batal" onclick="self.history.back();">
   </form>
<?php include 'footeradmin.php'; ?>
