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
$id_pel = $_SESSION['user']['Id_Pelanggan']; 
?>
<!DOCTYPE html>
<html>
<head>
<title>Agrari.Com || Market Place Agrobisnis Terbesar di Indonesia </title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/gaya.css" />
<link href="boot/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="datatables/css/bootstrap.min.css"/>
<link rel="stylesheet" href="databables/css/dataTables.bootstrap.css"/>

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
        
    <div id="contentwrap">
            <div id="content" style="border-radius: 10px;border: 1px solid green; text-align:center;">
            <br> <br>

            <table id="provinsi" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="10%">Kode Order</th>
                        <th width="15%">Nama Pelanggan</th>
                        <th width="15%">Nama Produk</th>
                        <th width="15%">Jumlah</th>
                        <th width="15%">Total</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('batik');
                    $sql = mysql_query("SELECT *
                    FROM detail_order A 
                    LEFT JOIN produk B ON A.Id_Produk = B.Id_Produk
                    LEFT JOIN orderan D ON A.Kd_Order = D.Kd_Order
                    LEFT JOIN pelanggan C ON D.Id_Pelanggan = C.Id_Pelanggan
                    WHERE D.Id_Pelanggan = '$id_pel'
                    ORDER BY A.Kd_Order DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['Kd_Order'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['Kd_Order']; ?></td>
                        <td><?php echo  $r['Username']; ?></td>
                        <td><?php echo  $r['Nama_Produk']; ?></td>
                        <td><?php echo  $r['Jumlah']; ?></td>
                        <td>Rp. <?php echo  $r['Total_Harga']; ?></td>
                        <td>
                        <a href="data_order_delete.php?Kd_Order=<?php echo $r['Kd_Order']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
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
            <img src="img/amikom2.jpeg" style="width:180px;height:110px">
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
   <script src="datatables/js/jquery-1.11.0.js"></script>
    <script src="datatables/js/bootstrap.min.js"></script>
    <script src="datatables/datatables/jquery.dataTables.js"></script>
    <script src="datatables/datatables/dataTables.bootstrap.js"></script>
   <script src="datatables/datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
            $(function() {
                $("#provinsi").dataTable();
            });
        </script>
</body>
</html>
