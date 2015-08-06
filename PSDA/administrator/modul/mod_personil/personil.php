<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_personil/aksi_personil.php";
switch($_GET[act]){
  // Tampil Foto Bendunan
  default:
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Personil</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Personil' onclick=location.href='?module=personil&act=tambahpersonil' class='btn btn-success pull-right'><br />
          <table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Nama Lengkap</th><th>Alamat</th><th>Tanggal Lahir</th><th>Jenis Kelamin</th><th>Pendidikan</th><th>Status Perkawinan</th><th>Daerah Irigasi</th><th>Jabatan</th><th>Masuk Kerja</th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT `nm_personil`,`alamat`,`tgl_lahir`,`jeniskelamin`,`pendidikan`,`stt_perkawinan`,`di`.`nm_di`,`jabatan`.`nm_jabatan`,`masuk_kerja`,`id_personil` FROM `di`,`jabatan`,personil WHERE `personil`.`id_di` = `di`.`id_di` AND `personil`.`id_jabatan` = `jabatan`.`id_jabatan` ORDER BY masuk_kerja ASC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tbody><tr><td>$no</td>
                <td>$r[nm_personil]</td>
                <td>$r[alamat]</td>
                <td>$r[tgl_lahir]</td>
                <td>$r[jeniskelamin]</td>
                <td>$r[pendidikan]</td>
                <td>$r[stt_perkawinan]</td>
                <td>$r[nm_di]</td>
                <td>$r[nm_jabatan]</td>
                <td>$r[masuk_kerja]</td>

        <td><div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-pencil icon-white'></i></button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
    <li><a href=?module=personil&act=editpersonil&id_personil=$r[id_personil]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=personil&act=hapus&id_personil=$r[id_personil]&namafile=$r[foto_personil]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
            </tr></tbody>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM personil"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div></h6></div>";
 
    break;
  
  case "tambahpersonil":
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Tambah Personil</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=personil&act=input' enctype='multipart/form-data'>
      <div class='row-fluid'>
      <div class='span12'>
      <label>Nama Personil</label>
      <input type=text name='nm_personil' class='span12' placeholder='Nama Lengkap...'>
      <label>Alamat</label>
      <textarea name='alamat' class='span12' placeholder='Alamat Lengkap...'></textarea>
      <label>Tanggal Lahir</label>
      <div class='input-append'><input type=text name='tgl_lahir' class='span12' id='mulai' placeholder='Tanggal Lahir...'><span class='add-on'><i class='icon-calendar'></i></span></div>
      </div>
      
      <label>Jenis Kelamin</label>
      <input type=radio name='jeniskelamin' value='Laki-laki'>Laki-laki   
          <input type=radio name='jeniskelamin' value='Perempuan'>Perempuan <br><br>

      <label>Agama</label>
      <select name='menu_utama1' class='span12'>
            <option value=0 selected>- Pilih Menu Utama -</option>
      ";
      $tampil=mysql_query("SELECT * FROM agama ORDER BY id_agama");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_agama]>$r[nm_agama]</option>";
            }
      echo"</select>
      <label>Pendidikan Terakhir</label>
      <input type=text name='pendidikan' class='span12' placeholder='Pendidikan Terakhir...'>

       <label>Status Perkawinan</label>
      <input type=radio name='stt_perkawinan' value='Sudah Nikah'>Sudah Nikah 
          <input type=radio name='stt_perkawinan' value='Belum Menikah'>Belum Nikah <br><br>
      <label>Nomer Handphone</label>
      <input type=text name='nope' class='span12' placeholder='HP/Telephone...'>

      <label>Daerah Irigasi</label>
      <select name='menu_utama2' class='span12'>
            <option value=0 selected>- Pilih Menu Utama -</option>
      ";
      $tampil=mysql_query("SELECT * FROM di ORDER BY nm_di");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_di]>$r[nm_di]</option>";
            }
      echo"</select>

      <label>Jabatan</label>
      <select name='menu_utama3' class='span12'>
            <option value=0 selected>- Pilih Menu Utama -</option>
      ";
      $tampil=mysql_query("SELECT * FROM jabatan ORDER BY id_jabatan");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_jabatan]>$r[nm_jabatan]</option>";
            }
      echo"</select>

      <label>Masuk Kerja</label>
      <div class='input-append'><input type=text name='masuk_kerja' class='span12' id='akhir' placeholder='Masuk Kerja'><span class='add-on'><i class='icon-calendar'></i></span></div>
    
      <label>Foto Personil</label><input type=file name='fupload' size=40> 
                                          <h6>Tipe gambar harus JPG/JPEG</h6>
                               </div>         

                  <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>

      </div></div>";
     break;
    
  case "editpersonil":
    $edit = mysql_query("SELECT * FROM personil WHERE id_personil='$_GET[id_personil]'");
    $r    = mysql_fetch_array($edit);
echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-film icon-white'></i> Edit Personil</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=personil&act=update' enctype='multipart/form-data'>
                <input type=hidden name=id_personil value=$r[id_personil]>
      <div class='row-fluid'>
      <div class='span12'>
      <label>Nama Personil</label>
      <input type=text name='nm_personil' class='span12' value='$r[nm_personil]'>
      <label>Alamat</label>
      <textarea name='alamat' class='span12' rows=2>$r[alamat]</textarea>
      <label>Tanggal Lahir</label>
      <div class='input-append'><input type=text name='tgl_lahir' class='span12' value='$r[tgl_lahir]' id='mulai'><span class='add-on'><i class='icon-calendar'></i></span></div>
      ";
      if ($r[jeniskelamin]=='Laki-laki'){
      echo "<label>Jenis Kelamin</label> <input type=radio name='jeniskelamin' value='Laki-laki' checked>Laki-laki  
                                       <input type=radio name='jeniskelamin' value='Perempuan'> Perempuan<p></p>";
    }
    else{
      echo "<label>Jenis Kelamin</label><input type=radio name='jeniskelamin' value='Laki-laki' >Laki-laki  
                                       <input type=radio name='jeniskelamin' value='Perempuan' checked> Perempuan<p></p>";
    }
    echo "</input>



      <label>Agama</label>
      <select name='menu_utama1' class='span12'>
      ";
      $tampil=mysql_query("SELECT * FROM agama ORDER BY id_agama");
          if ($r[id_agama]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_agama]==$w[id_agama]){
              echo "<option value=$w[id_agama] selected>$w[nm_agama]</option>";
            }
            else{
              echo "<option value=$w[id_agama]>$w[nm_agama]</option>";
            }
          }
      echo"</select>
      <label>Pendidikan Terakhir</label>
      <input type=text name='pendidikan' class='span12' value='$r[pendidikan]'>
      ";
      if ($r[stt_perkawinan]=='Sudah Menikah'){
      echo "<label>Status Perkawinan</label> <input type=radio name='stt_perkawinan' value='Sudah Menikah' checked>Sudah Menikah  
                                       <input type=radio name='stt_perkawinan' value='Belum Menikah'> Belum Menikah<p></p>";
    }
    else{
      echo "<label>Status Perkawinan</label> <input type=radio name='stt_perkawinan' value='Sudah Menikah' >Sudah Menikah  
                                       <input type=radio name='stt_perkawinan' value='Belum Menikah' checked> Belum Menikah<p></p>";
    }
    echo "</input>
     <label>Nomer Handphone/Telephone</label>
      <input type=text name='nope' class='span12' value='$r[nope]'>



      <label>Daerah Irigasi</label>
      <select name='menu_utama2' class='span12'>
            
      ";
      $tampil=mysql_query("SELECT * FROM di ORDER BY nm_di");
          if ($r[id_di]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_di]==$w[id_di]){
              echo "<option value=$w[id_di] selected>$w[nm_di]</option>";
            }
            else{
              echo "<option value=$w[id_di]>$w[nm_di]</option>";
            }
          }
      echo"</select>

      <label>Jabatan</label>
      <select name='menu_utama3' class='span12'>
            
      ";
      $tampil=mysql_query("SELECT * FROM jabatan ORDER BY nm_jabatan");
          if ($r[id_jabatan]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_jabatan]==$w[id_jabatan]){
              echo "<option value=$w[id_jabatan] selected>$w[nm_jabatan]</option>";
            }
            else{
              echo "<option value=$w[id_jabatan]>$w[nm_jabatan]</option>";
            }
          }
      echo"</select>


      <label>Tahun Masuk Kerja</label>
      <div class='input-append'><input type=text name='masuk_kerja' class='span12' value='$r[tgl_lahir]' id='akhir'><span class='add-on'><i class='icon-calendar'></i></span></div>

     
     <label>Gambar</label>";
            if ($r[foto_personil]!=''){
              echo "<img src='../images/kecil_$r[foto_personil]'><p></p>";  
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
