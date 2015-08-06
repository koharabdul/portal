<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_katajelek/aksi_katajelek.php";
switch($_GET[act]){
  // Tampil Kata Jelek
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-remove icon-white'></i> Kata Jelek</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Kata' onclick=location.href='?module=katajelek&act=tambahkatajelek' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Kata jelek</th><th>Ganti</th><th></th></tr></thead>"; 
    $tampil=mysql_query("SELECT * FROM katajelek ORDER BY id_jelek DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tbody><tr><td>$no</td>
             <td>$r[kata]</td>
             <td>$r[ganti]</td>			 
			  <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=katajelek&act=editkatajelek&id=$r[id_jelek]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=katajelek&act=hapus&id=$r[id_jelek]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
			 </tr></tbody>";
      $no++;
    }
    echo "</table></div>";
    break;
  
  // Form Tambah Kata Jelek
  case "tambahkatajelek":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-remove icon-white'></i> Tambah Kata Jelek</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=katajelek&act=input'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label> Input Kata</label>
		  <input type=text name='kata' class='span12'>
		  <label> Ganti </label>
		  <input type=text name='ganti' class='span12'>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>

          </form></div>";
     break;
  
  // Form Edit Kata Jelek 
  case "editkatajelek":
    $edit=mysql_query("SELECT * FROM katajelek WHERE id_jelek='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-remove icon-white'></i> Edit Kata Jelek</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action=$aksi?module=katajelek&act=update>
          <input type=hidden name=id value='$r[id_jelek]'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label> Input Kata</label>
		  <input type=text name='kata' class='span12' value='$r[kata]'>
		  <label> Ganti </label>
		  <input type=text name='ganti' class='span12' value='$r[ganti]'>
		  </div>
		  <input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>

          </form></div>";
    break;  
}
}
?>
