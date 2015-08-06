<?php
include "../config/koneksi.php";
if ($_SESSION['leveluser']=='admin'){
  $sql=mysql_query("select * from modul where aktif='Y' order by urutan");
  if ($m=mysql_fetch_array($sql)){  
    echo "
	  <div class='navbar navbar-inverse navbar-fixed-top'>
	  <div class='navbar-inner'>
<div class='container'>
<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </a>
<a class='brand' href=?module=home >SUP Rancaekek</a>
<div class='nav-collapse collapse'>
	<ul class='nav'>
	<li class='dropdown active'><a href=?module=home class='dropdown-toggle' data-toggle='dropdown'><i class='icon-home icon-white'></i> Home</a>
		<ul class='dropdown-menu'>
			<li><a href=?module=berita><i class='icon-pencil icon'></i> Berita</a></li>
			<li><a href=?module=komentar><i class='icon-comment icon'></i> Komentar</a></li>
			<li><a href=?module=kategori><i class='icon-font icon'></i> Ketegori</a></li>
			<li><a href=?module=tag><i class='icon-tag icon'></i> Tag</a></li>
			<li><a href=?module=agenda><i class='icon-calendar icon'></i> Agenda</a></li>
			<li><a href=?module=shoutbox ><i class='icon-heart icon'></i> ShoutBox</a></li>
			<li><a href=?module=fitur ><i class='icon-heart icon'></i> Fitur</a></li>
			<li><a href=?module=design ><i class='icon-heart icon'></i> design</a></li>
			<li><a href=?module=slider ><i class='icon-heart icon'></i> Slider</a></li>
			
			
		</ul>
	</li>
	<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-user icon-white'></i> Users</a>
		<ul class='dropdown-menu'>
			<li><a href=?module=user&act=tambahuser><i class='icon-plus icon'></i> Tambah Pengguna Baru</a></li>
			<li><a href=?module=user><i class='icon-user icon'></i> Semua Pengguna</a></li>
		</ul>
	</li>
	<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-th icon-white'></i> Media</a>
		<ul class='dropdown-menu'>
			<li><a href=?module=download><i class='icon-folder-open icon'></i> File Manager</a></li>
			<li><a href=?module=galerifoto><i class='icon-film icon'></i> Gallery</a></li>
			<li><a href=?module=banner><i class='icon-share icon'></i> Banner</a></li>
			<li><a href=?module=poling><i class='icon-th-list icon'></i> Polling</a></li>
			<li><a href=?module=album><i class='icon-camera icon'></i> Album</a></li>
			<li><a href=?module=sekilasinfo><i class='icon-briefcase icon'></i> Sekilas Info</a></li>
		</ul>
	</li>
		<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-picture icon-white'></i> Tampilan</a>
		<ul class='dropdown-menu'>
		   <li><a href=?module=templates><i class='icon-fire icon'></i> Tampilan</a></li>
			<li><a href=?module=menuutama><i class='icon-list icon'></i> Menu Utama</a></li>
			<li><a href=?module=submenu><i class='icon-list-alt icon'></i> Sub Menu</a></li>
			<li><a href=?module=halamanstatis ><i class='icon-eye-open icon'></i>Halaman Statis</a></li>
		</ul>
	</li>
	<li><a href=?module=hubungi ><i class='icon-envelope icon-white'></i> Hubungi</a></li>
		<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-wrench icon-white'></i> Pengaturan</a>
		<ul class='dropdown-menu'>
			<li><a href=?module=katajelek ><i class='icon-remove icon'></i> Kata Jelek</a></li>
			<li><a href=?module=identitas ><i class='icon-globe icon'></i> Identitas</a></li>
			<li><a href=?module=modul ><i class='icon-th-large icon'></i> Modul</a></li>
			<li><a href=?module=jabatan><i class='icon-list-alt icon'></i> Jabatan</a></li>
			<li><a href=?module=rantingpengamat><i class='icon-list-alt icon'></i> Ranting Pengamat</a></li>
			<li><a href=?module=bentukbendung><i class='icon-list-alt icon'></i> Bentuk Bendung</a></li>
			<li><a href=?module=di><i class='icon-list-alt icon'></i> Daerah Irigasi</a></li>
			<li><a href=?module=personil><i class='icon-list-alt icon'></i> Personil</a></li>
			<li><a href=?module=admin><i class='icon-user icon'></i> Manipulasi User</a></li>
			<li><a href=?module=pencarian ><i class='icon-th-large icon'></i> Pencarian</a></li>
		</ul>
	</li>
</ul>
<div class='btn-group dropdown pull-right'>

  <button class='btn btn-primary'><i class='icon-user icon-white'></i>$_SESSION[namalengkap]</button>  
  <button class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>

  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=user><i class='icon-user icon'></i> Edit User</a></li>
		<li class='divider'></li>
    <li><a href=logout.php><i class='icon-off icon'></i> Logout</a></li>

  </ul>
</div>
</div>
</div>
</div>
</div>";
  }
}
elseif ($_SESSION['leveluser']=='debit'){
  $sql=mysql_query("select * from modul where status='debit' and aktif='Y' order by urutan"); 
  if ($m=mysql_fetch_array($sql)){  
    echo "
		  <div class='navbar navbar-inverse navbar-fixed-top'>
	  <div class='navbar-inner'>
<div class='container'>
<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </a>
<a class='brand' href=?module=home >SUP Rancaekek</a>
<div class='nav-collapse collapse'>
	<ul class='nav'>

			<li><a href=?module=berita><i class='icon-pencil icon-white'></i> Berita</a></li>
			<li><a href=?module=blangkoO08><i class='icon-calendar icon-white'></i> Debit Harian</a></li>
			<li><a href=?module=debit><i class='icon-calendar icon-white'></i> Debit</a></li>

</ul>
<div class='btn-group dropdown pull-right'>
  <button class='btn btn-primary'><i class='icon-user icon-white'></i> $_SESSION[namalengkap]</button>
  <button class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=admin><i class='icon-user icon'></i> Edit User</a></li>
		<li class='divider'></li>
    <li><a href=logout.php><i class='icon-off icon'></i> Logout</a></li>

  </ul>
</div>
</div>
</div>
</div>
</div>
";
  }
} 
?>
