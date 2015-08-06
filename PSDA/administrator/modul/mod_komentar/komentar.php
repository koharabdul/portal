<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_komentar/aksi_komentar.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-comment icon-white'></i> Komentar</div></li>
</ul>
</div>
</div>
</div><h6>
          <table class='table table-condensed' width=100%>
          <thead><tr><th>no</th><th>nama</th><th>komentar</th><th>aktif</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM komentar ORDER BY id_komentar DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td width=20%>$r[nama_komentar]</td>
                <td width=40%>$r[isi_komentar]</td>
                <td align=center>$r[aktif]</td> 
					   <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=komentar&act=editkomentar&id=$r[id_komentar]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=komentar&act=hapus&id=$r[id_komentar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM komentar"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
    break;
  
  case "editkomentar":
    $edit = mysql_query("SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-comment icon-white'></i> Edit Komentar</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action=$aksi?module=komentar&act=update>
		  <input type=hidden name=id value=$r[id_komentar]>
		  <div class='row-fluid'>
		  <div class='span3'>
		  <label>Nama</label>
		  <input type=text name='nama_komentar' size=30 value='$r[nama_komentar]' class='span12'>
		  <label>Website</label>
		  <input type=text name='url' size=30 value='$r[url]' class='span12'>";
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
		  <textarea name='isi_komentar' id='loko' style='width: 600px; height: 150px;'>$r[isi_komentar]</textarea><p></p>
		  </div>
		   <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
         
		  </div>
          
          </form></div>";

    break;  
}
}
?>
