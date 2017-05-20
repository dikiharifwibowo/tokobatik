<?php 
include 'headeradmin.php';
include 'kategori_list.php';
?>
<?php
include '../koneksidb.php';
//load list admin

$id_produk = $_GET['id_produk'];
$query = "SELECT * FROM produk WHERE Id_Produk = '$id_produk'";
$hasil = mysqli_query($db, $query);
$produk_data = mysqli_fetch_assoc($hasil);
?>
<?php
include '../koneksidb.php'; //maksimal titiknya 2

$query = "SELECT * FROM kategori";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_produk = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_produk[] = $row;
}
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Kategori Produk </h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
  <form method="post" action="produk_do_edit.php" enctype="multipart/form-data">
  <div>
       <table class="table">
      <input type="hidden" class="form-control" name="id_produk" required value="<?php echo $produk_data['Id_Produk'] ?>">
        
      <tr>
        <td>Nama Kategori Produk</td>
        <td><select name="nama_kategori" class="form-control" required>
                        <?php foreach ($data_produk as $produk): ?>
                                <option  required value="<?php echo $produk['Id_Kategori'] ?>"><?php echo $produk['Nama_Kategori'] ?></option>
                        <?php endforeach ?>
            </select>
        </td>
      </tr>
      <tr>
        <td>Nama Produk :</td>
        <td><input type="text" class="form-control" name="nama_produk" required value="<?php echo $produk_data['Nama_Produk'] ?>"></td>
      </tr>
         <tr>
        <td>Gambar :</td>
        <td><input type="file" class="form-control" name="gambar" required></td>
      </tr>
      <tr>
        <td>Harga Produk :</td>
        <td><input type="number" class="form-control" name="harga_produk" required value="<?php echo $produk_data['Harga_Produk'] ?>"></td>
      </tr>
      <tr>
        <td>Size :</td>
        <td><select name="size" class="form-control" required>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>    
            </select>
        </td>
      </tr>
      <tr>
        <td>Stock :</td>
        <td><input type="number" class="form-control" name="stock" required value="<?php echo $produk_data['Stock'] ?>"></td>
      </tr>
        <td></td>
        <td><input type="submit" class="btn btn-info" name="Simpan" value="Simpan">
          <a href="produk.php?halaman=" class="btn btn-danger"> Reset </a> </td>
      </tr>
    </table>
  </div>
  </form>
<?php include 'footeradmin.php'; ?>
