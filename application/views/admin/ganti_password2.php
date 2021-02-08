<section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
                                <div class="box-header">
                                </div><!-- /.box-header -->

                  <div class="box-body">
                  <?php
                  $info = $this->session->flashdata('info');
                  if($info){
                    echo $info;
                  }
                  ?>
                    <form method="post" class="form-horizontal" action="<?php echo base_url()?>index.php/admin/submitpassword2/<?php echo $this->uri->segment(3);?>">
                        <div class="form-group">
                        <label for="Password Baru" class="control-label col-lg-2">Password Baru</label>
                        <div class="col-lg-10">
                          <input type="password" name="password" class="form-control" placeholder="Password " required> <span id="msgberlaku"></span>
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary" value="Ganti Password" id="simpan">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                  </div>
                  </div>
              </div>
</div>
</section>