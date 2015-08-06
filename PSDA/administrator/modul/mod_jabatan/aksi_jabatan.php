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
//include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus gallery
if ($module=='jabatan' AND $act=='hapus'){
     mysql_query("DELETE FROM jabatan WHERE id_jabatan='$_GET[id_jabatan]'");  
     header('location:../../media.php?module='.$module);
}

// Input gallery
elseif ($module=='jabatan' AND $act=='input'){
    mysql_query("INSERT INTO jabatan(nm_jabatan,
                                    keterangan) 
                            VALUES('$_POST[nm_jabatan]',
                                   '$_POST[keterangan]')");
    header('location:../../media.php?module='.$module);
  
}

// Update gallery
elseif ($module=='jabatan' AND $act=='update'){
 
    mysql_query("UPDATE jabatan SET nm_jabatan  = '$_POST[nm_jabatan]',
                                    keterangan = '$_POST[keterangan]' 
                                    WHERE id_jabatan = '$_POST[id_jabatan]'");
  header('location:../../media.php?module='.$module);
}
  

}
?>
