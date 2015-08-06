<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_fitur/aksi_fitur.php";
switch($_GET[act]){
  // Tampil Galeri Foto
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Fitur</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Fitur' onclick=location.href='?module=fitur&act=tambahfitur' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Judul</th><th>Deskripsi</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM fitur ORDER BY judul ASC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tbody><tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$r[deskripsi]</td>
				<td><div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=fitur&act=editfitur&id=$r[id]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=fitur&act=hapus&id=$r[id]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr></tbody>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM fitur"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
 
    break;
  
  case "tambahfitur":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Tambah Fitur</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=fitur&act=input' enctype='multipart/form-data'>
		  <div class='row-fluid'>
			<div class='span3'>
			<label>Judul</label>
			<input type=text name='judul' class='span12'>
	    <label>Gambar</label><input type=file name='fupload' size=40> 
                                          <h6>Tipe gambar harus JPG/JPEG</h6>
										  </div>
			<div class='span9'>
			<label>Deskripsi</label>
			<textarea name='deskripsi' class='span12' rows=9></textarea>
			</div>
          
         <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
			</div></form></div>";
     break;
    
  case "editfitur":
    $edit = mysql_query("SELECT * FROM fitur WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Edit Fitur</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=fitur&act=update' enctype='multipart/form-data'>
		            <input type=hidden name=id value=$r[id]>
		  <div class='row-fluid'>
			<div class='span3'>
			<label>Judul</label>
			<input type=text name='judul' class='span12' value='$r[judul]'>
			<label>Gambar</label>";
	          if ($r[gambar]!=''){
              echo "<img src='../images/kecil_$r[gambar]'><p></p>";  
          }
	echo"<input type=file name='fupload' size=40> 
                                          <h6>*) Apabila gambar tidak diubah, dikosongkan saja</h6>
										  </div>
			<div class='span9'>
			<label>Deskripsi</label>
			<textarea name='deskripsi' class='span12' rows=9>$r[deskripsi]</textarea>
			</div>
          
         <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
			</div></form></div>";
    break;  
}
}
?>
