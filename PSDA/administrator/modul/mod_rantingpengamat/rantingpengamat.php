<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_rantingpengamat/aksi_rantingpengamat.php";
switch($_GET[act]){
  // Tampil Galeri Foto
  default:
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Ranting / Pengamat / UPTD</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Ranting / Pengamat / UPTD' onclick=location.href='?module=rantingpengamat&act=tambahrantingpengamat' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Ranting / Pengamat / UPTD</th><th>Tanggal Berdiri</th><th>Alamat</th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM rantingpengamat ORDER BY nm_rantingpengamat ASC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tbody><tr><td>$no</td>
                <td>$r[nm_rantingpengamat]</td>
                <td>$r[tgl_berdiri]</td>
                <td>$r[alamat]</td>
        <td><div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-pencil icon-white'></i></button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
    <li><a href=?module=rantingpengamat&act=editrantingpengamat&id_rantingpengamat=$r[id_rantingpengamat]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=rantingpengamat&act=hapus&id_rantingpengamat=$r[id_rantingpengamat]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
            </tr></tbody>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM rantingpengamat"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
 
    break;
  
  case "tambahrantingpengamat":
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Tambah Ranting / Pengamat / UPTD</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=rantingpengamat&act=input' enctype='multipart/form-data'>
      <div class='row-fluid'>
      <div class='span3'>
      <label>Ranting / Pengamat / UPTD</label>
      <input type=text name='nm_rantingpengamat' class='span12' placeholder='Ranting/Pengamat/UPTD...'>
      <label>Tanggal Berdiri</label>
      <div class='input-append'><input type=text name='tgl_berdiri' class='span12' id='akhir' placeholder='Berdiri Pada Tahun...'><span class='add-on'><i class='icon-calendar'></i></span></div>
      </div>
      <div class='span9'>
      <label>Alamat</label>
      <textarea name='alamat' class='span12' rows=9 placeholder='Alamat Ranting/Pengamat/UPTD...'></textarea>
      </div>
          
         <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
      </div></form></div>";
     break;
    
  case "editrantingpengamat":
    $edit = mysql_query("SELECT * FROM rantingpengamat WHERE id_rantingpengamat='$_GET[id_rantingpengamat]'");
    $r    = mysql_fetch_array($edit);
echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Edit Ranting / Pengamat / UPTD</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=rantingpengamat&act=update' enctype='multipart/form-data'>
                <input type=hidden name=id_rantingpengamat value=$r[id_rantingpengamat]>
      <div class='row-fluid'>
      <div class='span3'>
      <label>Ranting / Pengamat</label>
      <input type=text name='nm_rantingpengamat' class='span12' value='$r[nm_rantingpengamat]'>
      <label>Tanggal Berdiri</label>
     
 
      <div class='input-append'><input type=text name='tgl_berdiri' class='span12' value='$r[tgl_berdiri]' id='mulai'><span class='add-on'><i class='icon-calendar'></i></span></div></div>
      
      
      
      <div class='span9'>
      <label>Alamat</label>
      <textarea name='alamat' class='span12' rows=9>$r[alamat]</textarea>
      </div>
          
         <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
      </div></form></div>";
    break;  
}
}
?>
