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

// Hapus Personil
if ($module=='personil' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT `foto_personil` FROM `personil` WHERE `id_personil`='$_GET[id_personil]'"));
  if ($data['foto_personil']!=''){
    mysql_query("DELETE FROM `personil` WHERE `id_personil`='$_GET[id_personil]'");
    unlink("../../../images/$_GET[namafile]");   
    unlink("../../../images/kecil_$_GET[namafile]");
  }
  else{
    mysql_query("DELETE FROM `personil` WHERE `id_personil`='$_GET[id_personil]'");  
  }   
  header('location:../../media.php?module='.$module);
}

// Input Personil
elseif ($module=='personil' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
 

  // Apabila ada foto personil yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=personil')</script>";
    }

    else{
    UploadGambarFitur($nama_file_unik);
    mysql_query("INSERT INTO personil(nm_personil,
                                    alamat,
                                    tgl_lahir,
                                    jeniskelamin,
                                    id_agama,
                                    pendidikan,
                                    stt_perkawinan,
                                    nope,
                                    id_di,
                                    id_jabatan,
                                    masuk_kerja,
                                    foto_personil) 
                            VALUES('$_POST[nm_personil]',
                                   '$_POST[alamat]',
                                   '$_POST[tgl_lahir]',
                                   '$_POST[jeniskelamin]',
                                   '$_POST[menu_utama1]',
                                   '$_POST[pendidikan]',
                                   '$_POST[stt_perkawinan]',
                                   '$_POST[nope]',
                                   '$_POST[menu_utama2]',
                                   '$_POST[menu_utama3]',
                                   '$_POST[masuk_kerja]',
                                   '$nama_file_unik')");
    echo "$_POST[nm_personil] $_POST[alamat] $_POST[tgl_lahir] $_POST[jeniskelamin] $_POST[id_agama]  $_POST[pendidikan] $_POST[stt_perkawinan] $_POST[nope] $_POST[id_di] $_POST[id_jabatan] $_POST[masuk_kerja] $nama_file_unik";
    header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO personil(nm_personil,
                                    alamat,
                                    tgl_lahir,
                                    jeniskelamin,
                                    id_agama,
                                    pendidikan,
                                    stt_perkawinan,
                                    nope,
                                    id_di,
                                    id_jabatan,
                                    masuk_kerja) 
                            VALUES('$_POST[nm_personil]',
                                   '$_POST[alamat]',
                                   '$_POST[tgl_lahir]',
                                   '$_POST[jeniskelamin]',
                                   '$_POST[menu_utama1]',
                                   '$_POST[pendidikan]',
                                   '$_POST[stt_perkawinan]',
                                   '$_POST[nope]',
                                   '$_POST[menu_utama2]',
                                   '$_POST[menu_utama3]',
                                   '$_POST[masuk_kerja]')");
    header('location:../../media.php?module='.$module);
  }
}

// Update Personil
elseif ($module=='personil' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  //$gallery_seo      = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE personil SET nm_personil  = '$_POST[nm_personil]',
                               alamat  = '$_POST[alamat]',
                               tgl_lahir = '$_POST[tgl_lahir]',
                               jeniskelamin = '$_POST[jeniskelamin]',
                               id_agama = '$_POST[menu_utama1]',
                               pendidikan = '$_POST[pendidikan]',
                               stt_perkawinan = '$_POST[stt_perkawinan]',
                               nope = '$_POST[nope]',
                               id_di = '$_POST[menu_utama2]',
                               id_jabatan = '$_POST[menu_utama3]',
                               masuk_kerja = '$_POST[masuk_kerja]'
                             WHERE id_personil   = '$_POST[id_personil]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=personil')</script>";
    }
    else{
    UploadGambarFitur($nama_file_unik);
    mysql_query("UPDATE personil SET nm_personil  = '$_POST[nm_personil]',
                               alamat  = '$_POST[alamat]',
                               tgl_lahir = '$_POST[tgl_lahir]',
                               jeniskelamin = '$_POST[jeniskelamin]',
                               id_agama = '$_POST[menu_utama1]',
                               pendidikan = '$_POST[pendidikan]',
                               stt_perkawinan = '$_POST[stt_perkawinan]',
                               nope = '$_POST[nope]',
                               id_di = '$_POST[menu_utama2]',
                               id_jabatan = '$_POST[menu_utama3]',
                               masuk_kerja = '$_POST[masuk_kerja]',
                               foto_personil = '$nama_file_unik'   
                             WHERE id_personil = '$_POST[id_personil]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
