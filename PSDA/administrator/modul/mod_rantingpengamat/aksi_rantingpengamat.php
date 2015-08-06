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




// Hapus Rantingpengamat
if ($module=='rantingpengamat' AND $act=='hapus')
{
  mysql_query("DELETE FROM rantingpengamat WHERE id_rantingpengamat='$_GET[id_rantingpengamat]'");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='rantingpengamat' AND $act=='input')
{
   mysql_query("INSERT INTO rantingpengamat(nm_rantingpengamat,
                                    tgl_berdiri,
                                    alamat) 
                            VALUES('$_POST[nm_rantingpengamat]',
                                   '$_POST[tgl_berdiri]',
                                   '$_POST[alamat]')");
    header('location:../../media.php?module='.$module);
}

// Update Ranting Pengamat
elseif ($module=='rantingpengamat' AND $act=='update')
{
  mysql_query("UPDATE rantingpengamat SET nm_rantingpengamat          = '$_POST[nm_rantingpengamat]',
                                   tgl_berdiri       = '$_POST[tgl_berdiri]', 
                                   alamat        = '$_POST[alamat]'
                                  
                             WHERE id_rantingpengamat   = '$_POST[id_rantingpengamat]'");
  header('location:../../media.php?module='.$module);
}
}
?>
