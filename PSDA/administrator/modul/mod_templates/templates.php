<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_templates/aksi_templates.php";
switch($_GET[act]){
  // Tampil Templates
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-fire icon-white'></i> Templates</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Templates' onclick=location.href='?module=templates&act=tambahtemplates' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
         
          <thead><tr><th>no</th><th>nama templates</th><th>pembuat</th><th>folder</th><th>aktif</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM templates ORDER BY id_templates DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$r[pembuat]</td>
                <td>$r[folder]</td>
                <td width=5 align=center>$r[aktif]</td>
				<td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=templates&act=edittemplates&id=$r[id_templates]><i class='icon-pencil icon'></i> Edit Templates</a></li>
    <li><a href=\"$aksi?module=templates&act=aktifkan&id=$r[id_templates]\" onClick=\"return confirm('Apakah Anda benar-benar mau mengaktifkannya?')\"><i class='icon-ok icon'></i> Aktifkan</a></li>

  </ul>
</div></td>	  
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM templates"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
    break;
  
  
  // Form Tambah Templates
  case "tambahtemplates":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-fire icon-white'></i> Tambah Templates</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=templates&act=input'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label> Nama Templates</label>
		  <input type=text name='judul' class='span12'>
		  <label>Pembuat</label>
		  <input type=text name='pembuat' class='span12'>
		  <label>Folder</label>
		  <input type=text name='folder' value='templates/' class='span12'>
		  </div>
<input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  		 
		 </div></form></div>";
     break;
  
  // Form Edit Templates 
  case "edittemplates":
    $edit=mysql_query("SELECT * FROM templates WHERE id_templates='$_GET[id]'");
    $r=mysql_fetch_array($edit);

	    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-fire icon-white'></i> Edit Templates</div></li>
</ul>
</div>
</div>
</div>
                    <form method=POST action=$aksi?module=templates&act=update>
          <input type=hidden name=id value='$r[id_templates]'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label> Nama Templates</label>
		  <input type=text name='judul' class='span12' value='$r[judul]'>
		  <label>Pembuat</label>
		  <input type=text name='pembuat' class='span12' value='$r[pembuat]'>
		  <label>Folder</label>
		  <input type=text name='folder' value='$r[folder]' class='span12'>
		  </div>
<input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  		 
		 </div></form></div>";
    break;  
}
}
?>
