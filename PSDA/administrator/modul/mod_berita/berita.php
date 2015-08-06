<?php    
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET[act]){
  // Tampil Berita
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white;  padding-top:9px; text-align:left;'><i class='icon-pencil icon-white'></i> Berita</div></li>
</ul>
</div>
</div>
</div>
        <h6><input type=button value='Tambah Berita' onclick=\"window.location.href='?module=berita&act=tambahberita';\" class='btn btn-success'>  <div class='pull-right'>
          <form method=get action='$_SERVER[PHP_SELF]' id=paging>
          <input type=hidden name=module value=berita>
          <div class='input-append'><input type=text name='kata' id='appendedInputButton' placeholder='Masukan Judul Berita...'> <button type=submit class='btn btn-primary'><i class='icon-search icon-white'></i> Cari</button></div>
         </form> </div>";

    if (empty($_GET['kata'])){
    echo "<table class='table table-condensed' width=100%>
          <thead><tr><th>No</th><th>Judul</th><th>Tanggal Posting</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM berita 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tbody><tr><td>$no</td>
                <td width=60%>$r[judul]</td>
                <td>$tgl_posting</td>
		        <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=berita&act=editberita&id=$r[id_berita]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=berita&act=hapus&id=$r[id_berita]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
				</tr></tbody>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br></h6></div>";
 
    break;    
    }
    else{
    echo "<table class='table table-condensed' width=100%>  
          <tr><th>No</th><th>Judul</th><th>Tanggal posting</th><th></th></tr>";

    $p      = new Paging9;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM berita WHERE judul LIKE '%$_GET[kata]%' ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM berita 
                           WHERE username='$_SESSION[namauser]'
                           AND judul LIKE '%$_GET[kata]%'       
                           ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td width=60%>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=berita&act=editberita&id=$r[id_berita]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=berita&act=hapus&id=$r[id_berita]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE judul LIKE '%$_GET[kata]%'"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE username='$_SESSION[namauser]' AND judul LIKE '%$_GET[kata]%'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";
 
    break;    
    }

  
  case "tambahberita":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white;  padding-top:9px; text-align:left;'><i class='icon-pencil icon-white'></i> Tambah Berita</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data'>
		  <div class='row-fluid'>
			<div class='span3'>
			<label>Judul</Label>
			<input type=text name='judul' class='span12'>
			<label>Kategori</label>
          <select name='kategori' class='span12'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select>
	<label>Headline</label>
	<input type=radio name='headline' value='Y' checked>Y  <input type=radio name='headline' value='N'> N 
    <h6>(Apabila berita ada gambarnya dan ingin dijadikan headline, pilih Headline = Y)</h6>
	<label>Gambar</label>
	<input type=file name='fupload'>
	<h6>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</h6>
	</div>";
    echo "<div class='span9'>
		  <label>Isi Berita</label>
		  <textarea name='isi_berita' id='loko' style='width: 600px; height: 350px;'></textarea>
		  ";
		     $tag = mysql_query("SELECT * FROM tag ORDER BY tag_seo");
    echo "Tag | ";
    while ($t=mysql_fetch_array($tag)){
      echo "<input type=checkbox value='$t[tag_seo]' name=tag_seo[] class='checkbox'> $t[nama_tag] ";
    }
		  echo"
		  </div>
		  <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
        
		  </div>
		  </form>
		  </div>";
     break;
    
    
  case "editberita":
    if ($_SESSION[leveluser]=='admin'){
      $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
    }
    else{
      $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]' AND username='$_SESSION[namauser]'");
    }

    $r    = mysql_fetch_array($edit);

    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white;  padding-top:9px; text-align:left;'><i class='icon-pencil icon-white'></i> Edit Berita</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=berita&act=update>
          <input type=hidden name=id value=$r[id_berita]>
		  <div class='row-fluid'>
			<div class='span3'>
			<label>Judul</Label>
			<input type=text name='judul' class='span12' value='$r[judul]'>
			<label>Kategori</label>
          <select name='kategori' class='span12'>
            <option value=0 selected>- Pilih Kategori -</option>";
			 $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
			echo"</select>";
			   if ($r[headline]=='Y'){
      echo "<label>Headline</label><input type=radio name='headline' value='Y' checked>Y  
                                        <input type=radio name='headline' value='N'> N";
    }
    else{
      echo "<label>Headline</label><input type=radio name='headline' value='Y'>Y  
                                        <input type=radio name='headline' value='N' checked>N";
    }
			echo"<label>Gambar</label>";
			if ($r[gambar]!=''){
              echo "<img src='../foto_berita/small_$r[gambar]'>";  
			}echo"<p></p>
			<input type=file name='fupload'>
			<h6>*) Apabila gambar tidak diubah, dikosongkan saja.</h6>
			</div>
			<div class='span9'>
			Isi Berita</td>   <td> <textarea id='loko' name='isi_berita' style='width: 600px; height: 350px;'>$r[isi_berita]</textarea>";
			$d = GetCheckboxes ('tag', 'tag_seo', 'nama_tag', $r[tag]);
			echo"Tag | $d </div><div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
        </div>";          
    echo  "</form></div>";
    break;  
}

}
?>
