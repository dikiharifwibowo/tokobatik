<?php 
include 'headeradmin.php';
?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
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
  $carikode = mysqli_query($koneksi, "select max(id_berita) from berita") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "B".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "B0001";
  }

?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  berita Produk </h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
  <form method="post" action="berita_do_simpan.php" enctype="multipart/form-data">
  <div>
    <table class="table">
      <input type="hidden" class="form-control" name="id_berita" required value="<?php echo $kode_otomatis ?>">
      <tr>
        <td>Judul:</td>
        <td><input type="text" class="form-control" name="judul" required></td>
      </tr> 
      <tr>
        <td>Foto:</td>
        <td><input type="file" class="form-control" name="gambar" required></td>
      </tr>
      <tr>
        <td>Isi:</td>
        <td><textarea class="ckeditor" id="ckedtor" name="isi" required=""></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" class="btn btn-info" value="Simpan">
          <a href="berita.php" class="btn btn-danger"> Batal </a> </td>
      </tr>
    </table>
  </div>
  </form>

  <div class="box">
            <table id="provinsi" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="5%">Foto</th>
                        <th width="5%">Judul</th>
                        <th width="10%">Isi</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('batik');
                    $sql = mysql_query('SELECT * FROM berita ORDER BY id_berita DESC');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_berita'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><img class="buku-cover" width="50px" height="50px" src="../img/<?php echo  $r['foto']; ?>"></td>
                        <td><?php echo  $r['judul']; ?></td>
                        <td><?php echo  $r['isi']; ?></td>
                         <td>
                        <a href="berita_edit.php?id_berita=<?php echo $r['id_berita']; ?>" class="btn btn-edit">Edit</a>
                        <a href="berita_do_delete.php?id_berita=<?php echo $r['id_berita']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
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