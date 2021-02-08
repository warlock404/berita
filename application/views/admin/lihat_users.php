    <section class="content">
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">
                <a href="<?php echo base_url('index.php/admin/tambah_users');?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button></a>
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
                  <th style="width: 20px">#</th>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Foto</th>
                  <th style="width: 230px">Opsi</th>
                </tr>
                </thead>
          <tbody>
          <?php
          $no = 1;
          foreach($data->result() as $row){
          ?>
            <tr>
              <td><?php echo $no++;?></td>
              <td><?php echo $row->namalengkap;?></td>
              <td><?php echo $row->level;?></td>
              <td style="width:100px;"><img class="img-responsive" src="<?php
              
                if(empty($foto)){
                    echo base_url('upload/image/laki.png');
                }else{
                  echo base_url()."upload/image/".$row->foto;
                }?>" alt="Photo" width="100px">
              </td>
              <td align="center">
                <a href="<?php echo base_url('index.php/admin/ubahpassword'); echo "/".$row->user_id;?>"><button class="btn btn-warning" title="Ubah Password"><i class="glyphicon glyphicon-user"></i></button></a>
                <a href="<?php echo base_url('index.php/admin/edit_users'); echo "/".$row->user_id;?>"><button class="btn btn-success" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></button></a>
                <a href="<?php echo base_url('index.php/admin/hapus_users'); echo "/".$row->user_id;?>" id="alertHapus"><button class="btn btn-danger" title="Hapus Data"><i class="glyphicon glyphicon-remove"></i></button></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
              </table>
            </div>
        </div>
      </div>
      </section>