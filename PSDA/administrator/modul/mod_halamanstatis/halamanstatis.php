<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
switch($_GET[act]){
  // Tampil Halaman Statis
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-eye-open icon-white'></i> Halama Statis</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Halaman' onclick=location.href='?module=halamanstatis&act=tambahhalamanstatis' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
         <thead> <tr><th>No</th><th>Judul</th><th>Tanggal posting</th><th></th></tr></thead>";

    $tampil = mysql_query("SELECT * FROM halamanstatis ORDER BY id_halaman DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tgl_posting]);
      echo "<tbody><tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
						<td><div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr></tbody>";
      $no++;
    }
    echo "</table></div>";
    break;

  case "tambahhalamanstatis":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-eye-open icon-white'></i> Tambah Halaman</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
		  <div class='row-fluid'>
		<div class='span3'>
		<label>Judul</label>
		<input type=text name='judul' class='span12'>
		<label>Gambar</label>
		<input type=file name='fupload' size=40> 
		<h6>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</h6>
		</div>
		<div class='span9'>
		<textarea name='isi_halaman' id='loko' class='span12' rows=7></textarea><p></p>
		</div>
		<div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
		</div>
         </form></div>";
     break;
    
  case "edithalamanstatis":
    $edit = mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-eye-open icon-white'></i> Tambah Halaman</div></li>
</ul>
</div>
</div>
</div>
         <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
          <input type=hidden name=id value=$r[id_halaman]>
		  <div class='row-fluid'>
		<div class='span3'>
		<label>Judul</label>
		<input type=text name='judul' class='span12' value='$r[judul]'>
		<label>Gambar</label>";
		if ($r[gambar]!=''){
              echo "<img src='../foto_banner/$r[gambar]'>";  
          }
		echo"<input type=file name='fupload' size=40> 
		<h6>*) Apabila gambar tidak diubah, dikosongkan saja</h6>
		</div>
		<div class='span9'>
		<textarea name='isi_halaman' id='loko' class='span12' rows=7>$r[isi_halaman]</textarea><p></p>
		</div>
		<div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
		</div>
         </form></div>";
	
   
    break;  
}

}
?>
