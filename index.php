<?php require_once("koneksidb.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
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
                      <?php echo $data['Nama_Kategori']; ?><?php echo " ($data[jml])"; ?> </li>
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
                  <img src="img/amikom1.png" alt="...">
                  <div class="carousel-caption">
                    <h3>Caption Text</h3>
                  </div>
                </div>
                <div class="item">
                  <img src="img/amikom2.png" alt="...">
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
                        <h2 style="color: green;"><?php echo $data['Harga_Produk']; ?></h2>
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
            <table>
              <tr>
                <td>Tentang Kami </td>
                <td>Karir :</td>
              </tr>
              <tr>
                
              </tr>
            </table>
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
