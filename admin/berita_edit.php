<?php 
include 'headeradmin.php';
?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<?php
include '../koneksidb.php';

// ambil artikel yang mau di edit
$id_berita = $_GET['id_berita'];
$query = "SELECT * FROM berita WHERE id_berita = '$id_berita'";
$hasil = mysqli_query($db, $query);
$data_berita = mysqli_fetch_assoc($hasil);

?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  berita berita </h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
  <form method="post" action="berita_do_edit.php" enctype="multipart/form-data">
  <div>
    <table class="table">
      <input type="hidden" class="form-control" name="id_berita" required value="<?php echo $data_berita['id_berita'] ?>">
      <tr>
        <td>Judul:</td>
        <td><input type="text" class="form-control" name="judul" required value="<?php echo $data_berita['judul'] ?>"></td>
      </tr> 
      <tr>
        <td>Foto:</td>
        <td><input type="file" class="form-control" name="gambar" required></td>
      </tr>
      <tr>
        <td>Isi:</td>
        <td><textarea class="ckeditor" id="ckedtor" name="isi" required=""><?php echo $data_berita['isi'] ?></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" class="btn btn-info" value="Simpan">
          <a href="berita.php" class="btn btn-danger"> Batal </a> </td>
      </tr>
    </table>
  </div>
  </form>

  
<?php include 'footeradmin.php'; ?>