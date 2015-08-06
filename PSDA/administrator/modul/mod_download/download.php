<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_download/aksi_download.php";
switch($_GET[act]){
  // Tampil Download
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-folder-close icon-white'></i> Download</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah File' onclick=location.href='?module=download&act=tambahdownload' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Judul</th><th>Nama file</th><th>Tanggal posting</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM download ORDER BY id_download DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tbody><tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$r[nama_file]</td>
                <td>$tgl</td>
					                  <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=download&act=editdownload&id=$r[id_download]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=download&act=hapus&id=$r[id_download]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr></tbody>";
    $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM download"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br></h6></div>";    
    break;
  
  case "tambahdownload":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-folder-open icon-white'></i> Tambah Download</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Judul</label>
		  <input type=text name='judul' class='span12'>
		  <label>File</label>
		  <input type=file name='fupload'><p></p>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
		  </div>
		  </form></div>";
     break;
    
  case "editdownload":
    $edit = mysql_query("SELECT * FROM download WHERE id_download='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-folder-open icon-white'></i> Edit Download</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=download&act=update>
          <input type=hidden name=id value=$r[id_download]>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Judul</label>
		  <input type=text name='judul' class='span12' value='$r[judul]'>
		  <label>File : $r[nama_file]</label>
		  <input type=file name='fupload'><p></p>
		  <h6>*) Apabila file tidak diubah, dikosongkan saja.</h6>
		  <input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
		  </div>
          </form></div>";
    break;  
}
}
?>
