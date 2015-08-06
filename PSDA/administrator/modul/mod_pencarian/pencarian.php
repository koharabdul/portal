<?php    
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_pencarian/aksi_pencarian.php";
switch($_GET[act]){
  // Tampil Berita
  default:
    echo "<div class='well'>
  <div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white;  padding-top:9px; text-align:left;'><i class='icon-pencil icon-white'></i> Personil</div></li>
</ul>
</div>
</div>
</div>
        <h6><input type=button value='Tambah Berita' onclick=\"window.location.href='?module=pencarian';\" class='btn btn-success'>  <div class='pull-right'>
          <form method=get action='$_SERVER[PHP_SELF]' id=paging>
          <input type=text name=module value=pencarian>
          <div class='input-append'><input type=text name='kata' id='appendedInputButton' placeholder='Masukan Nama Personil...'> <button type=submit class='btn btn-primary'><i class='icon-search icon-white'></i> Cari</button></div>
         </form> </div>";

    if (empty($_GET['kata'])){
    echo "<table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Nama Personil</th><th>Alamat</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM personil ORDER BY id_personil DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM personil 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_personil DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tbody><tr><td>$no</td>
                <td width=60%>$r[nm_personil]</td>
                <td>$r[alamat]</td>
            <td>
        <div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
    <li><a href=?module=pencarian&act=editberita&id=$r[id_personil]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=pencarian&act=hapus&id=$r[id_personil]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
        </tr></tbody>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM personil"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM personil WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br></h6></div>";
 
    break;    
    }
    else{
    echo "<table class='table table-condensed' width=100%>  
          <thead><tr><th>No</th><th>Nama Personil</th><th>Alamat</th><th></th></tr></thead>";
    $p      = new Paging9;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM personil WHERE nm_personil LIKE '%$_GET[kata]%' ORDER BY id_personil DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM personil 
                           WHERE username='$_SESSION[namauser]'
                           AND nm_personil LIKE '%$_GET[kata]%'       
                           ORDER BY id_personil DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td width=60%>$r[nm_personil]</td>
                <td>$r[alamat]</td>
                <td>
        <div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
    <li><a href=?module=pencarian&act=editberita&id=$r[id_personil]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=pencarian&act=hapus&id=$r[id_personil]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
            </tr>";
      $no++;
    }
    echo "</table>";

    }

  
  
}

}
?>
