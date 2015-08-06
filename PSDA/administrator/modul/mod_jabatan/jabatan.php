<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_jabatan/aksi_jabatan.php";
switch($_GET[act]){
  // Tampil Galeri Foto
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Jabatan TKK</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Jabatan' onclick=location.href='?module=jabatan&act=tambahjabatan' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Status Jabatan</th><th>Keterangan</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM jabatan ORDER BY id_jabatan ASC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tbody><tr><td>$no</td>
                <td>$r[nm_jabatan]</td>
                <td>$r[keterangan]</td>
				<td><div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-pencil icon-white'></i></button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=jabatan&act=editjabatan&id_jabatan=$r[id_jabatan]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=jabatan&act=hapus&id_jabatan=$r[id_jabatan]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr></tbody>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM jabatan"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
 
    break;
  
  case "tambahjabatan":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Tambah Jabatan</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=jabatan&act=input' enctype='multipart/form-data'>
		  <div class='row-fluid'>
			<div class='span12'>
			<label>Nama Jabatan</label>
			<input type=text name='nm_jabatan' class='span12'>
	    <label>Jabatan</label>
			<input type=text name='keterangan' class='span12'>
			</div>
          
         <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
			</div></form></div>";
     break;
    
  case "editjabatan":
    $edit = mysql_query("SELECT * FROM jabatan WHERE id_jabatan='$_GET[id_jabatan]'");
    $r    = mysql_fetch_array($edit);
echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Edit Jabatan</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=jabatan&act=update' enctype='multipart/form-data'>
		            <input type=hidden name=id_jabatan value=$r[id_jabatan]>
		  <div class='row-fluid'>
			<div class='span12'>
			<label>Nama Jabatan</label>
			<input type=text name='nm_jabatan' class='span12' value='$r[nm_jabatan]'>
			<label>Keterangan</label>
			<input type=text name='keterangan' class='span12' value='$r[keterangan]'>
			</div>
          
         <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
			</div></form></div>";
    break;  
}
}
?>
