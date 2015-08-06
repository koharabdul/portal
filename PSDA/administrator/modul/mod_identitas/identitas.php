<?php
$aksi="modul/mod_identitas/aksi_identitas.php";
switch($_GET[act]){
  // Tampil identitas
  default:
    $sql  = mysql_query("SELECT * FROM identitas LIMIT 1");
    $r    = mysql_fetch_array($sql);

    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-globe icon-white'></i> Profil Web</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update>
		  <input type=hidden name=id value=$r[id_identitas]>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Nama Website</label>
		  <input type=text name='nama_website' value='$r[nama_website]' class='span12'>
		  <label>Meta Deskripsi</label>
		  <input type=text name='meta_deskripsi' value='$r[meta_deskripsi]' class='span12'>
		  <label>Keyword</label>
		  <input type=text name='meta_keyword' value='$r[meta_keyword]' class='span12'>
		  <label>Favicon</label>
		  <img src=../$r[favicon]><p></p>
		  <input type=file size=20 name=fupload>
          <h6>NB: nama file gambar favicon harus favicon.ico</h6>
		  </div>
		  <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
		  </div>
         </form></div>";
    break;  
}
?>
