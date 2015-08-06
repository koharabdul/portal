<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_agenda/aksi_agenda.php";
switch($_GET[act]){
  // Tampil Agenda
  default:
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-calendar icon-white'></i> Agenda</div></li>
</ul>
</div>
</div>
</div><h6>
<input type=button value='Tambah Agenda' onclick=location.href='?module=agenda&act=tambahagenda' class='btn btn-success pull-right'><br/>
          <table class='table table-condensed' width=100%>
          <thead><tr align='center'><th>No</th><th>Tema</th><th>Tanggal Mulai</th><th>Tanggal Selesai</th><th >Pukul</th><th></th></tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil=mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM agenda 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_agenda DESC LIMIT $posisi,$batas");
    }

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl_mulai   = tgl_indo($r[tgl_mulai]);
      $tgl_selesai = tgl_indo($r[tgl_selesai]);
      echo "<tbody><tr><td>$no</td>
                <td width=40%>$r[tema]</td>
				<td>$tgl_mulai</td>
                <td>$tgl_selesai</td>
				<td>$r[jam_mulai] s/d $r[jam_akhir] WIB</td>
                <td>
				<div class='btn-group drodown pull-right'>
  <button class='btn btn-info'><i class='icon-ok-circle icon-white'></i> Manipulasi Data</button>
  <button class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
    <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
  	<li><a href=?module=agenda&act=editagenda&id=$r[id_agenda]><i class='icon-pencil icon'></i> Edit Data</a></li>
    <li><a href=\"$aksi?module=agenda&act=hapus&id=$r[id_agenda]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash icon'></i> Hapus Data</a></li>

  </ul>
</div></td>
		        </tr></tbody>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br></h6></div>";

    break;

  
  case "tambahagenda":
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>

<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-calendar icon-white'></i> Tambah Agenda</div></li>
</ul>

</div>
</div>
</div>
          <form method=POST action='$aksi?module=agenda&act=input'>
		  <div class='row-fluid'>
		   <div class='span3'>
		   <label>Tema </label><input type=text name='tema' class='span12' placeholder='Acara...'>
		   <label>Tempat </label>
          <input type=text name='tempat' class='span12' placeholder='Tempat...'>
		  <label>Tanggal Mulai </label>
          <div class='input-append'><input type=text name='mulai' id='mulai'   placeholder='Tanggal mulai...'><span class='add-on'><i class='icon-calendar'></i></span></div>
		  <label>Tanggal Akhir</label>
		  <div class='input-append'><input type=text name='akhir' id='akhir'  placeholder='Tanggal akhir...'><span class='add-on'><i class='icon-calendar'></i></span></div>
		  
		   <label>Pengirim</label>
		  <input type=text name='pengirim' class='span12'>
		  </div>
		  <div class='span9'>
		  <div class='row-fluid'>
			 <div class='span4'>Waktu Mulai<div class='input-append bootstrap-timepicker'><input type=text name='waktu_mulai'  id='waktumulai'  placeholder='Waktu mulai...'><span class='add-on'><i class='icon-time'></i></span></div></div>
			<div class='span4'>Waktu Selesai <div class='input-append bootstrap-timepicker'><input type=text name='waktu_akhir'  id='waktuakhir'  placeholder='Waktu akhir...'><span class='add-on'><i class='icon-time'></i></span></div>
		  </div>
		  </div>
		  <label>Keterangan </label>
          <textarea name='isi_agenda' class='span12' rows='11'></textarea>
		  </div>
           ";        
       
    echo "
         
         <div class='pull-right'><input type=submit value=Simpan class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          </form></div></div>";
    break;
  

  case "editagenda":
    if ($_SESSION[leveluser]=='admin'){
      $edit = mysql_query("SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
    }
    else{
      $edit = mysql_query("SELECT * FROM agenda WHERE id_agenda='$_GET[id]' AND username='$_SESSION[namauser]'");
    }
    
    $r    = mysql_fetch_array($edit);
    echo "<div class='well'>
	<div class='navbar navbar-inverse'>
<div class='navbar-inner'>
<div class='container'>
<ul class='nav'>
<li><div style='color:white; padding-top:9px; text-align:left;'><i class='icon-calendar icon-white'></i> Edit Agenda</div></li>
</ul>
</div>
</div>
</div>
          <form method=POST action='$aksi?module=agenda&act=update'>
		  <input type=hidden name=id value=$r[id_agenda]>
		  <div class='row-fluid'>
		   <div class='span3'>
		   <label>Tema </label><input type=text name='tema' class='span12' value='$r[tema]'>
		   <label>Tempat </label>
          <input type=text name='tempat' class='span12' value='$r[tempat]'>
		  <label>Tanggal Mulai </label>
          <div class='input-append'><input type=text name='mulai' id='mulai'   value='$r[tgl_mulai]'><span class='add-on'><i class='icon-calendar'></i></span></div>
		  <label>Tanggal Akhir</label>
		  <div class='input-append'><input type=text name='akhir' id='akhir'  value='$r[tgl_selesai]'><span class='add-on'><i class='icon-calendar'></i></span></div>
		  
		   <label>Pengirim</label>
		  <input type=text name='pengirim' class='span12' value='$r[pengirim]'>
		  </div>
		  <div class='span9'>
		  <div class='row-fluid'>
			 <div class='span4'>Waktu Mulai<div class='input-append bootstrap-timepicker'><input type=text name='waktu_mulai'  id='waktumulai'  value='$r[jam_mulai]'><span class='add-on'><i class='icon-time'></i></span></div></div>
			<div class='span4'>Waktu Selesai <div class='input-append bootstrap-timepicker'><input type=text name='waktu_akhir'  id='waktuakhir'  value='$r[jam_akhir]'><span class='add-on'><i class='icon-time'></i></span></div>
		  </div>
		  </div>
		  <label>Keterangan </label>
          <textarea name='isi_agenda' class='span12' rows='11'>$r[isi_agenda]</textarea>
		  </div>
           ";        
       
    echo "
         
         <div class='pull-right'><input type=submit value=Update class='btn btn-primary'> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></div>
          </form></div></div>";
   
    break;  
}
}
?>
