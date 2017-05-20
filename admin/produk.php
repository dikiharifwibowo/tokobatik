<?php 
include 'headeradmin.php';
include 'kategori_list.php';
?>
<?PHP 
$Host = "localhost";
$username = "root";
$password = "";
$database = "batik";
$koneksi = new mysqli( $Host, $username, $password, $database );
if ($koneksi->connect_error){
echo 'Gagal koneksi ke database';
} else {
//koneksi berhsil
}
// membuat query max
  $carikode = mysqli_query($koneksi, "select max(Id_Produk) from produk") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "P0001";
  }
?>


<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Produk </h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
  <form method="post" action="produk_do_simpan.php" enctype="multipart/form-data">
  <div>
    <table class="table">
      <tr>
      <td>Kode Otomatis : </td>
      <td>
      <input type="text" class="form-control" name="id_produk" required value="<?php echo $kode_otomatis ?>"> </td>
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
        <td><input type="text" class="form-control" name="nama_produk" required></td>
      </tr>
      <tr>
        <td>Harga Produk :</td>
        <td><input type="number" class="form-control" name="harga_produk" required></td>
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
        <td><input type="number" class="form-control" name="stock" required></td>
      </tr>
      <tr>
        <td>Gambar :</td>
        <td><input type="file" class="form-control" name="gambar" required></td>
      </tr>      
        <td></td>
        <td><input type="submit" class="btn btn-info" name="Simpan" value="Simpan">
          <a href="produk.php?halaman=" class="btn btn-danger"> Reset </a> </td>
      </tr>
    </table>
  </div>
  </form>
 </form>
    <div class="box">
            <table id="provinsi" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="10%">ID Produk</th>
                        <th width="15%">Nama Kategori</th>
                        <th width="15%">Nama Produk</th>
                        <th width="15%">Harga Produk</th>
                        <th width="10%">Stock</th>
                        <th width="10%">Size</th>
                        <th width="10%">Gambar</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('batik');
                    $sql = mysql_query('SELECT produk.*, Kategori.Nama_Kategori
                    FROM produk
                    JOIN kategori
                    ON produk.Id_Kategori = kategori.Id_Kategori
                    ORDER BY Id_Kategori DESC');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['Id_Kategori'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['Id_Produk']; ?></td>
                        <td><?php echo  $r['Nama_Kategori']; ?></td>
                        <td><?php echo  $r['Nama_Produk']; ?></td>
                        <td>Rp. <?php echo  $r['Harga_Produk']; ?></td>
                        <td><?php echo  $r['Stock']; ?></td>
                        <td><?php echo  $r['Size']; ?></td>
                        <td><img class="buku-cover" width="50px" height="50px" src="../img/<?php echo  $r['Gambar']; ?>"></td>
                        <td>
                        <a href="produk_edit.php?id_produk=<?php echo $r['Id_Produk']; ?>" class="btn btn-edit">Edit</a>
                        <a href="produk_delete.php?id_produk=<?php echo $r['Id_Produk']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>  
        </div>
<?php include 'footeradmin.php'; ?>