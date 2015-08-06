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
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];


// Input blangko / debit
elseif ($module=='blangkoO08' AND $act=='input'){
    mysql_query("INSERT INTO `sup_rancaekek`.`blangko08`(`id_b08O`,
                                                          `id_admin`,
                                                          `tgl_blangkoO08`,
                                                          `tgl_ket`,
                                                          `bln_blangkoO08`,
                                                          `bln_ket`,
                                                          `thn_blangkoO08`,
                                                          `no`,
                                                          `no_rata`,
                                                          `limpasH`,
                                                          `limpasQ`,
                                                          `irigasiKNH`,
                                                          `irigasiKNQ`,
                                                          `irigasiKRH`,
                                                          `irigasiKRQ`,
                                                          `totalDebit`)
                                                  VALUES('$_POST[id_b08O]',
                                                          '$_SESSION[idadmin]',
                                                          '$_POST[tgl_blangkoO08]',
                                                          '$_POST[menu_utama1]',
                                                          '$_POST[bln_blangkoO08]',
                                                          '$_POST[menu_utama2]',
                                                          '$_POST[menu_utama3]',
                                                          '$_POST[no]',
                                                          '$_POST[no_rata]',
                                                          '$_POST[limpasH]',
                                                            SQRT(limpasH*limpasH*limpasH)*'$_SESSION[Llimpas]'*'$_SESSION[Lirigasi]',
                                                          '$_POST[irigasiKNH]',
                                                            SQRT(irigasiKNH*irigasiKNH*irigasiKNH)*'$_SESSION[Llimpas]'*'$_SESSION[Lirigasi]',
                                                          '$_POST[irigasiKRH]',
                                                             SQRT(irigasiKRH*irigasiKRH*irigasiKRH)*'$_SESSION[Llimpas]'*'$_SESSION[Lirigasi]',
                                                            limpasQ+irigasiKNQ+irigasiKRQ)");
                                                      
  header('location:../../media.php?module='.$module);
}

// Update blangko / debit
elseif ($module=='blangkoO08' AND $act=='update'){
    mysql_query("UPDATE blangko08 SET `id_b08O` = '$_POST[id_b08O]',
                                      `id_admin` = '$_POST[id_admin]',
                                      `tgl_blangkoO08` = '$_POST[tgl_blangkoO08]',
                                      `tgl_ket` = '$_POST[tgl_ket]',
                                      `bln_blangkoO08` = '$_POST[bln_blangkoO08]',
                                      `bln_ket` = '$_POST[bln_ket]',
                                      `thn_blangkoO08` = '$_POST[thn_blangkoO08]',
                                      `no` = '$_POST[no]',
                                      `no_rata` = '$_POST[no_rata]',
                                      `limpasH` = '$_POST[limpasH]',
                                      `limpasQ` = SQRT(limpasH*limpasH*limpasH)*'$_SESSION[Llimpas]'*'$_SESSION[Lirigasi]',
                                      `irigasiKNH` = '$_POST[irigasiKNH]',
                                      `irigasiKNQ` = SQRT(irigasiKNH*irigasiKNH*irigasiKNH)*'$_SESSION[Llimpas]'*'$_SESSION[Lirigasi]',
                                      `irigasiKRH` = '$_POST[irigasiKRH]',
                                      `irigasiKRQ` = SQRT(irigasiKRH*irigasiKRH*irigasiKRH)*'$_SESSION[Llimpas]'*'$_SESSION[Lirigasi]',
                                      `totalDebit` = limpasQ+irigasiKNQ+irigasiKRQ                  
                             WHERE id_blangkoO08   = '$_POST[id_blangkoO08]'");
  header('location:../../media.php?module='.$module);
}
}
?>
