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

$module=$_GET[module];
$act=$_GET[act];

// Hapus Daerah Irigasi
if ($module=='di' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT `foto_bendungan` FROM `di` WHERE `id_di`='$_GET[id_di]'"));
  if ($data['foto_bendungan']!=''){
    mysql_query("DELETE FROM `di` WHERE `id_di`='$_GET[id_di]'");
    unlink("../../../images/$_GET[namafile]");   
    unlink("../../../images/kecil_$_GET[namafile]");
  }
  else{
    mysql_query("DELETE FROM `di` WHERE `id_di`='$_GET[id_di]'");  
  }   
  header('location:../../media.php?module='.$module);
}

// Input Daerah Iigasi
elseif ($module=='di' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
 

  // Apabila ada foto bendungan yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=di')</script>";
    }

    else{
    UploadGambarFitur($nama_file_unik);
    mysql_query("INSERT INTO di(nm_di,
                                    nr_di,
                                    id_bentukbendung,
                                    sungai,
                                    id_rantingpengamat,
                                    tot_sawah,
                                    jum_petaktersier,
                                    tot_luaswilayah,
                                    kab,
                                    lebarlimpas,
                                    lebaririgasi,
                                    foto_bendungan) 
                            VALUES('$_POST[nm_di]',
                                   '$_POST[nr_di]',
                                   '$_POST[menu_utama1]',
                                   '$_POST[sungai]',
                                   '$_POST[menu_utama2]',
                                   '$_POST[tot_sawah]',
                                   '$_POST[jum_petaktersier]',
                                   '$_POST[tot_luaswilayah]',
                                   '$_POST[kab]',
                                   '$_POST[lebarlimpas]',
                                   '$_POST[lebaririgasi]',
                                   '$nama_file_unik')");
    echo "$_POST[nm_di] $_POST[nr_di] $_POST[id_bentukbendung] $_POST[sungai] $_POST[id_rantingpengamat]  $_POST[tot_sawah] $_POST[jum_petaktersier] $_POST[tot_luaswilayah] $_POST[kab] $_POST[lebarlimpas] $_POST[lebaririgasi] $nama_file_unik";
    header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO di(nm_di,
                                    nr_di,
                                    id_bentukbendung,
                                    sungai,
                                    id_rantingpengamat,
                                    tot_sawah,
                                    jum_petaktersier,
                                    tot_luaswilayah,
                                    kab,
                                    lebarlimpas,
                                    lebaririgasi) 
                            VALUES('$_POST[nm_di]',
                                   '$_POST[nr_di]',
                                   '$_POST[menu_utama1]',
                                   '$_POST[sungai]',
                                   '$_POST[menu_utama2]',
                                   '$_POST[tot_sawah]',
                                   '$_POST[jum_petaktersier]',
                                   '$_POST[tot_luaswilayah]',
                                   '$_POST[kab]',
                                   '$_POST[lebarlimpas]',
                                   '$_POST[lebaririgasi]')");
    header('location:../../media.php?module='.$module);
  }
}

// Update Daerah Irigasi
elseif ($module=='di' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  //$gallery_seo      = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE di SET nm_di  = '$_POST[nm_di]',
                               nr_di  = '$_POST[nr_di]',
                               id_bentukbendung = '$_POST[menu_utama1]',
                               sungai = '$_POST[sungai]',
                               id_rantingpengamat = '$_POST[menu_utama2]',
                               tot_sawah = '$_POST[tot_sawah]',
                               jum_petaktersier = '$_POST[jum_petaktersier]',
                               tot_luaswilayah = '$_POST[tot_luaswilayah]',
                               kab = '$_POST[kab]',
                               lebarlimpas = '$_POST[lebarlimpas]',
                               lebaririgasi = '$_POST[lebaririgasi]'
                             WHERE id_di   = '$_POST[id_di]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=di')</script>";
    }
    else{
    UploadGambarFitur($nama_file_unik);
    mysql_query("UPDATE di SET nm_di  = '$_POST[nm_di]',
                               nr_di  = '$_POST[nr_di]',
                               id_bentukbendung = '$_POST[menu_utama1]',
                               sungai = '$_POST[sungai]',
                               id_rantingpengamat = '$_POST[menu_utama2]',
                               tot_sawah = '$_POST[tot_sawah]',
                               jum_petaktersier = '$_POST[jum_petaktersier]',
                               tot_luaswilayah = '$_POST[tot_luaswilayah]',
                               kab = '$_POST[kab]',
                               lebarlimpas = '$_POST[lebarlimpas]',
                               lebaririgasi = '$_POST[lebaririgasi]',
                               foto_bendungan = '$nama_file_unik'   
                             WHERE id_di = '$_POST[id_di]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
