<?php 
$q_instansi	= $this->db->query("SELECT * FROM instansi LIMIT 1")->row();
?>

<html>
<head>
<style type="text/css" media="print">

	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	td { padding: 7px 5px; font-size: 10px}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color: #999;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	th {
	font-family: "Times New Roman", Times, serif;
	color: black;
	font-size: 11px;
	background-color: #999;
	padding: 8px 0;
	}
	td { padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Laporan Surat Masuk</title>
</head>

<body onLoad="window.print()">
	<center>
	<div align="center">
	  <center>
	  <b style="font-size: 20px"><?php echo $q_instansi->nama; ?></b></div>
	<center><p style="font-size: 16px">Sekretariat : <?php echo $q_instansi->alamat; ?></p>
	  <hr align="center" size="3" noshade="noshade">
	  <div align="center"><strong>LAPORAN BERITA</strong></div><br>
	  <div align="center"><?php echo $this->model_tanggal->TanggalIndo($dari); ?> s/d <?php echo $this->model_tanggal->TanggalIndo($sampai); ?></div><br>
	</center>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
			  <th width="3%">No</td>
		  	  <th width="20%">Judul</th>
				<th width="10%">Sumber</td>
				<th width="15%">Tanggal</td>
				<th width="5%">Halaman</td>
				<th width="10%">Reporter</td>
				<th width="10%">Label</td>
			</tr>
		</thead>
	  <tbody>
	  <?php
	  $no = 1;
	  if($data->num_rows() > 0){
	  foreach($data->result() as $row){
	  ?>
					<tr class="odd gradeX">
						<td align="center"><?php echo $no++;?></td>
						<td><?php echo $row->judul;?></td>
						<td><?php echo $row->nama_sumber;?></td>
						<td><?php echo $this->model_tanggal->TanggalIndo($row->tanggal);?></td>
						<td align="center"><?php echo $row->halaman;?></td>
						<td><?php echo $row->reporter;?></td>
						<td><?php echo $row->label;?></td>
					</tr>
		<?php
		}
	}else{
		?>
		<td align="center" colspan="8" valign="top">DATA TIDAK DI TEMUKAN</td>
		<?php
	}
		?>			
	  </tbody>
</table><br><br>
<div style="width:100%;float:center">
	
  <div style="width:250px;float:right">
		<div align="left">Bandung, <?php $tglsekarang = date('Y-m-d'); echo $this->model_tanggal->TanggalIndo($tglsekarang);
?><br/>
		KEPALA BAGIAN HUMAS<br>
		Setda Kabupaten Karawang
    </div>
		<p align="left">&nbsp;</p>
    <p align="left"><br/><br/>
    <b><?php echo $q_instansi->nama_pim; ?></b><br><?php echo $q_instansi->nip_pim; ?></p>
  </div>
  </div>
</body>
</html>

