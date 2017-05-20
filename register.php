<?php

session_start();

// jika sudah login, alihkan ke halaman list
if (isset($_SESSION['user'])) {
    header('Location: indexdua.php');
    exit();
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
  $carikode = mysqli_query($koneksi, "select max(Id_Pelanggan) from pelanggan") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "Y".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "Y0001";
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
                <li> <a href="login.php">Masuk</a> </li>
                <li> <a href="register.php">Daftar</a> </li>
                <li> <a href="#">Bantuan</a> </li>
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
        
         <div id="contentwraplogin">
            <div id="contentlogin">
                <p align="center">REGISTER</p>
                <form method="post" action="proses_register.php" class="form-signin">
                <input type="hidden" name="id_pelanggan" value="<?php echo $kode_otomatis; ?>" required />
                <input type="text" name="username" class="form-control" placeholder="Username" required=""> <br>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""> <br>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required=""> <br>
                <input type="email" name="email" class="form-control" placeholder="Email" required=""> <br>
                <input type="number" name="telepon" class="form-control" placeholder="Telepon" required=""> <br>               
                <input type="submit" name="submit" value="Register" class="btn btn-success">
                </form>
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
