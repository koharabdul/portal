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
if ($module=='debit' AND $act=='hapus')
{
  mysql_query("DELETE FROM debit WHERE id_debit='$_GET[id_debit]'");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='debit' AND $act=='input')
{
   mysql_query("INSERT INTO `sup_rancaekek`.`debit`(`limpas`,
                                                  `hlimpas`,
                                                  `masukkiri`,
                                                  `hmasukiri`,
                                                  `masukkanan`,
                                                  `hmasukkanan`,
                                                  `total`) 
                                    VALUES ('$_POST[limpas]',
                                                  SQRT(limpas*limpas*limpas)*1.7*10,
                                                  '$_POST[masukkiri]',
                                                  SQRT(masukkiri*masukkiri*masukkiri)*1.71*2,
                                                  '$_POST[masukkanan]',
                                                  SQRT(masukkanan*masukkanan*masukkanan)*1.71*2,
                                                  hlimpas+hmasukiri+hmasukkanan)");
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
