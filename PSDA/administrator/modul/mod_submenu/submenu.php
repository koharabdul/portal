<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_submenu/aksi_submenu.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-list-alt icon-white'></i> Sub Menu</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Sub Utama' onclick=location.href='?module=submenu&act=tambahsubmenu' class='btn btn-success pull-right'><br/>
          <table class='table table-condensed' width=100%>
          <thead><tr><th>no</th><th>sub menu</th><th>menu utama</th><th>link submenu</th><th>aktif</th><th></th></tr></thead>";

    $tampil = mysql_query("SELECT nama_sub,nama_menu,link_sub,submenu.aktif,id_sub FROM submenu,mainmenu WHERE submenu.id_main=mainmenu.id_main");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[nama_sub]</td>
                <td>$r[nama_menu]</td>
                <td>$r[link_sub]</td>
                <td align=center>$r[aktif]</td>
						<td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=submenu&act=editsubmenu&id=$r[id_sub]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=submenu&act=hapus&id=$r[id_sub]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr>";
      $no++;
    }
    echo "</table></h6></div>";
    break;
  
  case "tambahsubmenu":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-list-alt icon-white'></i> Tambah Sub Menu</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=submenu&act=input'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Sub Menu</label>
		  <input type=text name='nama_sub' class='span12'>
		  <label>Menu Utama</label>
		    <select name='menu_utama' class='span12'>
            <option value=0 selected>- Pilih Menu Utama -</option>
		  ";
		  $tampil=mysql_query("SELECT * FROM mainmenu ORDER BY nama_menu");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_main]>$r[nama_menu]</option>";
            }
		  echo"</select>
		  <label>Link Sub Menu</label>
		  <input type=text name='link_sub' class='span12'>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
        </form></div>";
     break;
    
  case "editsubmenu":
    $edit = mysql_query("SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-list-alt icon-white'></i> Edit Sub Menu</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action=$aksi?module=submenu&act=update>
          <input type=hidden name=id value=$r[id_sub]>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Sub Menu</label>
		  <input type=text name='nama_sub' class='span12' value='$r[nama_sub]'>
		  <label>Menu Utama</label>
		  <select name='menu_utama' class='span12'>
		  ";
	$tampil=mysql_query("SELECT * FROM mainmenu ORDER BY nama_menu");
          if ($r[id_main]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_main]==$w[id_main]){
              echo "<option value=$w[id_main] selected>$w[nama_menu]</option>";
            }
            else{
              echo "<option value=$w[id_main]>$w[nama_menu]</option>";
            }
          }
		  echo"</select>
		  <label>Link Sub Menu</label>
		  <input type=text name='link_sub' class='span12' value='$r[link_sub]'>";
		  	      if ($r[aktif]=='Y'){
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N<p></p>";
    }
    else{
      echo "<label>Aktif</label> <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N<p></p>";
    }
		  echo"</div>
		  <input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div>
        </form></div>";
	

    break;  
}
}
?>
