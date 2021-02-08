<?php 
$q_instansi	= $this->db->query("SELECT * FROM instansi LIMIT 1")->row();
?>

<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 60%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
</head>

<body onLoad="window.print()">
<table>
	<tr><td colspan="3">
	<h2><?php echo $q_instansi->nama; ?></h2>
	Alamat : <?php echo $q_instansi->alamat; ?>	
	</td>
	</tr>
	<?php
	foreach($data->result() as $row){
	?>
	<tr>
	  <td colspan="3" align="center" style="padding: 15px 0"><b style="font-size: 21px;">RINGKASAN BERITA</b></td>
  </tr>
	<tr>
	  <td colspan="3" align="center" style="padding: 15px 0"><img width="300" src="<?php
                      $foto = $row->upload;
                      if(empty($foto)){
                        echo base_url('upload/berita/default.jpg');
                         }else{
                         echo base_url()."upload/berita/".$foto;
                      }?>" class="img-thumbnail"></td>
	</tr>
	<tr>
    <td width="25%"><b>Judul</b></td>
    <td width="50%" colspan="2">: Judul</td>
	</tr>
	<tr>
    <td><b>Sumber Berita</b></td>
    <td colspan="2">: Sumber Berita</td>
	</tr>
	<tr>
	  <td><b>Tanggal Terbit</b></td>
	  <td colspan="2">: Tanggal Terbit</td>
  </tr>
	<tr>
	  <td><b>Halaman</b></td>
	  <td colspan="2">: Halaman</td>
  </tr>
	<tr>
	  <td><b>Reporter</b></td>
	  <td colspan="2">: Reporter</td>
  </tr>
	<tr>
	  <td><b>Label</b></td>
	  <td colspan="2">: Label</td>
	</tr>
	
	<tr>
	  <td style="height: 100px" valign="top" colspan="3"><p><b>Resume :</b></p>
      <p>Isi Resume</p></td>
	</tr>
	<?php } ?>
</table>
<br><br>
<div style="width:100%;float:center">
	
  <div style="width:250px;float:right">
		<div align="left">Bandung, <?php $tglsekarang = date('Y-m-d'); echo $this->model_tanggal->TanggalIndo($tglsekarang);
?><br/>
		Kepala Humas,
    </div>
		<p align="left">&nbsp;</p>
    <p align="left"><br/><br/>
    <b><?php echo $q_instansi->nama_pim; ?></b><br><?php echo $q_instansi->nip_pim; ?></p>
  </div>
</div>
</body>
</html>
