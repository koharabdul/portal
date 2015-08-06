<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_tag/aksi_tag.php";
switch($_GET[act]){
  // Tampil Tag
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-tag icon-white'></i> Tag</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Tag' onclick=location.href='?module=tag&act=tambahtag' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>no</th><th>nama tag</th><th></th></tr></thead>"; 
    $tampil=mysql_query("SELECT * FROM tag ORDER BY id_tag DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_tag]</td>
			 <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=tag&act=edittag&id=$r[id_tag]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=tag&act=hapus&id=$r[id_tag]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>
  </ul>
</div></td>
			 </tr>";
      $no++;
    }
    echo "</table></h6></div>";
    break;
  
  // Form Tambah Tag
  case "tambahtag":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-tag icon-white'></i> Tambah Tag</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=tag&act=input'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Nama tag</label>
		  <input type=text name='nama_tag' class='span12'>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary '> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div></form></div>";
     break;
  
  // Form Edit Kategori  
  case "edittag":
    $edit=mysql_query("SELECT * FROM tag WHERE id_tag='$_GET[id]'");
    $r=mysql_fetch_array($edit);
 echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-tag icon-white'></i> Edit Tag</div></li>
</ul>
</div>
</div>
</div>
                    <form method=POST action=$aksi?module=tag&act=update>
          <input type=hidden name=id value='$r[id_tag]'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Nama tag</label>
		  <input type=text name='nama_tag' class='span12' value='$r[nama_tag]'>
		  </div>
		  <input type=submit value=Update class='btn btn-primary '> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div></form></div>";
    break;  
}
}
?>
