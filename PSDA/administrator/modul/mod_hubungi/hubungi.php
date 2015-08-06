<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET[act]){
  // Tampil Hubungi Kami
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<div class='nav-collapse collapse'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-envelope icon-white'></i> Hubungi</div></li>
</ul>

</div>
</div>
</div>
</div><h6>
<div id=paging>
          *) Untuk menjawab/membalas email, klik langsung pada alamat emailnya yang ada di kolom EMAIL.
          </div><p></p>
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Nama</th><th>Email</th><th>Subjek</th><th>Tanggal</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM hubungi ORDER BY id_hubungi DESC LIMIT $posisi, $batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
      echo "<tbody><tr><td>$no</td>
                <td width=40%>$r[nama]</td>
                <td><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
                <td>$r[subjek]</td>
                <td>$tgl</a></td>
                <td><a href=\"$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn-primary pull-right'><i class='icon-trash icon-white'></i></a>
                </td></tr></tbody>";
    $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM hubungi"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br></h6></div>";
    break;

  case "balasemail":
    $tampil = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);

    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-eye-open icon-white'></i> Balas Email</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='?module=hubungi&act=kirimemail'>
		   <div class='row-fluid'>
		<div class='span3'>
		<lebel>Kepada</lebel>
		<input type=text name='email' class='span12' value='$r[email]'>
		<label>Subjek</label>
		<input type=text name='subjek' class='span12' value='Re: $r[subjek]'>
		</div>
		<div class='span9'>
		<textarea name='pesan' id='loko' class='span12'><br><br><br><br>     
  ---------------------------------------------------------------------------------------------------------------------
  $r[pesan]</textarea><p></p>
		</div>
		
<div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
         </div></form></div>";
     break;
    
  case "kirimemail":
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: redaksi@bukulokomedia.com");
    echo "<h2>Status Email</h2>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;  
}
}
?>
