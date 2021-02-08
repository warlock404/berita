<section class="content">
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group col-md-4">
                  <select class="form-control" name="sumber" required>
                    <?php
                    $hasil = $this->db->get('sumber');
                    foreach($hasil->result() as $row){
                  ?>
                    <option value="<?php echo $row->id_sumber?>"><?php echo $row->sumber?></option>
                    <?php }?>
                  </select>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <button type="submit" class="btn btn-primary">Lihat Data</button>
                </div>
              </div>
            </form>
  </div>
  </div>
  </div>
<?php
if($_POST){
  $sumber = $this->input->post('sumber');
  $data = $this->db->query("SELECT
berita.judul,
berita.id_berita,
sumber.sumber,
berita.tanggal,
berita.halaman,
berita.reporter
FROM
berita
INNER JOIN sumber ON sumber.id_sumber = berita.sumber
WHERE
berita.sumber = '$sumber'
ORDER BY
berita.id_berita DESC
");
?>
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body table-responsive">
            <?php
                $info = $this->session->flashdata('info');
                if(!empty($info)){
                  echo $info;
                }
                ?>
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Judul</th>
                  <th>Sumber</th>
                  <th>Tanggal</th>
                  <th>Halaman</th>
                  <th>Reporter</th>
                  <th style="width: 130px">Opsi</th>
                </tr>
                </thead>
          <tbody>
          <?php
          $no = 1;
          foreach($data->result() as $row){
          ?>
            <tr>
              <td><?php echo $no++;?></td>
              <td><b><a href="<?php echo base_url('index.php/admin/detail_berita'); echo "/".$row->id_berita;?>"><?php echo $row->judul;?></a></b></td>
              <td><?php echo $row->sumber;?></td>
              <td><?php echo $this->model_tanggal->TanggalIndo($row->tanggal);?></td>
              <td><?php echo $row->halaman;?></td>
              <td><?php echo $row->reporter;?></td>
              <td align="center">
                <a href="<?php echo base_url('index.php/admin/edit_berita'); echo "/".$row->id_berita;?>"><button class="btn btn-success" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></button></a>
                <a href="<?php echo base_url('index.php/admin/hapus_berita'); echo "/".$row->id_berita;?>" id="alertHapus"><button class="btn btn-danger" title="Hapus Data"><i class="glyphicon glyphicon-remove"></i></button></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
              </table>
            </div>
        </div>
      </div>
      <?php }?>
      </section>