              <?php
              foreach($data->result() as $row){
              ?>
<section class="content">
<div class="row">
        <div class="col-md-12">
          <div class="box">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
                <a href="<?php echo base_url('index.php/admin/edit_berita'); echo "/".$row->id_berita;?>"><button class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Update</button></a>
                <a href="<?php echo base_url('index.php/admin/upload_gambar'); echo "/".$row->id_berita;?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-upload"></i> Tambah Cover</button></a>
              </h3>
            </div>
            <div class="box-body">
            <div class="col-md-4">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Judul : <?php echo $row->judul?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Sumber</strong>

              <p class="text-muted">
                <?php echo $row->sumber?>
              </p>

              <hr>

              <strong><i class="fa fa-book margin-r-5"></i> Tanggal Terbit</strong>

              <p class="text-muted"><?php echo $this->model_tanggal->TanggalIndo($row->tanggal)?></p>

              <hr>
              <strong><i class="fa fa-book margin-r-5"></i> Halaman</strong>

              <p class="text-muted"><?php echo $row->halaman?></p>

              <hr>
              <strong><i class="fa fa-book margin-r-5"></i> Reporter</strong>

              <p class="text-muted"><?php echo $row->reporter?></p>

              <hr>
              <strong><i class="fa fa-book margin-r-5"></i> Label</strong>

              <p class="text-muted"><?php $label = $row->label?>
              <?php
              if($label == 'positif'){
                ?>
                  <span class="label label-primary">Positif</span>
                <?php
              }else if ($label == 'negatif'){
                ?>
                  <span class="label label-danger">Negatif</span>
                <?php
              }else{
                ?>
                  <span class="label label-success">Netral</span>
                <?php
              }
              ?></p>

              <hr>
            </div>
          </div>
            </div>

            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-body table-responsive">
                  <embed src="<?php echo base_url()?>upload/berita/<?php echo $row->upload?>" type="application/pdf" width="100%" height="670"/>
                </div>
              </div>
              <div class="box-body box-profile">
                

                <a href="<?php echo base_url()?>upload/berita/<?php echo $row->upload?>"><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>upload/image/pdf.png" alt="User profile picture"><h3 class="profile-username text-center">Download</h3></a>
              </div>
            </div>

          </div>
          </div>
        </div>
</div>
</section>
<?php } ?>