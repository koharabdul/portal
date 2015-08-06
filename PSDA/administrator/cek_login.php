<?php
include "../config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  header('location:index.php?msg=1');
}
else{
$login=mysql_query("SELECT * FROM admin,personil,di,rantingpengamat,jabatan,bentukbendung WHERE `admin`.`id_admin` = `personil`.`id_personil` AND `personil`.`id_jabatan`=`jabatan`.`id_jabatan` AND `personil`.`id_di` = `di`.`id_di` AND `di`.`id_rantingpengamat` = `rantingpengamat`.`id_rantingpengamat` AND `di`.`id_bentukbendung` = `bentukbendung`.`id_bentukbendung` AND username='$username' AND `password`='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";

  $_SESSION['KCFINDER']=array();
  $_SESSION['KCFINDER']['disabled'] = false;
  $_SESSION['KCFINDER']['uploadURL'] = "../tinymcpuk/gambar";
  $_SESSION['KCFINDER']['uploadDir'] = "";

  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nm_personil];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[status];
  $_SESSION[rantingpengamat]    = $r[nm_rantingpengamat];
  $_SESSION[daerahirigasi]    = $r[nm_di];
  $_SESSION[limpassungai]    = $r[sungai];
  $_SESSION[totalirigasi]    = $r[tot_luaswilayah];
  $_SESSION[kabupaten]    = $r[kab];
  $_SESSION[bagpelaksana]    = $r[nm_jabatan];
  $_SESSION[totalsawah]    = $r[tot_sawah];
  $_SESSION[idadmin]    = $r[id_admin];
  $_SESSION[idpersonil]    = $r[id_personil];
  $_SESSION[idjabatan]    = $r[id_jabatan];
  $_SESSION[idrantingpengamat]    = $r[id_rantingpengamat];
  $_SESSION[rumushitL]    = $r[rumushitunganL];
  $_SESSION[rumushitM]    = $r[rumushitunganM];
  $_SESSION[Llimpas]    = $r[lebarlimpas];
  $_SESSION[Lirigasi]    = $r[lebaririgasi];

 

  
  
  // session timeout
  $_SESSION[login] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE admin SET id_session='$sid_baru' WHERE username='$username'");
  header('location:media.php?module=home');
}
else{
  header('location:index.php?msg=2');
}
}
?>
