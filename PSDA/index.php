<?php
include "config/koneksi.php";

$tampil = mysql_query("SELECT * FROM profil");
$r=mysql_fetch_array($tampil);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gypsum Griya Indah</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="themes/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/custom/css/flexslider.css" type="text/css" media="screen">    	
    <link rel="stylesheet" href="assets/custom/css/parallax-slider.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">

    <!-- Custom styles for this template -->
	
    <link href="assets/custom/css/business-plate.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/custom/ico/favicon.ico">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
	<div class="top">
    <div class="container">
        <div class="row-fluid">
            <ul class="phone-mail">
                <li><i class="fa fa-phone"></i><span><?php echo"$r[handphone]"; ?></span></li>
                <li><i class="fa fa-envelope"></i><span><?php echo"$r[email]"; ?></span></li>
            </ul>
            <!-- <ul class="loginbar">
                <li><a href="#" class="login-btn">Help</a></li>
                <li class="devider">&nbsp;</li>
                <li><a href="#" class="login-btn">Login</a></li>
            </ul> -->
        </div>
    </div>
	</div>
	
    <!-- topHeaderSection -->	
    <div class="topHeaderSection">		
    <div class="header">			
		<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><?php echo"<img src='images/$r[logo]' alt='$r[nama_perusahaan]' />"; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
              </ul>
            </li> -->
            <li><a href="#about">About us</a></li>
            <li><a href="#layanan">Service</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
	</div>
	</div>

    <!-- bannerSection -->
    <div class="bannerSection">
		<div class="slider-inner">
			<div id="da-slider" class="da-slider">
				<?php
					$tampilSlider = mysql_query("SELECT * FROM slider");
					while($s=mysql_fetch_array($tampilSlider))
					{
						echo"
						<div class='da-slide'>
						<h2><i>$s[judul]</i></h2>
						<p><i>$s[deskripsi]</i></p>
						<div class='da-img'><img src='images/$s[gambar]' alt='' height='360px'/></div>
						</div>
						";
					}
				?>
							
				
				<!-- <div class="da-slide">
					<h2><i>Find Our Events</i> <br> <i>Entertainment</i></h2>
					<p><i>Awesome business logic</i> <br> <i>3 business success history</i></p>
					<div class="da-img">
							<iframe src="http://player.vimeo.com/video/41029575" width="100%" height="320" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="col-md-offset-4 col-md-6"></iframe>
					</div>
				</div> -->
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>		
				</nav>
			</div><!--/da-slider-->
		</div><!--/slider-->
		<!--=== End Slider ===-->


	</div>
    <!-- highlightSection -->
    <div class="highlightSection">
		<div class="container">
			<div class="row">
			<div class="col-md-8">
			<?php
				echo"
					<h2>$r[nama_perusahaan]</h2>
					<em> $r[motto]</em><br><br>
					$r[deskripsi]
					</p>
					</div>
					<!--<div class='col-md-4 align-right'> 
					<h4>Responsive Design
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis </h4>
					<a class='btn btn btn-brand' href='#'>read more</a>
					</p>-->
				";
			?>
			</div>
			</div>
		</div>
	</div>
    <!-- bodySection -->
		<div class="serviceBlock">
		<div class="container">
				<div class="row">
				<?php
					$tampilFitur = mysql_query("SELECT * FROM fitur");
					while($f=mysql_fetch_array($tampilFitur))
					{
						echo"
						<div class='col-md-4'>
							<div class='clearfix'>								
								<div class='desc'>
								<img src='images/$f[gambar]' width='100px' style='float:left; padding: 0px 5px 0px 0px;'>
								<h4>$f[judul]</h4>
								<p>$f[deskripsi]</p>
								</div>
							</div>
						</div>
						";
					}
				?>	
					<!-- <div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-compress"></i>
							<div class="desc">								
								<h4>Fully Responsive</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-code"></i>
							<div class="desc">
								
								<h4>HTML5 + CSS3</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-thumbs-up"></i>
							<div class="desc">
								
								<h4>Launch Ready</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-desktop"></i>
							<div class="desc">
								
								<h4>Fully Responsive</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-html5"></i> 
							<div class="desc">
								
								<h4>HTML5 + CSS3</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-css3"></i>
							<div class="desc">
								
								<h4>Launch Ready</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-github"></i>
							<div class="desc">
								
								<h4>Fully Responsive</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-android"></i>
							<div class="desc">
								
								<h4>HTML5 + CSS3</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="clearfix">
							<i class="fa fa-tablet"></i>
							<div class="desc">
								
								<h4>Launch Ready</h4>
								<p>Lorem ipsum dolor sit amet, Morem ipsum dolor sit amet consectetur adipisicing elit. </p>
							</div>
						</div>
					</div> -->
				</div>
		</div>
		</div>
	<hr>
	
	<!-- 
    <div class="bodySection" style="display:none">
		<div class="container">		
			<div class="ourServices">
				<div class="row">
					<div class="col-md-3"> 
						<div class="cntr">
							<img src="images/Baja-ringan.jpg" class="img-circle" title="project one">
							<h3><a href="#">Responsive Design</a></h3>
						</div>
						<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
						<br><br><a href="#">more details</a>
						</p>
					</div>
					<div class="col-md-3"> 
						<div class="cntr">
							<img src="images/DSC_9458.jpg" class="img-circle" title="project one">
							<h3><a href="#">CSS & HTML5</a></h3>
						</div>
						<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
						<br><br><a href="#">more details</a>
						</p>
					</div>
					<div class="col-md-3"> 
						<div class="cntr">
							<img src="images/DSC_9505.jpg" class="img-circle" title="project one">
							<h3><a href="#">Clean</a></h3>
						</div>
						<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
						<br><br><a href="#">more details</a>
						</p>
					</div>
					<div class="col-md-3"> 
						<div class="cntr">
							<img src="images/DSC_9588.jpg" class="img-circle" title="project one">
							<h3><a href="#">SEO Frendly</a></h3>
						</div>
						<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident
						<br><br><a href="#">more details</a>
						</p>
					</div>
				</div>			
				</div>
				</div>
				</div> 
			-->

					
					

        <div class="services" id="layanan">
			<div class="container">
				<div class="row">
					<?php
						$tampilDesign = mysql_query("SELECT * FROM design");
						while($d=mysql_fetch_array($tampilDesign))
						{
							echo"
								<div class='col-md-3'>
									<img src='images/$d[gambar]' class='' title='project one'>				
									<h3><a class='hover-effect' href='#'>$d[judul]</a></h3>
									<p>$d[deskripsi]</p>
								</div>
							";
						}
					?>
					<!-- <div class="col-md-3">
								<img src="images/DSC_9458.jpg" class="" title="project one">				
								<h3><a class="hover-effect" href="#">Desain Kamar Tidur</a></h3>
							<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
					 </div>
					<div class="col-md-3">
								<img src="images/DSC_9588.jpg" class="" title="project one">
											
								<h3><a class="hover-effect" href="#">Desain Kamar Tdur</a></h3>
							<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
					 </div>
					<div class="col-md-3">
								<img src="images/DSC_9505.jpg" class="" title="project one">
								
								<h3><a class="hover-effect" href="#">Lampu Kristal</a></h3>
							<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
					 </div>
					<div class="col-md-3">
								<img src="images/DSC_8929.jpg" class="" title="project one">
									
								<h3><a class="hover-effect" href="#">Desain Kamar</a></h3>
							<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
					 </div> -->
				 </div>	
			</div>
		</div>

		
		<div class="testimonails">
		<div class="container">
		<blockquote class="">
                <p><?php echo"$r[kutipan]";?></p>
                <small><?php echo"$r[sumber_kutipan]";?></small>
            </blockquote>		
		</div>
		</div>


		<!-- Mengapa Memilih Kami ? -->
		<div class="serviceBlock">
			<div class="container">
				<h3 class="title">Mengapa Memilih Kami ?</h3>
				<div class="row">
					<?php
						$tampilFitur = mysql_query("SELECT * FROM fitur");
						while($f=mysql_fetch_array($tampilFitur))
						{
							echo"
							<div class='col-md-4'>
								<div class='clearfix'>
									<i class='fa fa-github'></i>
									<div class='desc'>

									<h4>$f[judul]</h4>
									<p>$f[deskripsi]</p>
									</div>
								</div>
							</div>
							";
						}
					?>
				</div>
			</div>
		</div>
		<hr>
		
		<div class="container">
		<div class="row">
			<div class="col-md-4"> 
				<h3 class="title">Mengapa Memilih Kami ?</h3>
				<p>
				On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
				</p>
				<ul>
					<li>Tick mark here Reason one</li>
					<li>Tick mark here  Reason one</li>
					<li>Tick mark here  Reason one</li>
					<li>Reason one</li>
					<li>Reason one</li>
					<li>Reason one</li>
				</ul>
				<p>
				On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
				</p>
				<p>
				On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
				</p>
			</div>
			<div class="col-md-8">
			<div class="projectList">
				<h3 class="title">Proyek Terakhir Kami</h3>
				<?php
					$tampilProject = mysql_query("SELECT * FROM project");
					while($j=mysql_fetch_array($tampilProject))
					{
						echo"
							<div class='media'>
							  <a class='pull-left' href='#'>
								<img src='images/$j[gambar]' class='projectImg' title='$j[judul]'>
							  </a>
							  <div class='media-body'>
								<h4 class='media-heading'><a href='#'>$j[judul]</a></h4>
								<p>
									$j[deskripsi]
								</p>
								<!--<a class='pull-right' href='?modul=project&id=$j[id]'>more details</a>-->
							  </div>
							</div>
						";
					}
				?>
				<!-- <div class="media">
				  <a class="pull-left" href="#">
					<img src="images/Baja-ringan.jpg" class="projectImg" title="project one">
				  </a>
				  <div class="media-body">
					<h4 class="media-heading"><a href="#">Projects One</a></h4>
					<p>
						On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
					</p>
					<a class="pull-right" href="#">more details</a>
				  </div>
				</div>
				
				<div class="media">
				  <a class="pull-left" href="#">
					<img src="images/Baja-ringan.jpg" class="projectImg" title="project one">
				  </a>
				  <div class="media-body">
					<h4 class="media-heading"><a href="#">Projects Two</a></h4>
					<p>
						On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
					</p>
					<a class="pull-right" href="#">more details</a>
				  </div>
				</div>
				<div class="media">
				  <a class="pull-left" href="#">
					<img src="images/Baja-ringan.jpg" class="projectImg" title="project one">
				  </a>
				  <div class="media-body">
					<h4 class="media-heading"><a href="#">Projects One</a></h4>
					<p>
						On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
					</p>
					<a class="pull-right" href="#">more details</a>
				  </div>
				</div> -->		
				
			</div>
			</div>
		</div>
		</div>
	</div>
	</div>
    <!-- clientSection -->
	<div class="container">
		<h3 class="title">Supplier Kami</h3>
		<div class="clientSection">
			<div class="row">					
					<div class="col-md-2">
						<a href="#"><img alt="" src="images/aplus.jpg"></a>
					</div>
					<div class="col-md-2">
						<a href="#"><img alt="" src="images/jaya board.jpg"></a>
					</div>
					<div class="col-md-2">
						<a href="#"><img alt="" src="assets/custom/img/1.png"></a>
					</div>
					<div class="col-md-2">
						<a href="#"><img alt="" src="assets/custom/img/2.png"></a>
					</div>
					<div class="col-md-2">
						<a href="#"><img alt="" src="assets/custom/img/3.png"></a>
					</div>
					<div class="col-md-2">
						<a href="#"><img alt="" src="assets/custom/img/4.png"></a>
					</div>
				</div>
		</div>
	 </div>

	
	
    <!-- footerTopSection -->
    <div class="footerTopSection">
		<div class="container">
			<div class="row">
			  <div class="col-md-3" id="about">
				<h3>Tentang Kami </h3>
				<p>
				Melayani pemesanan untuk :<br>
				<strong>Perlengkapan Gypsum <br/>Besi Hollow Galvanis <br/>Besi Hollow meni <br/>Rangka Atap Baja Ringan</strong>.
				</p>
				
				<h3>Monthly news letter</h3>
				<p>If you intended to get monthly newsletters and offers from us?</p>
				<div>
					<form class="form-inline" role="form">
					  <div class="form-group">
						<label class="sr-only" for="exampleInputEmail2">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
					  </div>
					  <button type="submit" class="btn btn-brand">Subscribe</button>
					</form>
				</div>
				
			  </div>
			  <div class="col-md-3">
				<h3>Recent NEWS </h3>
				<p>
					Best service provicer for<br>
					<strong>web and application </strong> design and development.
				</p>
				<p>
					Best service provicer for<br>
					<strong>web and application </strong> design and development.
				</p>
				<p>
					Best service provicer for<br>
					<strong>web and application </strong> design and development.
				</p>
			  </div>
			  <div class="col-md-3">
				<h3>Useful Links</h3>
				<p>
					<span>This may be the very useful and quick link for proper information</span><br><br>
					<a href="#">Our Services</a><br>
					<a href="#">About us</a><br>
					<a href="#">Our Network</a><br>
					<a href="#">Our Products</a><br>
				</p>
				<h3>Friends</h3>
				<p>
					<a href="#">Yahoo.com</a><br>
					<a href="#">Canon</a>
				</p>
				
			  </div>
			  <div class="col-md-3" id="contact">
				<h3>Hubungi Kami</h3>
				<p>
					<strong><?php echo"$r[nama_perusahaan]";?></strong><br>
					<?php echo"$r[alamat]"; ?><br>
					Indonesia<br>
					Telepone : <?php echo"$r[telepon]";?><br>
					Email    : <?php echo"$r[email]"; ?><br>
					Website  :	<?php echo"<a href='$r[website]'>$r[website]</a>"; ?><br>
				</p>
				<h3>Stay Connected</h3>
				<p>
					We are available at all social networks
				</p>
					F , t, G, T, Ln, P, Y
			  </div>
			</div>
		</div>
	</div>
    <!-- footerBottomSection -->	
	<div class="footerBottomSection">
		<div class="container">
			&copy; 2014, Allright reserved. <a href="#">Terms and Condition</a> | <a href="#">Privacy Policy</a> 
			<div class="pull-right"> <a href="index.html"><img src="" alt="" /></a></div>
		</div>
	</div>
	
<!-- JS Global Compulsory -->			
<script type="text/javascript" src="assets/custom/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="assets/custom/js/modernizr.custom.js"></script>		
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>	
	
	<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="assets/custom/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/custom/js/modernizr.js"></script>
<script type="text/javascript" src="assets/custom/js/jquery.cslider.js"></script> 
<script type="text/javascript" src="assets/custom/js/back-to-top.js"></script>
<script type="text/javascript" src="assets/custom/js/jquery.sticky.js"></script>

<!-- JS Page Level -->           
<script type="text/javascript" src="assets/custom/js/app.js"></script>
<script type="text/javascript" src="assets/custom/js/index.js"></script>


<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initSliders();
        Index.initParallaxSlider();
    });
</script>


	</body>
</html>
