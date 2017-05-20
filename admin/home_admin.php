<?php 
include 'headeradmin.php';
?>

<div class="col-md-10">
	<h3>Selamat datang <?php echo $_SESSION['user']['Username']; ?>  </h3>	
    <h3>di Administrasi Agrari.com </h3>
    <h5> By: Dikih Arif Wibowo</h5>
     <div class="row">
                <div class="col-lg-12">
                  <center><h5 class="form-signin">Copyright &copy; <a href="#" data-toggle="modal" data-target="#contact">Dikih Arif Wibowo</a></h5></center> 
                </div>
            </div>
</div>
<!-- kalender -->


<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
      </div>
      <div class="modal-body">
      Aplikasi ini masih dalam pengembangan, 
      dan masih dikembangkan oleh Dikih Arif Wibowo yang dapat di hubungi di 
      <table>
      <tr>
      <td>No Telepon</td> <td>:</td> <td>082328722687</td>
      </tr>
      <br />
      <tr>
      <td>E-mail</td><td>:</td> <td><a href="mailto:accho_blues@yahoo.co.id">dikih.wibowo@students.amikom.ac.id</a> | <a href="mailto:hakko_bio_richard@yahoo.co.id">dikiharifwibowo@gmail.com</a></td>
      </tr> 
      <br />
      <tr>
      <td>Blog</td>       <td>:</td> <td><a href="http://www.acchoblues.blogspot.com" target="_blank">www.sourcetika.com</a></td>
      </tr>
      <br />
      <tr>
      <td>Website</td>    <td>:</td> <td><a href="http://www.niqoweb.com" target="_blank">www.dikiharifwibowo.blogspot.com</a></td>
      </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php 
include 'footeradmin.php';

?>