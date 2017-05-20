<?php

session_start();

// jika sudah login, alihkan ke halaman list
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
            <table align="center">
            <caption><h2 align="center">Shoping Cart</h2></caption>
                <tr>
                    <th width="50">No. </th>
                    <th width="100">Foto Produk </th>
                    <th width="150">Nama Produk </th>
                    <th width="80">Ukuran </th>
                    <th width="80">Stock</th>
                    <th width="50" style="padding: 4px;">Jumlah </th>
                    <th width="100">Harga Produk </th>
                    <th style="padding: 4px;">Action </th>
                </tr>
                    <?php
                //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('batik');
              $sid = session_id();
              $no = 1;
              $sql = mysql_query("SELECT * FROM keranjang, produk WHERE Id_Session='$sid' AND keranjang.Id_Produk=produk.Id_Produk ORDER BY keranjang.Id_Keranjang");
              $hitung = mysql_num_rows($sql);
              if ($hitung < 1){
                echo"<script>window.alert('Cart is Empty....');
                    window.location=('index.php')</script>";
                }
              else {
                while($tian=mysql_fetch_array($sql)){
                  echo"<tr><td>$no</td>
                    <td><img width=50 src=img/$tian[Gambar]></td>
                    <td>$tian[Nama_Produk]</td>
                    <td>$tian[Size]</td>
                    <td>$tian[Stock]</td>
                    <form method='post' action='do_update_keranjang.php'>
                    <td><input type='hidden' name='id_ker[]' value='$tian[Id_Keranjang]' required>
                    <input type='text' name='jumlah[]' value='$tian[Qty]' required>
                    
                    </td>
                    
                    <td>Rp. $tian[Harga_Produk]</td>
                    <td><a href=input.php?input=delete&id=$tian[Id_Keranjang]>Hapus</a></td></tr>";
              $no++;
                }
              }
            ?>               
            </table>
                        <br>            <br>
            <input type='submit' align="center" name='simpan' value='Update' class="btn btn-edit">
            <a href="order_konfirmasi.php" class="btn btn-success">Selesai</a>
            <a href="indexdua.php"  class="btn btn-info" >Belanja Lagi..</a>
            </form>
            <br>
            <br>
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
