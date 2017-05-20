<?php require_once("koneksidb.php");
    if (!isset($_SESSION)) {
        session_start();
    } 
    if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
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
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
             
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="img/slide1.jpeg" alt="...">
                  <div class="carousel-caption">
                    <h3>Caption Text</h3>
                  </div>
                </div>
                <div class="item">
                  <img src="img/slide.jpg" alt="...">
                  <div class="carousel-caption">
                    <h3>Caption Text</h3>
                  </div>
                </div>
                <div class="item">
                  <img src="http://placehold.it/1200x315" alt="...">
                  <div class="carousel-caption">
                    <h3>Caption Text</h3>
                  </div>
                </div>
              </div>
             
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div> <!-- Carousel -->
        </div>
        </div>
 
        <div id="contentwrap">
            <div id="content">
                <?php
                   $sql = mysqli_query($db, "SELECT * FROM produk ORDER BY Id_Produk DESC limit 6");
                   while($data = mysqli_fetch_array($sql)){
                ?>
                <div class="borprod">
                    <div class="produk">
                        <img src="img/<?php echo $data['Gambar']; ?>">
                        <h2 style="color: green;">Rp. <?php echo $data['Harga_Produk']; ?></h2>
                        <p ><?php echo $data['Nama_Produk']; ?></p>
                        <a href="input.php?input=add&id=<?php echo $data['Id_Produk']; ?>&harga=<?php echo $data['Harga_Produk']; ?>" class="btn btn-success">Add to cart/Order</a>                    
                    </div>
                </div>
                <?php   
                    }
                ?>

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
