<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_modul/aksi_modul.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-th-large icon-white'></i> Modul</div></li>
</ul>
</div>
</div>
</div><h6>
          <div id=paging>
          *) Apabila PUBLISH = Y, maka Modul ditampilkan di halaman pengunjung. <br />
          **) Apabila AKTIF = Y, maka Modul ditampilkan di halaman administrator pada daftar menu yang berada di bagian kiri.</div>
		  <input type=button value='Tambah Modul' onclick=location.href='?module=modul&act=tambahmodul' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Nama modul</th><th>Link</th><th>Publish</th><th>Kktif</th><th>Status</th><th></th></tr></thead>";
    $tampil=mysql_query("SELECT * FROM modul ORDER BY urutan");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tbody><tr><td>$r[urutan]</td>
            <td>$r[nama_modul]</td>
            <td><a href=$r[link]>$r[link]</a></td>
            <td align=center>$r[publish]</td>
            <td align=center>$r[aktif]</td>
            <td>$r[status]</td>
			<td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=modul&act=editmodul&id=$r[id_modul]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=modul&act=hapus&id=$r[id_modul]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
			
			</tr></tbody>";
    }
    echo "</table></h6></div>";
    break;

  case "tambahmodul":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>

<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-th-large icon-white'></i> Tambah Modul</div></li>
</ul>

</div>
</div>
</div>
          <form method=POST action='$aksi?module=modul&act=input'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Nama Modul</label>
		  <input type=text name='nama_modul' class='span12'>
		  <label>Link</label>
		  <input type=text name='link' class='span12' >
		  <label>Publish</label>
		  <input type=radio name='publish' value='Y' checked>Y <input type=radio name='publish' value='N'> N
		  <label>Aktif</label>
		  <input type=radio name='aktif' value='Y' checked>Y <input type=radio name='aktif' value='N'> N
		  <label>Status</label>
		  <input type=radio name='status' value='admin' checked>admin <input type=radio name='status' value='user'>user<p></p>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
         </form></div>";
     break;
 
  case "editmodul":
    $edit = mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>

<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-th-large icon-white'></i> Edit Modul</div></li>
</ul>

</div>
</div>
</div>
          <form method=POST action=$aksi?module=modul&act=update>
          <input type=hidden name=id value='$r[id_modul]'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Nama Modul</label>
		  <input type=text name='nama_modul' class='span12' value='$r[nama_modul]'>
		  <label>Link</label>
		  <input type=text name='link' class='span12' value='$r[link]'>";
		   if ($r[publish]=='Y'){
      echo "<label>Publish</label> <input type=radio name='publish' value='Y' checked>Y  
                                        <input type=radio name='publish' value='N'> N";
    }
    else{
      echo "<label>Publish</label> <input type=radio name='publish' value='Y'>Y  
                                        <input type=radio name='publish' value='N' checked>N";
    }
    if ($r[aktif]=='Y'){
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N";
    }
    else{
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N";
    }
    if ($r[status]=='user'){
      echo "<label>Status</label> <input type=radio name='status' value='user' checked>user  
                                       <input type=radio name='status' value='admin'> admin<p></p>";
    }
    else{
      echo "<label>Status</label> <input type=radio name='status' value='user'>user  
                                       <input type=radio name='status' value='admin' checked>admin<p></p>";
    }
		  echo"</div>
		  <input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
	</div>
         </form></div>";
	
    break;  
}
}
?>
