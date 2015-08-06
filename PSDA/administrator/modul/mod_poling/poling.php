<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_poling/aksi_poling.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-th-list icon-white'></i> Polling</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Polling' onclick=location.href='?module=poling&act=tambahpoling' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>no</th><th>pilihan</th><th>status</th><th>rating</th><th>aktif</th><th></th></tr></thead>";
          
    $no = 1;
    $tampil=mysql_query("SELECT * FROM poling ORDER BY id_poling DESC");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr>
            <td>$no</td>
            <td>$r[pilihan]</td>
            <td>$r[status]</td>
            <td align=center>$r[rating]</td>
            <td align=center>$r[aktif]</td>
            <td><a href=?module=poling&act=editpoling&id=$r[id_poling] class='btn btn-primary pull-right'><i class='icon-pencil icon-white'></i></a>
            </td></tr>";
      $no++;
    }
    echo "</table></h6></div>";
    break;

  case "tambahpoling":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-th-list icon-white'></i> Tambah Polling</div></li>
</ul>
</div>
</div>
</div
          <form method=POST action='$aksi?module=poling&act=input'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Pilihan</label>
		  <input type=text name='pilihan' class='span12'>
		  <label>Status</label>
		  <input type=radio name='status' value='Jawaban' checked>Jawaban 
          <input type=radio name='status' value='Pertanyaan'>Pertanyaan 
		  <label>Aktif</label>
		  <input type=radio name='aktif' value='Y' checked>Y 
          <input type=radio name='aktif' value='N'>N<p></p>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
          </form></div>";
     break;
 
  case "editpoling":
    $edit = mysql_query("SELECT * FROM poling WHERE id_poling='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-th-list icon-white'></i> Edit Polling</div></li>
</ul>
</div>
</div>
</div
          <form method=POST action=$aksi?module=poling&act=update>
          <input type=hidden name=id value='$r[id_poling]'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Pilihan</label>
		  <input type=text name='pilihan' class='span12' value='$r[pilihan]'>";
 if ($r[aktif]=='Y'){
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N";
    }
    else{
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    if ($r[status]=='Jawaban'){
      echo "<label>Status</label> <input type=radio name='status' value='Jawaban' checked>Jawaban  
                                       <input type=radio name='status' value='Pertanyaan'> Pertanyaan<p></p>";
    }
    else{
      echo "<label>Status</label> <input type=radio name='status' value='Jawaban'>Jawaban  
                                      <input type=radio name='status' value='Pertanyaan' checked>Pertanyaan<p></p>";
    }

	  echo"</div>
		  <input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
          </form></div>";
	
    
    break;  
}
}
?>
