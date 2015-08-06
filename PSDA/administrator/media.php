<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator SUP Rancaekek</title>
  <script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
  <script src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js" type="text/javascript"></script>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
   <link href="../bootstrap/css/datepicker.css" rel="stylesheet" type="text/css" />
  <link href="../bootstrap/css/docs.css" rel="stylesheet" type="text/css" />
  <link href="../bootstrap/css/prettify.css" rel="stylesheet" type="text/css" />
  <link href="../bootstrap/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../bootstrap/js/jquery.js" ></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" ></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap-tooltip.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap-timepicker.min.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap-dropdown.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../bootstrap/js/prettify.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.file-input.js"></script>
  
  
 
 
  <style type="text/css">
.form-signin {   
        padding: 10px 10px 10px;
        margin: auto;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
<script type="text/javascript">
  $(function() {
window.prettyPrint && prettyPrint();

			$('#mulai').datepicker({
				format: 'yyyy-mm-dd',
                todayBtn: 'linked'
			});
			$('#akhir').datepicker({
				format: 'yyyy-mm-dd',
                todayBtn: 'linked'
			});
			$('#waktumulai').timepicker({
			    minuteStep: 1,
                showMeridian: false
			});
			$('#waktuakhir').timepicker({
			    minuteStep: 1,
                showMeridian: false
			});
       
  });

 

  </script>
  </head>
<body >
<?php include "menu.php"; ?>
<div class='container'>
		<?php include "content.php"; ?>
</div>	
<?php include "buttom.php";?>
</body>
</html>
<?php
}
}
?>
