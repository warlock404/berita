    <section class="content">
    <div class="box box-primary">
            <div class="box-body">
            <form role="form" method="POST" action="<?php echo base_url('index.php/admin/simpan_gambar');?>" enctype="multipart/form-data">
              <div class="box-body">
                <?php
                  $info = $this->session->flashdata('info');
                  if(!empty($info)){
                    echo $info;
                  }
                ?>
                <div>
                  <input type="hidden" name="id_berita" value="<?php echo $id_berita?>">
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                        <img class="img-responsive" src="<?php if(empty($foto)){
                        echo base_url('upload/berita/default.jpg');
                         }else{
                         echo base_url()."upload/berita/".$foto;
                      }?>" alt="Photo" width="100px">
                  </div>
                </div>
                <div class="col-md-5">
                <div class="form-group">
                      <label>Cover</label>
                      <input type="file" class="form-control" accept=".jpg, .jpeg, .png" name="foto">
                </div>
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="tambah" id="tambah" value="Simpan">
              </div>
            </form>
          </div>
</section>