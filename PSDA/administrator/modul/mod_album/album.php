<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_album/aksi_album.php";
switch($_GET[act]){
  // Tampil Album
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<div class='nav-collapse collapse'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-camera icon-white'></i> Album</div></li>
</ul>

</div>
</div>
</div>
</div><h6>
<input type=button value='Tambah Album' onclick=location.href='?module=album&act=tambahalbum' class='btn btn-success pull-right'><br/>
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Judul Album</th><th></th></tr></thead>"; 
    $tampil=mysql_query("SELECT * FROM album ORDER BY id_album DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tbody><tr ><td width=5%>$no</td>
             <td width=60%>$r[jdl_album]</td>
             <td><a href=?module=album&act=editalbum&id=$r[id_album] class='btn btn-primary pull-right'><i class='icon-pencil icon-white'></i></a>
             </td></tr></tbody>";
      $no++;
    }
    echo "</table>";
    echo "<div id=paging>*) Data pada Album tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Album.</div></h6></div>";
    break;
  
  // Form Tambah Album
  case "tambahalbum":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-camera icon-white'></i> Tambah Album</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=album&act=input' enctype='multipart/form-data'>
          <div class='row-fluid'>
		  <div class='span12'>
		  <label>Judul Album</label>
		  <input type=text name='jdl_album' class='span12'>
		  <label>Gambar</label>
		  <input type=file name='fupload' title='Unggah'>
		  </br>
		  <div class='pull-right'>
		  <input type=submit name=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
		  </div>      
		</div>
          </form></div>";
     break;
  
  // Form Edit Album  
  case "editalbum":
    $edit=mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-camera icon-white'></i> Edit Album</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=album&act=update>
		  <input type=hidden name=id value='$r[id_album]'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Judul Album</label>
		  <input type=text name='jdl_album' class='span12' value='$r[jdl_album]'>
		  <label>Gambar</label>
		  <img src='../img_album/kecil_$r[gbr_album]'><p></p>
		  <input type=file name='fupload' title='Unggah'></br>
		  ";
		      if ($r[aktif]=='Y'){
      echo "<label>Aktifkan</label> <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<label>Aktifkan</label> <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    } 
		 echo"  <p></p>
		  <input type=submit name=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		</form></div>
		</div></div>";
        
    break;  
}
}
?>
