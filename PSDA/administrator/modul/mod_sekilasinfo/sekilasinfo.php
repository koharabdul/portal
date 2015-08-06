<?php
$aksi="modul/mod_sekilasinfo/aksi_sekilasinfo.php";
switch($_GET[act]){
  // Tampil Sekilas Info
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-briefcase icon-white'></i> Sekilas Info</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Sekilas Info' onclick=location.href='?module=sekilasinfo&act=tambahsekilasinfo' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Info</th><th>Tgl. posting</th><th></th></tr></thead>";
    $tampil=mysql_query("SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[info]</td>
                <td>$tgl</td>
					  <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=sekilasinfo&act=editsekilasinfo&id=$r[id_sekilas]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=sekilasinfo&act=hapus&id=$r[id_sekilas]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr>";
    $no++;
    }
    echo "</table></h6></div>";
    break;
  
  case "tambahsekilasinfo":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-briefcase icon-white'></i> Tambah Sekilas Info</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=sekilasinfo&act=input' enctype='multipart/form-data'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Info</label>
		  <input type=text name='info' class='span12'>
		  <label>Gambar</label>
		  <input type=file name='fupload'><p></p>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
		  </form></div>";
     break;
    
  case "editsekilasinfo":
    $edit = mysql_query("SELECT * FROM sekilasinfo WHERE id_sekilas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-briefcase icon-white'></i> Edit Sekilas Info</div></li>
</ul>
</div>
</div>
</div>
           <form method=POST enctype='multipart/form-data' action=$aksi?module=sekilasinfo&act=update>
          <input type=hidden name=id value=$r[id_sekilas]>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Info</label>
		  <input type=text name='info' class='span12' value='$r[info]'>
		  <label>Gambar</label>
		  <img src='../foto_info/$r[gambar]'></br>
		  <input type=file name='fupload'></br>
		  <h6>*) Apabila gambar tidak diubah, dikosongkan saja.</h6>
		  <p></p>
		  </div>
		  <input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
		  </form></div>";
    break;  
}
?>
