<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-font icon-white'></i> Kategori</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Kategori' onclick=location.href='?module=kategori&act=tambahkategori' class='btn btn-success pull-right'><br/>
          <table class='table table-condensed' width=100%>
         <thead> <tr><th>No</th><th>Nama kategori</th><th>Status</th><th></th></tr></thead>"; 
    $tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tbody><tr><td>$no</td>
             <td width=80%>$r[nama_kategori]</td>
             <td>$r[aktif]</td>
             <td><a href=?module=kategori&act=editkategori&id=$r[id_kategori] class='btn btn-primary pull-right'><i class='icon-pencil icon-white'></i></a>
             </td></tr></tbody>";
      $no++;
    }
    echo "</table>";
    echo "<div id=paging>*) Data pada Kategori tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Kategori.</div></h6></div>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-font icon-white'></i> Tambah Kategori</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=kategori&act=input'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Nama Kategori</label>
		  <input type=text name='nama_kategori' class='span12'>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary '> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
         </form></div>";
     break;
  
  // Form Edit Kategori  
  case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

	 echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-font icon-white'></i> Tambah Kategori</div></li>
</ul>
</div>
</div>
</div>
                    <form method=POST action=$aksi?module=kategori&act=update>
          <input type=hidden name=id value='$r[id_kategori]'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Nama Kategori</label>
		  <input type=text name='nama_kategori' value='$r[nama_kategori]' class='span12'>";
		     if ($r[aktif]=='Y'){
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N <p></p>";
    }
    else{
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N <p></p>";
    }
		  echo"</div>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
         </form></div>";
     break;
	

    break;  
}
}
?>
