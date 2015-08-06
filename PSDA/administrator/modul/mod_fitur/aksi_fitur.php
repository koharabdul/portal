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
if ($module=='fitur' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM fitur WHERE id='$_GET[id]'"));
  if ($data['gambar']!=''){
    mysql_query("DELETE FROM fitur WHERE id='$_GET[id]'");
    unlink("../../../images/$_GET[namafile]");   
    unlink("../../../images/kecil_$_GET[namafile]");
  }
  else{
    mysql_query("DELETE FROM fitur WHERE id='$_GET[id]'");  
  }   
  header('location:../../media.php?module='.$module);
}

// Input gallery
elseif ($module=='fitur' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
  //$fitur_seo      = seo_title($_POST['judul']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=fitur')</script>";
    }

    else{
    UploadGambarFitur($nama_file_unik);
    mysql_query("INSERT INTO fitur(judul,
                                    deskripsi,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[deskripsi]',
                                   '$nama_file_unik')");
    echo "$_POST[judul] $_POST[deskripsi] $nama_file_unik";
    header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO fitur(judul,
                                    deskripsi) 
                            VALUES('$_POST[judul]',
                                   '$_POST[deskripsi]')");
    header('location:../../media.php?module='.$module);
  }
}

// Update gallery
elseif ($module=='fitur' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  //$gallery_seo      = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE fitur SET judul  = '$_POST[judul]',
                                   deskripsi  = '$_POST[deskripsi]'  
                             WHERE id   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=fitur')</script>";
    }
    else{
    UploadGambarFitur($nama_file_unik);
    mysql_query("UPDATE fitur SET judul  = '$_POST[judul]',
                                   deskripsi = '$_POST[deskripsi]', 
                                   gambar = '$nama_file_unik'   
                             WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
