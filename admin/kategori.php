<?php 
include 'headeradmin.php';
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
  $carikode = mysqli_query($koneksi, "select max(Id_Kategori) from kategori") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "K".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "K0001";
  }

?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Kategori Produk </h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
  <form method="post" action="kategori_do_simpan.php">
  <div>
    <table class="table">
      <input type="hidden" class="form-control" name="id_kategori" required value="<?php echo $kode_otomatis ?>">
      <tr>
        <td>Nama Kategori Produk :</td>
        <td><input type="text" class="form-control" name="nama_kategori" required></td>
      </tr> 
      <tr>
        <td></td>
        <td><input type="submit" class="btn btn-info" value="Simpan">
          <a href="kategori.php" class="btn btn-danger"> Batal </a> </td>
      </tr>
    </table>
  </div>
  </form>

  <div class="box">
            <table id="provinsi" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="5%">Kode Kategori Produk</th>
                        <th width="10%">Nama Kategori Produk</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('batik');
                    $sql = mysql_query('SELECT * FROM kategori ORDER BY Id_Kategori DESC');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['Id_Kategori'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['Id_Kategori']; ?></td>
                        <td><?php echo  $r['Nama_Kategori']; ?></td>
                         <td>
                        <a href="kategori_edit.php?id_kategori=<?php echo $r['Id_Kategori']; ?>" class="btn btn-edit">Edit</a>
                        <a href="kategori_do_delete.php?id_kategori=<?php echo $r['Id_Kategori']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
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