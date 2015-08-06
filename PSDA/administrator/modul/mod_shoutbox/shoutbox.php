<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_shoutbox/aksi_shoutbox.php";
switch($_GET[act]){
  // Tampil Shoutbox
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-heart icon-white'></i> Shoutbox</div></li>
</ul>
</div>
</div>
</div><h6><table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Nama</th><th>Pesan</th><th>Aktif</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM shoutbox ORDER BY id_shoutbox DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td width=80>$r[nama]</td>
                <td width=290>$r[pesan]</td>
                <td width=5 align=center>$r[aktif]</td>					  
					   <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=shoutbox&act=editshoutbox&id=$r[id_shoutbox]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=shoutbox&act=hapus&id=$r[id_shoutbox]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM shoutbox"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div></h6></div>";
    break;
  
  case "editshoutbox":
    $edit = mysql_query("SELECT * FROM shoutbox WHERE id_shoutbox='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-heart icon-white'></i> Edit Shoutbox</div></li>
</ul>
</div>
</div>
</div>
         <form method=POST action=$aksi?module=shoutbox&act=update>
          <input type=hidden name=id value=$r[id_shoutbox]>
		  <div class='row-fluid'>
		  <div class='span3'>
		  <label>Nama</label>
		  <input type=text name='nama'  value='$r[nama]' class='span12'>
		  <label>Website</label>
		  <input type=text name='website' value='$r[website]' class='span12'>";
		  if ($r[aktif]=='Y'){
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N";
    }
    else{
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N";
    }
		  
		  echo"</div>
		  <div class='span9'>
		  <textarea name=pesan id='loko' style='width: 600px; height: 150px;'>$r[pesan]</textarea><p></p>
		  </div>
		   <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
         
		  </div>
          
          </form></div>";
	
    
    break;  
}
}
?>
