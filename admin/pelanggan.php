<?php 
include 'headeradmin.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span> Data Pelanggan </h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
    <div class="box">
            <table id="provinsi" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="10%">Id Pelanggan</th>
                        <th width="15%">Username</th>
                        <th width="15%">E-mail</th>
                        <th width="15%">Password</th>
                        <th width="15%">Telepon</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('batik');
                    $sql = mysql_query('SELECT * FROM pelanggan
                    ORDER BY Id_Pelanggan DESC');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['Id_Pelanggan'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['Id_Pelanggan']; ?></td>
                        <td><?php echo  $r['Username']; ?></td>
                        <td><?php echo  $r['Email']; ?></td>
                        <td><?php echo  $r['Password']; ?></td>
                        <td><?php echo  $r['Telepon']; ?></td>
                        <td>
                        <a href="pelanggan_delete.php?id_pel=<?php echo $r['Id_Pelanggan']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
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