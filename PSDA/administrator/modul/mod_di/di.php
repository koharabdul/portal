<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_di/aksi_di.php";
switch($_GET[act]){
  // Tampil Foto Bendunan
  default:
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Daerah Irigasi</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Daerah Irigasi' onclick=location.href='?module=di&act=tambahdi' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Daerah Irigasi</th><th>No. Kode DI</th><th>Sungai</th><th>Ranting/Pengamat/UPTD</th><th>Total Luas Sawah</th><th>Jumlah Petak Tersier</th><th>Total Luas Wilayah</th><th>Kabupaten</th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT `nm_di`,`nr_di`,`sungai`,`rantingpengamat`.`nm_rantingpengamat`,`tot_sawah`,`jum_petaktersier`,`tot_luaswilayah`,`kab`,`id_di` FROM `di`,`rantingpengamat` WHERE `di`.`id_rantingpengamat`=`rantingpengamat`.`id_rantingpengamat` ORDER BY nm_di ASC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tbody><tr><td>$no</td>
                <td>$r[nm_di]</td>
                <td>$r[nr_di]</td>
                <td>$r[sungai]</td>
                <td>$r[nm_rantingpengamat]</td>
                <td>$r[tot_sawah]</td>
                <td>$r[jum_petaktersier]</td>
                <td>$r[tot_luaswilayah]</td>
                <td>$r[kab]</td>
        <td><div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-pencil icon-white'></i></button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
    <li><a href=?module=di&act=editdi&id_di=$r[id_di]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=di&act=hapus&id_di=$r[id_di]&namafile=$r[foto_bendungan]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
            </tr></tbody>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM di"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
 
    break;
  
  case "tambahdi":
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Tambah Daerah Irigasi</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=di&act=input' enctype='multipart/form-data'>
      <div class='row-fluid'>
      <div class='span12'>
      <label>Daerah Irigasi</label>
      <input type=text name='nm_di' class='span12' placeholder='Daerah Irigasi...'>
      <label>No. Kode DI</label>
      <input type=text name='nr_di' class='span12' placeholder='Nomor Kode Daerah Irigasi...'>
      <label>Bentuk Bendung</label>
      <select name='menu_utama1' class='span12'>
            <option value=0 selected>- Pilih Menu Utama -</option>
      ";
      $tampil=mysql_query("SELECT * FROM bentukbendung ORDER BY nm_bentukbendung");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_bentukbendung]>$r[nm_bentukbendung]</option>";
            }
      echo"</select>
      <label>Sungai</label>
      <input type=text name='sungai' class='span12' placeholder='Sungai...'>
      <label>Ranting/Pengamat/UPTD</label>
      <select name='menu_utama2' class='span12'>
            <option value=0 selected>- Pilih Menu Utama -</option>
      ";
      $tampil=mysql_query("SELECT * FROM rantingpengamat ORDER BY nm_rantingpengamat");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_rantingpengamat]>$r[nm_rantingpengamat]</option>";
            }
      echo"</select>
      <label>Total Luas Sawah</label>
      <input type=text name='tot_sawah' class='span12' placeholder='Total Luas Sawah Daerah Irigasi...'>
      <label>Jumlah Petak Tersier</label>
      <input type=text name='jum_petaktersier' class='span12' placeholder='Jumlah Petak Tersier Daerah Irigasi...'>
      <label>Total Luas Wilayah</label>
      <input type=text name='tot_luaswilayah' class='span12' placeholder='Total Luas Wilayah Mantri/Juru...'>
      <label>Kabupaten</label>
      <input type=text name='kab' class='span12' placeholder='Kabupaten...'>
      <label>Lebar Limpas</label>
      <input type=text name='lebarlimpas' class='span12' placeholder='Lebar Limpas...'>
      <label>Lebar Irigasi</label>
      <input type=text name='lebaririgasi' class='span12' placeholder='Lebar Irigasi...'>
      <label>Foto Bendung</label><input type=file name='fupload' size=40> 
                                          <h6>Tipe gambar harus JPG/JPEG</h6>
                      </div>
      
          
         <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
      </div></form></div>";
     break;
    
  case "editdi":
    $edit = mysql_query("SELECT * FROM di WHERE id_di='$_GET[id_di]'");
    $r    = mysql_fetch_array($edit);
echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Edit Daerah Irigasi</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=di&act=update' enctype='multipart/form-data'>
                <input type=hidden name=id_di value=$r[id_di]>
      <div class='row-fluid'>
      <div class='span12'>
      <label>Daerah Irigasi</label>
      <input type=text name='nm_di' class='span12' value='$r[nm_di]'>
      <label>No. Kode DI</label>
      <input type=text name='nr_di' class='span12' value=$r[nr_di]>
      <label>Bentuk Bendung</label>
      <select name='menu_utama1' class='span12'>
            
      ";
      $tampil=mysql_query("SELECT * FROM bentukbendung ORDER BY nm_bentukbendung");
          if ($r[id_bentukbendung]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_bentukbendung]==$w[id_bentukbendung]){
              echo "<option value=$w[id_bentukbendung] selected>$w[nm_bentukbendung]</option>";
            }
            else{
              echo "<option value=$w[id_bentukbendung]>$w[nm_bentukbendung]</option>";
            }
          }
      echo"</select>
      <label>Sungai</label>
      <input type=text name='sungai' class='span12' value='$r[sungai]'>
      <label>Ranting/Pengamat/UPTD</label>
      <select name='menu_utama2' class='span12'>
            
      ";
      $tampil=mysql_query("SELECT * FROM rantingpengamat ORDER BY nm_rantingpengamat");
          if ($r[id_rantingpengamat]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_rantingpengamat]==$w[id_rantingpengamat]){
              echo "<option value=$w[id_rantingpengamat] selected>$w[nm_rantingpengamat]</option>";
            }
            else{
              echo "<option value=$w[id_rantingpengamat]>$w[nm_rantingpengamat]</option>";
            }
          }
      echo"</select>
      <label>Total Luas Sawah</label>
      <input type=text name='tot_sawah' class='span12' value='$r[tot_sawah]'>
      <label>Jumlah Petak Tersier</label>
      <input type=text name='jum_petaktersier' class='span12' value='$r[jum_petaktersier]'>
      <label>Total Luas Wilayah</label>
      <input type=text name='tot_luaswilayah' class='span12' value='$r[tot_luaswilayah]'>
      <label>Kabupaten</label>
      <input type=text name='kab' class='span12' value='$r[kab]'>
      <label>Lebar Limpas</label>
      <input type=text name='lebarlimpas' class='span12' value='$r[lebarlimpas]'>
      <label>Lebar Irigasi</label>
      <input type=text name='lebaririgasi' class='span12' value='$r[lebaririgasi]'>
      <label>Gambar</label>";
            if ($r[foto_bendungan]!=''){
              echo "<img src='../images/kecil_$r[foto_bendungan]'><p></p>";  
          }
  echo"<input type=file name='fupload' size=40> 
                                          <h6>*) Apabila gambar tidak diubah, dikosongkan saja</h6>
                      </div>
      
          
         <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          
      </div></form></div>";
    break;  
}
}
?>
