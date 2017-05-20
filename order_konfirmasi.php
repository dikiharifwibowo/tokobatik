<?php

session_start();

// jika sudah login, alihkan ke halaman list
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<?php 
include 'koneksidb.php';
$value = $_SESSION['user']['Id_Pelanggan']; 
$id_pelanggan = $value;
$query = "SELECT * FROM pelanggan WHERE Id_Pelanggan = '$id_pelanggan'";
$hasil = mysqli_query($db, $query);
$pelanggan_data = mysqli_fetch_assoc($hasil);

?>
<?php 
$value = $_SESSION['user']['Id_Pelanggan']; 
$query = "SELECT * FROM pelanggan WHERE Id_Pelanggan = '$value'";
$hasil = mysqli_query($db, $query);
$data_pribadi = mysqli_fetch_assoc($hasil);
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
  $carikode = mysqli_query($koneksi, "select max(Kd_Order) from orderan") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "F".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "F0001";
  }

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
  $carikode = mysqli_query($koneksi, "select max(Id_Detail) from detail_order") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_detail = "B".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_detail = "B0001";
  }

?>
<!DOCTYPE html>
<html>
<head>
<title>Agrari.Com || Market Place Agrobisnis Terbesar di Indonesia </title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/gaya.css" />
<link href="boot/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
    <div id="wrapper">
        <div id="headerwrap"> 
        <div id="header">
            <div class="menus"> 
            <ul>
                <li> <a href="logout.php">Logout</a> </li>
                <li> <a href="#">Bantuan</a> </li>
                <li> <a href="indexdua.php">Home</a> </li>
                <li> <a href="order_barang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a> </li>
            </ul>
            <img src="img/logo4.png"> 
            <div class="search">
                <input type="text" name="search" placeholder="Cari Produk atau Toko" class="form-control">
                <select class="seacrh form-control" >
                    <option>Batik A</option>
                    <option>Batik B</option>
                    <option>Batik C</option>
                    <option>BATIK D</option>
              </select>
              <input type="submit" name="search" class="search btn btn-success" value="Search">         
            </div>
            </div>
        </div>
        </div>
        
        <div id="contentwrap">
            <div id="content" style="border-radius: 10px;border: 1px solid green; text-align:center;">
                <form method="post" action="input.php?input=inputform">
                <input type="hidden" class="form-control" name="id_pelanggan" value="<?php echo $value ?>" required>
                <input type="hidden" class="form-control" name="id_order" value="<?php echo $kode_otomatis ?>" required>
                <table align="center">
                <caption><h2 align="center">Konfirmasi Order</h2></caption>
                    <tr style="border-bottom: 1px solid #bfbfbf;">
                        <td width="50"> <b> Alamat </b> </td>
                        <td>:</td>
                        <td><input type="text" name="alamat" class="form-control" value="<?php echo $data_pribadi['Alamat'] ?>"> </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #bfbfbf;">
                        <td width="50"> <b> Email </b> </td>
                        <td>:</td>
                        <td><input type="text" name="alamat" class="form-control" value="<?php echo $data_pribadi['Email'] ?>"> </td>
                    </tr> 
                    <tr style="border-bottom: 1px solid #bfbfbf;" >
                        <td width="50"> <b> Telephon </b> </td>
                        <td>:</td>
                        <td><input type="text" name="alamat" class="form-control" value="<?php echo $data_pribadi['Telepon'] ?>" > </td>
                    </tr>             
                </table>
                            <br>            <br>
                <input type="submit" class="btn btn-info" value="Konfirmasi Order">
                <a href="order_barang.php" class="btn btn-danger"> Batal </a> </td>
                </form>
                <br>
                <br>

                 <table class="table table-bordered">
                 <caption><i> berikut barang yang anda order! </i></caption>
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="10%">Foto Produk</th>
                        <th width="15%">Nama Produk</th>
                        <th width="15%">Stock Barang</th>
                        <th width="5%">Jumlah</th>
                        <th width="10%">Harga</th>
                        <th width="10%">Total</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('dbmonera');
                             mysql_connect('localhost', 'root', '');
                    mysql_select_db('batik');
                    $sid = session_id();
                    $no = 1;
                    $sql = mysql_query("SELECT * FROM keranjang, produk WHERE Id_Session='$sid' AND keranjang.Id_Produk=produk.Id_Produk");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['Id_Keranjang'];
                    ?>
            
                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><img width="50px" height="50px" src="img/<?php echo  $r['Gambar']; ?>"></td>
                        <td><?php echo  $r['Nama_Produk']; ?></td>
                        <td><?php echo  $r['Stock']; ?></td>
                        
                        <td><?php echo  $r['Qty']; ?></td>
                        <?php $sum=$r['Qty']*$r['Harga_Produk']?>
                        <td>Rp. <?php echo  $r['Harga_Produk']; ?></td>
                        <td>Rp. <?php echo  $sum ?></td>
                        
                        <td>
                        <a href="input.php?input=delete&id=<?php echo $r['Id_Keranjang']?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table> 
            </div>
        </div>

        <div class="wadahsupport">
        <div class="support">
            <p align="center"> Support By: </p>
            <img src="img/amikom1.png" style="width:372px;height:60px">
            <img src="img/amikom2.png" style="width:180px;height:110px">
            <img src="img/gkm.png" style="width:180px;height:110px">
            
        </div>
        <div class="contact">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        </div>
        <div id="footerwrap">
        <div id="footer">
            <p style="padding: 5px; margin: 3px; color: green; font: bold;" align="center"> Copyright &copy 2015 - Dikih Arif Wibowo </p>
        </div>
        </div>


    </div>
    <script src="jquery-min.js"></script>
   <script src="boot/js/bootstrap.min.js"></script>
</body>
</html>
