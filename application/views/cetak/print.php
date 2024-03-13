
<html>
<head>
	<title>Cetak Laporan Nilai</title>
	<style>
	body{
		font-family: Calibri, Tw Cen MT,Arial, Helvetica, sans-serif;
		margin:0px; 
		padding:0px; 
		width: 850px;
	}
	.kop{
		padding-top:10px;
		padding-bottom:5px;
		margin:bottom:5px;
	}
	.kop img{
		float:left;
		border-right:1px solid #000;
		padding-right:10px;
		padding-left:10px;
	}
	td,tr {
		font:15px Tw Cen MT,Arial, Helvetica, sans-serif;
	}
	.judul{
		padding-left:180px;
		font:22px Tw Cen MT,Arial, Helvetica, sans-serif;
	}
	.judul2{
		padding-left:180px;
		padding-top:5px;
		font:15px Tw Cen MT,Arial, Helvetica, sans-serif;
	}
	.isi{
		font-family:calibri,Arial, Helvetica, sans-serif;
		padding-top:10px;
	}
	.foot{
		padding-top:60px;
	}
	.subfoot{
		width:830px;
		text-align:center;
		margin-top:-10px;
	}
	.footer {
		width:830px;
		font:11px Tw Cen MT,Arial, Helvetica, sans-serif;
		text-align:center;
	}
	</style>
</head>
<body>
<div class="kop">
	<img src="<?php echo base_url('assets/images/pgri.png'); ?>" width="80">
	<div class="judul">SMA PGRI PURWOHARJO | www.smapgripurwoharjo.sch.id</div>
	<div class="judul2">JL.JAJAG NO.7, RT/RW 2/3, Dsn. CURAH PALUNG, Ds./Kel Kradenan, Kec. Purwoharjo, Kab. Banyuwangi, Prop. Jawa Timur. Kode Pos : 68483</div>
</div>
<hr style="width: 850px;float:left;margin-top:5px;" color="black">
<center style="font-size:18px;font-weight:bold;">LAPORAN NILAI</center>
<table style="width: 100%;" cellspacing="4">		
<tr>
	<td valign="top">NIS</td>
	<td valign="top">:</td>
	<td valign="top"><?php echo $dataSiswa['nis']; ?></td>
	<td valign="top">Angkatan</td>
	<td valign="top">:</td>
	<td valign="top"><?php echo $dataSiswa['angkatan']; ?></td>
	
</tr>
<tr>
	<td valign="top">Nama</td>
	<td valign="top">:</td>
	<td valign="top"><?php echo $dataSiswa['nama_siswa']; ?></td>
	<td valign="top">Jurusan</td>
	<td valign="top">:</td>
	<td valign="top"><?php echo $dataSiswa['jurusan']; ?></td>
</tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="4">
<tr bgcolor="silver" style="color:#000;font-weight:bold;">
	<th align="center">Mata Pelajaran</th>
	<th align="center">Semester</th>
	<th align="center">Kelas</th>
	<th align="center">Nilai</th>
</tr>
<?php foreach($dataNilai as $row){ ?>
<tr>
	<td><?php echo $row->nama_mapel; ?></td>
	<td><?php echo $row->semester; ?></td>
	<td><?php echo $row->kelas; ?></td>
	<td><?php echo $row->nilai; ?></td>
</tr>
<?php } ?>
</table>
<p>
<table  width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
	<td width="20%"><b>Komentar Guru</b></td>
	<td><?php echo $komentar['nama_guru'].' : '.$komentar['komentar']; ?></td>
</tr>
</table>
</p>
<p>
<table border="1" style="float: right;">
	<tr valign="bottom" align="center">
		<td height="100" width="200">TTD Orang Tua</td>
	</tr>
</table>
</p>
<br><br><br><br><br>
<hr>
<div class="subfoot">
<img src="themes/images/foot.jpg" width="270" height="5">
</div>
<div class="footer">IPA Ilmu Pengetahuan Alam | IPS Ilmu Pengetahuan Sosial</div>
</body>
</html>

