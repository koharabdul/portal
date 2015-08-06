<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_blangkoO08/aksi_blangkoO08.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
  ";
          $foto = mysql_query("SELECT * FROM personil WHERE id_personil='$_SESSION[idpersonil]'");
          $r    = mysql_fetch_array($foto);
            echo "<div class='well'><table width=100% height=102 border=0>
          <tr><td width=87%><h3>Selamat Datang</h3>
          <p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman website SUP Rancaekek.<br> 
          Silahkan isi debit air irigasi anda dengan rutin dan benar untuk mengetahui neraca air pertahun. </p></td><td width=13% align=center valign=top >";
            if ($r[foto_personil]!=''){
              echo "<table border=4 bordercolor=#CCCCCC><tr><td><a href=#><img src='../images/kecil_$r[foto_personil]' ></a></tr></td></table>";  
          }
  echo"</td>
          </tr></table>
          

        <table width=95% align=left border=0>
  <tr>
    <td colspan=10 align=center><b>PENCATATAN DEBIT BANGUNGN PENGAMBILAN / <br>
    PENCATATAN DEBIT SUNGAI  </b></td>
    
  </tr>
  <tr>
  
  <td colspan=8>&nbsp;</td>
  <td colspan=2><table border=1 bordercolor=#CCCCCC align=right><tr><td><b>Blangko 08 - O </b></tr></td></table></td>
  </tr>
  <tr>
    <td width=25% height=40>Sugai</td>
  <td>:</td>
    <td colspan=2 ><input name=limpas type = text class=span2 style=margin:inherit value='$_SESSION[limpassungai]' readonly></td>
    <td width=24% ></td>
  <td></td>
    <td>Kabupaten</td>
    <td align=right>:</td>
     <td><input name=kab type = text class=span2 style=margin:inherit value='$_SESSION[kabupaten]' readonly/></td>
      <td>&nbsp;</td>

  
  </tr>
  <tr>
    <td height=40>Bendung</td>
  <td>:</td>
    <td colspan=2><input name=irigasi type = text class=span2 style=margin:inherit value='$_SESSION[daerahirigasi]' readonly/></td>
    <td ></td>
  <td></td>
    <td>Ranting/Pengamat</td>
    <td align=right>:</td>
     <td><input name=rantingpengamat type = text class=span2 style=margin:inherit value='$_SESSION[rantingpengamat]' readonly/></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=40>Daerah Irigasi </td>
  <td>:</td>
    <td colspan=2><input name=daerahirigasi type = text class=span2 style=margin:inherit value='$_SESSION[daerahirigasi]' readonly/></td>
    <td ></td>
  <td></td>
    <td>Bag. Pelaks. Kegiatan </td>
  <td align=right>:</td>
     <td><input name=nm_pelaksana type = text class=span2 style=margin:inherit value='$_SESSION[bagpelaksana]'readonly/></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=40>Total Luas Sawah Irigasi </td>
  <td>:</td>
    <td width=15%><input name=tot_sawah type = text class=span2 style=margin:inherit value='$_SESSION[totalsawah]' readonly/></td>
  <td width=8%>ha</td>
    <td >Periode Pengambilan Air Tanggal </td>
  <td>:</td>
  
    <td width=12%>
  
  <select name='menu_utama1' class='span2' style=margin:inherit>
            
    ";
      $tampil=mysql_query("SELECT * FROM tanggal ORDER BY id_tgl");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_tgl]>$r[nm_tgl]</option>";
            }
      echo"</select></td>
  <td width=3% align=right>Bln</td>
  <td width=12%><select name='menu_utama2' class='span2' style=margin:inherit>
            
            
      ";
      $tampil=mysql_query("SELECT * FROM bulan ORDER BY id_bulan");
            while($r=mysql_fetch_array($tampil)){

              echo "<option value=$r[id_bulan]>$r[nm_bulan]</option>";
            }
      echo"</select>
    </td>
  <td width=12%><select name='menu_utama3' class='span1' style=margin:inherit>
            
      ";
      $tampil=mysql_query("SELECT * FROM tahun ORDER BY thn DESC");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_tahun]>$r[thn]</option>";
            }
      echo"</select>
    </td>
  
 
  </tr>
</table>



<table width=95% border=1 align=left bordercolor=#CCCCCC>
  <tr>
    <td width=70 rowspan=3><div align=center>Tanggal</div></td>
    <td colspan=2 rowspan=2><div align=center>Debit Limpas Bendung </div></td>
   
    <td height=24 colspan=4><div align=center>Debit Pintu Masuk Pengambilan </div></td>
    
    <td width=70 rowspan=3><div align=center>Debit Sungai (I/det) </div></td>
  </tr>
  <tr>
    
    <td colspan=2><div align=center>Kanan</div></td>
    
    
    
    <td colspan=2><div align=center>Kiri</div></td>
  </tr>
  <tr>
    
    <td width=120><div align=center>H (cm) </div></td>
    <td width=130><div align=center>Q (I/det) </div></td>
    <td width=125><div align=center>H (cm) </div></td>
    <td width=130><div align=center>Q (I/det) </div></td>
    <td width=120><div align=center>H (cm) </div></td>
    <td width=130><div align=center>Q (I/det)</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name=in_limpas type=text  width=120% class=span2 style=margin:inherit ></td>
    <td>&nbsp;</td>
    <td><input name=in_kanan type=text  width=120% class=span2 style=margin:inherit ></td>
    <td>&nbsp;</td>
    <td><input name=in_kiri type=text  width=120% class=span2 style=margin:inherit></td>
    <td>&nbsp;</td>
    <td ><input type=button value='Tambah' onclick=location.href=\"$aksi?module=blangkoO08&act=input\" class='btn btn-success pull-right' style=margin:inherit style=margin-left:inherit ></td>
  </tr>
</table>
<br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>

<h6>

          <table class='table table-condensed' width=100%>
          <thead><tr><th></th><th></th><th></th><th></th><th></th><th></th></tr></thead>";

    $tampil = mysql_query("SELECT `no`,`limpasH`,`limpasQ`,`irigasiKNH`,`irigasiKNQ`,`irigasiKRH`,`irigasiKRQ`,`totalDebit` FROM `sup_rancaekek`.`blangko08`,`admin`,`personil`,`di`,`jabatan`,`rantingpengamat`,`bentukbendung` WHERE `blangko08`.`id_admin`= `admin`.`id_admin` AND `admin`.`id_admin` = `personil`.`id_personil` AND `personil`.`id_jabatan`=`jabatan`.`id_jabatan` AND `personil`.`id_di` = `di`.`id_di` AND `di`.`id_rantingpengamat` = `rantingpengamat`.`id_rantingpengamat` AND `tgl_ket`='1 s/d 15' AND `bln_ket`='April' AND `thn_blangkoO08`='2015'");
  
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$r[no]</td>
                <td>$r[limpasH]</td>
                <td>$r[limpasQ]</td>
                <td>$r[irigasiKNH]</td>
                <td>$r[irigasiKNQ]</td>
                <td>$r[irigasiKRH]</td>
                <td>$r[irigasiKRQ]</td>
                <td>$r[totalDebit]</td>
            <td>
        <div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
    <li><a href=?module=submenu&act=editsubmenu&id=$r[id_sub]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=submenu&act=hapus&id=$r[id_sub]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
            </tr>";
      
    }
    echo "</table></h6><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
         <h6><p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p></h6></div>
    ";
          
    break;

}
}
?>
