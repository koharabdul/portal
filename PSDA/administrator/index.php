<html>
<head>
<title>Administrator SUP Rancaekek</title>

  <script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
  <script src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js" type="text/javascript"></script>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
  <link href="../bootstrap/css/docs.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../bootstrap/js/jquery.js" ></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" ></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap-tooltip.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap-dropdown.js"></script>
  <style type="text/css">
.form-signin {
        max-width: 320px;
        padding: 20px;
        margin: 0 auto 20px;
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
</head>
<body >
<form class="form-signin" method="post" action="cek_login.php" method="POST">
<div class="navbar navbar-inverse">
<div class="navbar-inner">
<div class="container">
<div class="nav-collapse collapse">
<ul class="nav">
<li><div style="color:white; padding-top:9px; text-align:left;"><i class="icon-user icon-white"></i> Login Administrator</div></li>
</ul>
</div>
</div>
</div>
</div>
<?php
	if (!empty($_GET['msg'])){
		if($_GET['msg']==1){
			echo '<div class="alert alert-error"><h6>Username dan passowrd tidak boleh kosong</h6></div>';
		}elseif ($_GET['msg']==2){
			echo '<div class="alert alert-error"><h6>Pastikan username dan password benar</h6></div>';
		}
	}
?>
<table width="100%">
<tr><td valign=middle><input type="text" name="username" style="width:100%;" class="input-teks" placeholder="Username..."/></td></tr>
<tr><td valign=middle><input type="password" name="password" style="width:100%;" class="input-teks" placeholder="Password..."/></td></tr>
<tr width="100%"><td> <button type="submit"  class="btn btn-block btn-large btn-primary" />Log In</button></td></tr>
<tr><td>
<h6>&copy; <?php $waktu= date("Y"); echo"$waktu "?> by SUP Rancaekek</h6>
</td></tr>
</table>
</form>
</body>
</html>
