<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM users ORDER BY username");
      echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-user icon-white'></i> User</div></li>
</ul>
</div>
</div>
</div><h6>
          <input type=button value='Tambah User' class='btn btn-success pull-right' onclick=\"window.location.href='?module=user&act=tambahuser';\"><br />";
    }
    else{
      $tampil=mysql_query("SELECT * FROM users 
                           WHERE username='$_SESSION[namauser]'");
      echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-user icon-white'></i> User</div></li>
</ul>
</div>
</div>
</div><h6>";
    }
    
    echo "<table class='table table-condensed' width=100%>
          <thead><tr><th>no</th><th>username</th><th>nama lengkap</th><th>email</th><th>No.Telp/HP</th><th>Blokir</th><th></th></tr></thead>"; 
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
             <td>$r[nama_lengkap]</td>
		         <td><a href=mailto:$r[email]>$r[email]</a></td>
		         <td>$r[no_telp]</td>
		         <td align=center>$r[blokir]</td>
             <td><a href=?module=user&act=edituser&id=$r[id_session] class='btn btn-primary pull-right'><i class='icon-pencil icon-white'></i></a></td></tr>";
      $no++;
    }
    echo "</table></h6></div>";
    break;
  
  case "tambahuser":
    if ($_SESSION[leveluser]=='admin'){
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-user icon-white'></i> Tambah User</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=user&act=input'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Username</label>
		  <input type=text name='username' class='span12'>
		  <label>Passowrd</label>
		  <input type=text name='password' class='span12'>
		  <label>Nama Lengkap</label>
		  <input type=text name='nama_lengkap' class='span12'>
		  <label>E-Mail</label>
		  <input type=text name='email' class='span12'>
		  <label>No.Telp</label>
		  <input type=text name='no_telp' class='span12'>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  </div></form></div>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM users WHERE id_session='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
	
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-user icon-white'></i> Edit User</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          <div class='row-fluid'>
		  <div class='span12'>
		  <label>Username **</label>
		  <input type=text name='username' class='span12' value='$r[username]' disabled>
		  <label>Passowrd *</label>
		  <input type=text name='password' class='span12'>
		  <label>Nama Lengkap</label>
		  <input type=text name='nama_lengkap' class='span12' value='$r[nama_lengkap]'>
		  <label>E-Mail</label>
		  <input type=text name='email' class='span12' value='$r[email]'>
		  <label>No.Telp</label>
		  <input type=text name='no_telp' class='span12' value='$r[no_telp]'>
		  </div>";

    if ($r[blokir]=='N'){
      echo "<label>Blokir</label> <input type=radio name='blokir' value='Y'> Y   
                                           <input type=radio name='blokir' value='N' checked> N <p></p>";
    }
    else{
      echo "<label>Blokir</label> <input type=radio name='blokir' value='Y' checked> Y  
                                          <input type=radio name='blokir' value='N'> N <p></p>";
    }
    
    echo "		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  <p></p>*) Apabila password tidak diubah, dikosongkan saja.<br />
          **) Username tidak bisa diubah.
		  </div></form></div>";     
    }
    else{
	    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-user icon-white'></i> Edit User</div></li>
</ul>
</div>
</div>
</div>
		  <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          <input type=hidden name=blokir value='$r[blokir]'>
		  <div class='row-fluid'>
		  <div class='span12'>
		  <label>Username **</label>
		  <input type=text name='username' class='span12' value='$r[username]' disabled>
		  <label>Passowrd *</label>
		  <input type=text name='password' class='span12'>
		  <label>Nama Lengkap</label>
		  <input type=text name='nama_lengkap' class='span12' value='$r[nama_lengkap]'>
		  <label>E-Mail</label>
		  <input type=text name='email' class='span12' value='$r[email]'>
		  <label>No.Telp</label>
		  <input type=text name='no_telp' class='span12' value='$r[no_telp]'>
		  </div>
		  <input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
		  <p></p>*) Apabila password tidak diubah, dikosongkan saja.<br />
          **) Username tidak bisa diubah.
		  </div></form></div>";    
    }
    break;  
}
}
?>
