    <section class="content">
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">
                <a href="<?php echo base_url('index.php/admin/tambah_sumber');?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button></a>
              </h3>
            </div>
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
                  <th>Keterangan</th>
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
              <td><?php echo $row->sumber;?></td>
              <td><?php echo $row->ket;?></td>
              <td align="center">
                <a href="<?php echo base_url('index.php/admin/edit_sumber'); echo "/".$row->id_sumber;?>"><button class="btn btn-success" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></button></a>
                <a href="<?php echo base_url('index.php/admin/hapus_sumber'); echo "/".$row->id_sumber;?>" id="alertHapus"><button class="btn btn-danger" title="Hapus Data"><i class="glyphicon glyphicon-remove"></i></button></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
              </table>
            </div>
        </div>
      </div>
      </section>