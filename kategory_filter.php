<?php require_once("koneksidb.php");
    if (!isset($_SESSION)) {
        session_start();
    } 
    if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<?php
include 'koneksidb.php';

$id_kat = $_GET['Id_Kategori'];
$query = "SELECT * FROM produk WHERE Id_Kategori = '$id_kat'";
$hasil = mysqli_query($db, $query);
$kate = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $kate[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Agrari.Com || Market Place Agrobisnis Terbesar di Indonesia </title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/gaya.css" />
<link href="boot/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="shortcut icon" href="img/logo1.ico">
</head>
<body>
    <div id="wrapper">
        <div id="headerwrap"> 
        <div id="header">
            <div class="menus"> 
            <ul>
                <li> <a href="logout.php">Logout</a> </li>
                <li> <a href="profil.php">Profil</a> </li>
                <li> <a href="data_order.php">Data Order</a> </li>
                <li> <a href="order_barang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a> </li>

            </ul>
            <img src="img/logo4.png"> 
            <div class="search">
                <input type="text" name="search" placeholder="Cari Produk atau Toko" class="form-control">
                <select class="seacrh form-control" >
                ``  <?php 
                            $kategori=mysqli_query($db, "SELECT Nama_Kategori, kategori.Id_Kategori, 
                                      COUNT(produk.Id_Kategori) as jml 
                                      FROM kategori LEFT JOIN produk 
                                      ON produk.Id_Kategori=kategori.Id_Kategori 
                                      GROUP BY Nama_Kategori");
               
                            while($data = mysqli_fetch_array($kategori)){
                        
                    ?>
                    <option><?php echo $data['Nama_Kategori']; ?></option>
               
                     <?php   
                            }
                            ?>
              </select>
              <input type="submit" name="search" class="search btn btn-success" value="Search">         
            </div>
            </div>
        </div>
        </div>
        <div id="wraplink" >
            <div id="menulink">
                <div class="link">
                  <ul>
                   <?php 
                            $kategori=mysqli_query($db, "SELECT Nama_Kategori, kategori.Id_Kategori, 
                                      COUNT(produk.Id_Kategori) as jml 
                                      FROM kategori LEFT JOIN produk 
                                      ON produk.Id_Kategori=kategori.Id_Kategori 
                                      GROUP BY Nama_Kategori");
               
                            while($data = mysqli_fetch_array($kategori)){
                        
                            ?>
                    <li> <a href="kategory_filter.php?Id_Kategori=<?php echo $data['Id_Kategori']?>">
                      <?php echo $data['Nama_Kategori']; ?><?php echo " ($data[jml])"; ?> </a> </li>
                    <?php   
                            }
                            ?>
                  </ul>
                </div>
            </div>
        </div>
        <div id="navigationwrap">
        <div id="navigation">
            
        </div>
        </div>
 
        <div id="contentwrap">
            <h2 align="center">Produk Berdasarkan Kategori </h2>
            <div id="content">
                <?php foreach ($kate as $data) : ?>
                <div class="borprod">
                    <div class="produk">
                        <img src="img/<?php echo $data['Gambar']; ?>">
                        <h2 style="color: green;">Rp. <?php echo $data['Harga_Produk']; ?></h2>
                        <p ><?php echo $data['Nama_Produk']; ?></p>
                        <a href="input.php?input=add&id=<?php echo $data['Id_Produk']; ?>&harga=<?php echo $data['Harga_Produk']; ?>" class="btn btn-success">Add to cart/Order</a>                    
                    </div>
                </div>
                <?php  endforeach ?>
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
    <script src="datatables/js/jquery-1.11.0.js"></script>
    <script src="datatables/js/bootstrap.min.js"></script>
    <script src="datatables/datatables/jquery.dataTables.js"></script>
   <script src="boot/js/bootstrap.min.js"></script>
</body>
</html>
