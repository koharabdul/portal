<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_galerifoto/aksi_galerifoto.php";
switch($_GET[act]){
  // Tampil Galeri Foto
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Galeri</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Foto' onclick=location.href='?module=galerifoto&act=tambahgalerifoto' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Judul foto</th><th>Album</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM gallery,album WHERE gallery.id_album=album.id_album ORDER BY id_gallery DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tbody><tr><td>$no</td>
                <td>$r[jdl_gallery]</td>
                <td>$r[jdl_album]</td>
				<td><div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=galerifoto&act=editgalerifoto&id=$r[id_gallery]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=galerifoto&act=hapus&id=$r[id_gallery]&namafile=$r[gbr_gallery]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr></tbody>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM gallery"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
 
    break;
  
  case "tambahgalerifoto":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Tambah Galeri</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=galerifoto&act=input' enctype='multipart/form-data'>
		  <div class='row-fluid'>
			<div class='span3'>
			<label>Judul</label>
			<input type=text name='jdl_gallery' class='span12'>
			<label>Album</label>
			 <select name='album' class='span12'>
            <option value=0 selected >- Pilih Album -</option>
			";
            $tampil=mysql_query("SELECT * FROM album ORDER BY jdl_album");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_album]>$r[jdl_album]</option>";
            }
    echo "</select>
	<label>Gambar</label><input type=file name='fupload' size=40> 
                                          <h6>Tipe gambar harus JPG/JPEG</h6>
										  </div>
			<div class='span9'>
			<label>Keterangan</label>
			<textarea name='keterangan' class='span12' rows=9></textarea>
			</div>
          
         <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
			</div></form></div>";
     break;
    
  case "editgalerifoto":
    $edit = mysql_query("SELECT * FROM gallery WHERE id_gallery='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Edit Galeri</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=galerifoto&act=update' enctype='multipart/form-data'>
		            <input type=hidden name=id value=$r[id_gallery]>
		  <div class='row-fluid'>
			<div class='span3'>
			<label>Judul</label>
			<input type=text name='jdl_gallery' class='span12' value='$r[jdl_gallery]'>
			<label>Album</label>
			 <select name='album' class='span12'>
			";
 $tampil=mysql_query("SELECT * FROM album ORDER BY jdl_album");
          if ($r[id_album]==0){
            echo "<option value=0 selected>- Pilih Album -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_album]==$w[id_album]){
              echo "<option value=$w[id_album] selected>$w[jdl_album]</option>";
            }
            else{
              echo "<option value=$w[id_album]>$w[jdl_album]</option>";
            }
          }
    echo "</select><label>Gambar</label>";
	          if ($r[gbr_gallery]!=''){
              echo "<img src='../img_galeri/kecil_$r[gbr_gallery]'><p></p>";  
          }
	echo"<input type=file name='fupload' size=40> 
                                          <h6>*) Apabila gambar tidak diubah, dikosongkan saja</h6>
										  </div>
			<div class='span9'>
			<label>Keterangan</label>
			<textarea name='keterangan' class='span12' rows=9>$r[keterangan]</textarea>
			</div>
          
         <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
			</div></form></div>";
    break;  
}
}
?>
