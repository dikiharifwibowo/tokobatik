<?php 
    session_start(); 

    //jika belum login, alihkan ke login
    if (empty($_SESSION['user'])) {
        header('Location: ../login_admin.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Admin Agrari</title>
	
	<link href="../boot/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="../datatables/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../databables/css/dataTables.bootstrap.css"/>
    <link href="../datepicker/css/jquery.datepick.css" rel="stylesheet">
        <script src="datepicker/js/jquery-latest.min.js"></script>
        <script src="../datepicker/js/jquery.plugin.js"></script>
        <script src="../datepicker/js/jquery.datepick.js"></script>        
        <script>
        $(function() {
          $('#popupDatepicker').datepick({ dateFormat: 'yyyy-mm-dd' }).val();
          $('#inlineDatepicker').datepick({onSelect: showDate});
        });

        function showDate(date) {
          alert('The date chosen is ' + date);
        }
        $(function() {
			    $('#datepicker2').datepick({dateFormat: 'yyyy-mm-dd'}).val();
			});

	
			$(function() {
			    $('#datepicker3').datepick({dateFormat: 'yyyy-mm-dd'}).val();
			});

			$(function() {
			    $('#datepicker4').datepick({dateFormat: 'yyyy-mm'}).val();
			});

			$("#datepicker5").datepick( {
			    format: "mm-yyyy",
			    startView: "months", 
			    minViewMode: "months"
			});
			$(document).ready(function()
			{   
			    $(".monthPicker").datepick({
			        dateFormat: 'MM yy',
			        changeMonth: true,
			        changeYear: true,
			        showButtonPanel: true,

			        onClose: function(dateText, inst) {
			            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			            $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
			        }
			    });

			    $(".monthPicker").focus(function () {
			        $(".ui-datepicker-calendar").hide();
			        $("#ui-datepicker-div").position({
			            my: "center top",
			            at: "center bottom",
			            of: $(this)
			        });
			    });
			});
			$(function() {
		        $('.date-picker').datepick( {
		            changeMonth: true,
		            changeYear: true,
		            showButtonPanel: true,
		            dateFormat: 'MM yy',
		            onClose: function(dateText, inst) { 
		                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
		                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
		                $(this).datepick('setDate', new Date(year, month, 1));
		            },
		            beforeShow : function(input, inst) {
		                var datestr;
		                if ((datestr = $(this).val()).length > 0) {
		                    year = datestr.substring(datestr.length-4, datestr.length);
		                    month = jQuery.inArray(datestr.substring(0, datestr.length-5), $(this).datepick('option', 'monthNamesShort'));
		                    $(this).datepick('option', 'defaultDate', new Date(year, month, 1));
		                    $(this).datepick('setDate', new Date(year, month, 1));
		                }
		            }
		        });
		    });
		    
        </script>

			
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand">AGRARI</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
				
				<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['user']['Username'];  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="../admin/home_admin.php"><span class="glyphicon glyphicon-home"></span>  Beranda</a></li>			
			<li><a href="kategori.php"><span class="glyphicon glyphicon-th-list"></span>  Kategori </a></li>
			<li><a href="berita.php"><span class="glyphicon glyphicon-th-list"></span>  Berita</a></li>     				
			<li><a href="produk.php"><span class="glyphicon glyphicon-tags"></span> Produk</a></li>
			<li><a href="pelanggan.php"><span class="glyphicon glyphicon-user"></span> Pelanggan</a></li>
			<li><a href="orderan.php"><span class="glyphicon glyphicon-shopping-cart"></span>  Orderan</a></li>
			<li><a href="../logout_admin.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>	
					
		</ul>
	</div>
	<div class="col-md-10">
