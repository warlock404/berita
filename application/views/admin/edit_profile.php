<section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
                                <div class="box-header">
                                </div><!-- /.box-header -->

                  <div class="box-body">
                  <?php
                    $info = $this->session->flashdata('info');
                    if(!empty($info)){
                      echo $info;
                    }
                    ?>
                     <form method="post" class="form-horizontal" action="<?php echo base_url('index.php/admin/simpanprofile')?>" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="First Name" class="control-label col-lg-2">Nama</label>
                        <div class="col-lg-10">
                          <input type="text" name="namalengkap" value="<?php echo $namalengkap?>" class="form-control"> 
                        </div>
                      </div><!-- /.form-group -->
                     
                    <div class="form-group">
                        <label for="nama_foto" class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-10">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px;">
                             <img src="<?php if(empty($foto)){
                                echo base_url('upload/image/laki.png');
                            }else{
                              echo base_url()."upload/image/".$foto;
                            }?>">
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                              <input type="file" class="form-control" accept=".jpg, .png, .jpeg" name="foto_user">
                            </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                    
                    <a href="<?php echo base_url()?>index.php/admin/profile" class="btn btn-success">Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section>