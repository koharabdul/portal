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
if ($module=='bentukbendung' AND $act=='hapus')
{
  mysql_query("DELETE FROM bentukbendung WHERE id_bentukbendung='$_GET[id_bentukbendung]'");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='bentukbendung' AND $act=='input')
{
   mysql_query("INSERT INTO bentukbendung(nm_bentukbendung,
                                    rumushitunganL,
                                    rumushitunganM) 
                            VALUES('$_POST[nm_bentukbendung]',
                                   '$_POST[rumushitunganL]',
                                   '$_POST[rumushitunganM]')");
    header('location:../../media.php?module='.$module);
}

// Update Ranting Pengamat
elseif ($module=='bentukbendung' AND $act=='update')
{
  mysql_query("UPDATE bentukbendung SET nm_bentukbendung          = '$_POST[nm_bentukbendung]',
                                   rumushitunganL       = '$_POST[rumushitunganL]', 
                                   rumushitunganM        = '$_POST[rumushitunganM]'
                                  
                             WHERE id_bentukbendung   = '$_POST[id_bentukbendung]'");
  header('location:../../media.php?module='.$module);
}
}
?>
