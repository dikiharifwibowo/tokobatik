<?php 
include 'headeradmin.php';
$id_pel = $_GET['Kd_Order']; 
 mysql_connect('localhost', 'root', '');
    mysql_select_db('batik');
    $column_count = mysql_num_rows(mysql_query("SELECT * FROM detail_order WHERE Kd_Order='$id_pel' "));
    //$sql2 = mysql_query("SELECT SUM(Quantity) as total FROM detail_order WHERE Kd_Order='$id_pel' ");
 
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Details Order</h3>
<input TYPE="button" class="btn btn-success" href="" onclick="history.go(-1);" value="Kembali">
<br>
<br>  
<div class="alert alert-info">
  <strong><span class="glyphicon glyphicon-info-sign">Info!</strong> Di bawah ini adalah Info Details Orderan. 
   <br> 
   <p> Jumlah Item Barang adalah  <b> <?php echo $column_count; ?> </b> </p>
</div>
     <div class="box">
            <table id="provinsi" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="10%">Kode Order</th>
                        <th width="15%">Nama Pelanggan</th>
                        <th width="15%">Nama Produk</th>
                        <th width="15%">Harga Produk</th>
                        
                        <th width="15%">Jumlah</th>
                        <th width="15%">Total</th>  
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
                    WHERE A.Kd_Order = '$id_pel'
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
                        <td><?php echo  $r['Harga_Produk']; ?></td>
                        <td><?php echo  $r['Quantity']; ?></td>
                           <?php $sum=$r['Quantity']*$r['Harga_Produk']?>
                        <td>Rp. <?php echo  $sum; ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>  
        </div>
<?php include 'footeradmin.php'; ?>