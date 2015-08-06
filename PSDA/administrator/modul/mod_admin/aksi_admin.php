<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];




// Hapus Akun
if ($module=='admin' AND $act=='hapus')
{
  mysql_query("DELETE FROM admin WHERE id_admin ='$_GET[id_admin]'");
  header('location:../../media.php?module='.$module);
}
// Input Akun
elseif ($module=='admin' AND $act=='input')
{
  $pass=md5($_POST[password]);
   mysql_query("INSERT INTO admin(id_admin,
                                    username,
                                    password,
                                    status,
                                    id_session) 
                            VALUES('$_POST[menu_utama1]',
                                   '$_POST[nm_akun]',
                                   '$pass',
                                   '$_POST[status]',
                                    '$pass')");
    header('location:../../media.php?module='.$module);
}

// Update Akun
elseif ($module=='admin' AND $act=='update')
{
   $pass=md5($_POST[password]);
  mysql_query("UPDATE admin SET 
                                   username       = '$_POST[nm_akun]', 
                                   password       = '$pass'
                                   
                                  
                             WHERE id_admin   = '$_POST[id_admin]'");
  header('location:../../media.php?module='.$module);
}
}
?>
