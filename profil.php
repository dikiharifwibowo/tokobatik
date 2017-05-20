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
$query = "SELECT * FROM pelanggan WHERE Id_Pelanggan = '$value'";
$hasil = mysqli_query($db, $query);
$data_pribadi = mysqli_fetch_assoc($hasil);
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
                <li> <a href="profil">Profil</a> </li>
                <li> <a href="data_order.php">Data Order</a> </li>
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
        
    <div id="contentwrap" style="height: 600px;">
            <div id="content" style="border-radius: 10px;border: 1px solid green; text-align:center;">
            <form method="post" action="data_pribadi_do_edit.php" enctype="multipart/form-data">
            <table class="table">
      
                <input type="hidden" class="form-control" name="id_pelanggan" value="<?php echo $data_pribadi['Id_Pelanggan'] ?>" required ">
            
              <tr>
                <td>Nama Pelanggan</td>
                <td> <input type="text" class="form-control" name="username" value="<?php echo $data_pribadi['Username'] ?>"  required> </td>
              </tr>
              <tr>
                <td>Password :</td>
                <td><input type="password" class="form-control" name="password" value="<?php echo $data_pribadi['Password'] ?>"  required></td>
              </tr>
              <tr>
                <td>Alamat :</td>
                <td><input type="text" class="form-control" name="alamat" value="<?php echo $data_pribadi['Alamat'] ?>"  required></td>
              </tr>
              <tr>
                <td>Email :</td>
                <td><input type="email" class="form-control" name="email" value="<?php echo $data_pribadi['Email'] ?>"  required></td>
              </tr>
              <tr>
                <td>Telepon :</td>
                <td><input type="number" class="form-control" name="telephon" value="<?php echo $data_pribadi['Telepon'] ?>" required></td>
              </tr>      
                <td></td>
                <td><input type="submit" class="btn btn-info" name="Simpan" value="Simpan">
                  <a href="profil.php" class="btn btn-danger"> Reset </a> </td>
              </tr>
            </table>
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
