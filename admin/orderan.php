<?php 
include 'headeradmin.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Orderan</h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
<br>
<br>
    <div class="box">
            <table id="provinsi" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="5%">Kode Order</th>
                        <th width="5%">Nama Pelanggan</th>
                        <th width="5%">Jumlah Item Barang</th>
                        <th width="5%">Total Nilai Orderan</th>        
                        <th width="5%">Tanggal</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('batik');
                    $sql = mysql_query("SELECT *
                    FROM orderan A 
                    LEFT JOIN pelanggan F ON A.Id_Pelanggan = F.Id_Pelanggan
                    ORDER BY A.Kd_Order DESC ");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['Kd_Order'];
                    ?>

                     <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['Kd_Order']; ?></td>
                        <td><?php echo  $r['Username']; ?></td>
                        <td><?php echo  $r['Jumlah']; ?></td>
                        <td>Rp. <?php echo  $r['Total_Harga']; ?></td>
                        <td><?php echo  $r['Tanggal']; ?></td>                      
                         <td>
                        <a href="details_produk.php?Kd_Order=<?php echo $r['Kd_Order']; ?>" class="btn btn-hapus" >Details</a>
                         <a href="orderan_delete.php?Kd_Order=<?php echo  $r['Kd_Order']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>  
        </div>
<?php include 'footeradmin.php'; ?>