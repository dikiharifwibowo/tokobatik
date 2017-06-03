<?php require_once("koneksidb.php");
    $id_berita = $_GET['id_berita'];
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
      
     
        <br> <h2></h2>
        <div id="contentwrap">
          <h2 align="center">BERITA TOKO BATIK</h2>
            <div id="content">
                <?php
                   $sql = mysqli_query($db, "SELECT * FROM berita WHERE id_berita = $id_berita ");
                   while($data = mysqli_fetch_array($sql)){
                ?>
                <div class="borprod" style="width: 976px; height: auto;" >
                    <div class="produk" >
                        <img src="img/<?php echo  $data['foto']; ?>" style="width: 600px; height: 400px; margin: 0px;" >
                        <h2 style=" color: green; margin: 0px;"><?php echo strip_tags($data['judul']) ?></h2>
                        <p align="left" style="margin: 5px;"><?php echo strip_tags($data['isi']) ?></p>
                        <br><br><br>

                    </div>
                </div>
                <?php   
                    }
                ?>
                <div id="disqus_thread"></div>
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

<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://singgah-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</body>
</html>
