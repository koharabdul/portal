<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_banner/aksi_banner.php";
switch($_GET[act]){
  // Tampil Banner
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-share icon-white'></i> Banner</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Banner' onclick=location.href='?module=banner&act=tambahbanner' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>no</th><th>judul</th><th>url</th><th>tgl. posting</th></tr></thead>";
    $tampil=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tbody><tr><td>$no</td>
                <td>$r[judul]</td>
                <td><a href=$r[url] target=_blank>$r[url]</a></td>
                <td>$tgl</td>
					  
					   <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=banner&act=editbanner&id=$r[id_banner]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=banner&act=hapus&id=$r[id_banner]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr></tbody>";
    $no++;
    }
    echo "</table></h6></div>";
    break;
  
  case "tambahbanner":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-share icon-white'></i> Tambah Banner</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=banner&act=input' enctype='multipart/form-data'>
          <div class='row-fluid'>
		  <div class='span12'>
			<label>Judul</label>
			<input type=text name='judul'>
			<label>Url</label>			
			<input type=text name='url'value='http://'>
			<label>Gambar</label>
			<input type=file name='fupload' size=40>
			<div class='pull-right'>
		  <input type=submit name=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
		  
		  </div>
		  </div>
		  </form>";
     break;
    
  case "editbanner":
    $edit = mysql_query("SELECT * FROM banner WHERE id_banner='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-share icon-white'></i> Edit Banner</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=banner&act=update>
          <input type=hidden name=id value=$r[id_banner]>
		  <div class='row-fluid'>
		  <div class='span12'>
			<label>Judul</label>
			<input type=text name='judul' value='$r[judul]'>
			<label>Url</label>			
			<input type=text name='url' value='$r[url]'>
			<label>Gambar</label>
			<img src='../foto_banner/$r[gambar]'><p></p>
			<input type=file name='fupload' size=40>
			<p>*) Apabila gambar tidak diubah, dikosongkan saja.</p>
			
		  <input type=submit name=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
		  </div>
          </form></div>";
    break;  
}
}
?>
