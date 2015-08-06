<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_admin/aksi_admin.php";
switch($_GET[act]){
  // Tampil Bentuk Bendung
  default:
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Pengguana Akun</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Akun' onclick=location.href='?module=admin&act=tambahakun' class='btn btn-success pull-right'><br />

          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Username :</th><th>Nama Lengkap :</th><th>Status :</th><th>Jabatan :</th><th>Daerah Irigsi :</th><th>Ranting/Pengamat :</th><th>No. Hp :</th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT `admin`.`username`,`personil`.`nm_personil`,`status`,`jabatan`.`nm_jabatan`,`di`.`nm_di`,`rantingpengamat`.`nm_rantingpengamat`,`personil`.`nope`,`id_admin` FROM `admin`,`personil`,`di`,`jabatan`,`rantingpengamat` WHERE `admin`.`id_admin` = `personil`.`id_personil` AND `personil`.`id_jabatan`=`jabatan`.`id_jabatan` AND `personil`.`id_di`=`di`.`id_di` AND `di`.`id_rantingpengamat`=`rantingpengamat`.`id_rantingpengamat` ORDER BY nm_di ASC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tbody><tr><td>$no</td>
                <td>$r[username]</td>
                <td>$r[nm_personil]</td>
                <td>$r[status]</td>
                <td>$r[nm_jabatan]</td>
                <td>$r[nm_di]</td>
                <td>$r[nm_rantingpengamat]</td>
                <td>$r[nope]</td>
        <td><div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-pencil icon-white'></i></button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
    <li><a href=?module=admin&act=editakun&id_admin=$r[id_admin]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=admin&act=hapus&id_admin=$r[id_admin]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
            </tr></tbody>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM admin"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
 
    break;
  
  case "tambahakun":
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Tambah Akun</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=admin&act=input' enctype='multipart/form-data'>
      <div class='row-fluid'>
      <div class='span12'>
      <label>Pengguana Akun :</label>
       <select name='menu_utama1' class='span12'>
            <option value=0 selected>- Pilih Menu Utama -</option>
      ";
      $tampil=mysql_query("SELECT * FROM personil ORDER BY id_personil");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_personil]>$r[nm_personil]</option>";
            }
      echo"</select>
       <label>Status</label>
      <input type=radio name='status' value='blangko'>Blangko   
          <input type=radio name='status' value='debit'>Debit <br><br>
      <label>Akun Pengguana</label>
      <input type=text name='nm_akun' class='span12' placeholder='Akun Pengguna...'>
      <label>Password</label>
      <input type=text name='pass_akun' class='span12' placeholder='Password Akun...'>
     
      </div>
      
          
         <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
      </div></form></div>";
     break;
    
  case "editakun":
    $edit = mysql_query("SELECT `admin`.`username`,`personil`.`nm_personil`,`status`,`jabatan`.`nm_jabatan`,`di`.`nm_di`,`rantingpengamat`.`nm_rantingpengamat`,`personil`.`nope`,`id_admin` FROM `admin`,`personil`,`di`,`jabatan`,`rantingpengamat` WHERE `admin`.`id_admin` = `personil`.`id_personil` AND `personil`.`id_jabatan`=`jabatan`.`id_jabatan` AND `personil`.`id_di`=`di`.`id_di` AND `di`.`id_rantingpengamat`=`rantingpengamat`.`id_rantingpengamat` AND id_admin='$_GET[id_admin]'");
    $r    = mysql_fetch_array($edit);
echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Edit Akun</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=admin&act=update' enctype='multipart/form-data'>
                <input type=hidden name=id_admin value=$r[id_admin]>
      <div class='row-fluid'>
      <div class='span12'>
      
      <label>Pengguna Akun</label>
      <input type=text name='menu_utama1' class='span12' value='$r[nm_personil]' disabled>
     
      
      <label>Usernama</label>
      <input type=text name='nm_akun' class='span12' value='$r[username]'>
      <label>Password</label>
      <input type=text name='password' class='span12'>
      
      
      
      </div>
          
         <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
      </div></form></div>";
    break;  
}
}
?>
