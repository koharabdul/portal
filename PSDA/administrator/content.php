<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin'){

		echo"<div class='well'><h4>Selamat Datang</h4>
          <h6><p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Administrator SUP Rancaekek. 
          Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website. </p></h6>
		
		<div class='row-fluid'> <ul class='thumbnails example-sites'>
  <li class='span6'><div class='form-signin'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-comment icon-white'></i> Komentar terbaru</div></li>
</ul>
</div>
</div>
</div>
	<h6><table class='table ' witdh=100%>
          <tr><th>No</th><th>Nama</th><th>Komentar</th></tr>";
    $tampil=mysql_query("SELECT * FROM komentar ORDER BY id_komentar DESC LIMIT 3");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[nama_komentar]</td>
                <td>$r[isi_komentar]</td>
		        </tr>";
      $no++;
    }
    echo "
	</table></h6><p align=right><a href=?module=komentar class='btn btn-primary'>lihat semua <i class='icon-tasks icon-white'></i></a></p></div></li>";
		echo"	<li class='span6'><div class='form-signin'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>

<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-heart icon-white'></i> Shoutbox terbaru</div></li>
</ul>

</div>
</div>
</div>
	  <h6><table class='table' width=100%>
    <tr><th>No</th><th>Nama</th><th>Pesan</th></tr>";
    $tampil=mysql_query("SELECT * FROM shoutbox ORDER BY id_shoutbox DESC LIMIT 3");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td>$r[pesan]</td>
		        </tr>";
      $no++;
    }
    echo "
	</table></h6><p align=right><a href=?module=shoutbox class='btn btn-primary'>lihat semua <i class='icon-tasks icon-white'></i></a></p></div></li>";	
		//echo"<p align=right>Login : $hari_ini, ";
  //echo tgl_indo(date("Y m d")); 
  //echo " | "; 
  //echo date("H:i:s"); 
  //echo " WIB</p>";
  echo "
  </ul>
  </div>
  <h6><p align=right>Login : $hari_ini,";
echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p></h6></div>";
  }
  elseif ($_SESSION['leveluser']=='debit'){
  echo "<div class='well'><h3>Selamat Datang</h3>
          <p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Administrator SUP Rancaekek.<br> 
          Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website. </p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
         <h6><p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p></h6></div>";
 	}
}

// Bagian User
elseif ($_GET['module']=='profil'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profil/profil.php";
  }
}

//Bagian User
elseif ($_GET['module']=='user'){
 if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='debit'){
   include "modul/mod_users/users.php";
 }
}

// Bagian Modul
elseif ($_GET['module']=='modul'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_modul/modul.php";
  }
}

// Bagian Kategori
elseif ($_GET['module']=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Berita
elseif ($_GET['module']=='berita'){
if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='debit'){
    include "modul/mod_berita/berita.php";                            
}
}

// Bagian Komentar Berita
elseif ($_GET['module']=='komentar'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_komentar/komentar.php";
  }
}

// Bagian Tag
elseif ($_GET['module']=='tag'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tag/tag.php";
  }
}

// Bagian Agenda
elseif ($_GET['module']=='agenda'){
if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='debit'){
include "modul/mod_agenda/agenda.php";
}
}

// Bagian Banner
elseif ($_GET['module']=='banner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_banner/banner.php";
  }
}

// Bagian Poling
elseif ($_GET['module']=='poling'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_poling/poling.php";
  }
}

// Bagian Download
elseif ($_GET['module']=='download'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_download/download.php";
  }
}

// Bagian Hubungi Kami
elseif ($_GET['module']=='hubungi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Templates
elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_templates/templates.php";
  }
}

// Bagian Shoutbox
elseif ($_GET['module']=='shoutbox'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_shoutbox/shoutbox.php";
  }
}

// Bagian Album
elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri Foto
elseif ($_GET['module']=='galerifoto'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_galerifoto/galerifoto.php";
  }
}

// Bagian Kata Jelek
elseif ($_GET['module']=='katajelek'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_katajelek/katajelek.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Menu Utama
elseif ($_GET['module']=='menuutama'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_menuutama/menuutama.php";
  }
}

// Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_submenu/submenu.php";
  }
}

// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Identitas Website
elseif ($_GET['module']=='identitas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_identitas/identitas.php";
  }
}

// Bagian Fitur Website
elseif ($_GET['module']=='fitur'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_fitur/fitur.php";
  }
}

// Bagian design Website
elseif ($_GET['module']=='design'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_design/design.php";
  }
}

// Bagian slider Website
elseif ($_GET['module']=='slider'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_slider/fitur.php";
  }
}

// Bagian jabatan Website
elseif ($_GET['module']=='jabatan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_jabatan/jabatan.php";
  }
}

// Bagian Ranting Pengamat Website
elseif ($_GET['module']=='rantingpengamat'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_rantingpengamat/rantingpengamat.php";
  }
}

// Bagian Rumus Bentuk Bendung
elseif ($_GET['module']=='bentukbendung'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_bentukbendung/bentukbendung.php";
  }
}

// Bagian Daerah Irigasi
elseif ($_GET['module']=='di'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_di/di.php";
  }
}

elseif ($_GET['module']=='personil'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_personil/personil.php";
  }
}

elseif ($_GET['module']=='admin'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_admin/admin.php";
  }
}

elseif ($_GET['module']=='debit'){
  if ($_SESSION['leveluser']=='debit'){
    include "modul/mod_debit/debit.php";
  }
}

elseif ($_GET['module']=='pencarian'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_pencarian/pencarian.php";
  }
}

// Bagian Berita
elseif ($_GET['module']=='blangkoO08'){
if ($_SESSION['leveluser']=='debit'){
    include "modul/mod_blangkoO08/blangkoO08.php";                            
}
}


// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
