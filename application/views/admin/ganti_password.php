<script type="text/javascript">
  function cek(){
      var berlaku = $('#berlaku').val();
      var baru = $('#baru').val();
      var ulang = $('#ulang').val();


      if(berlaku.length == 0){
        $('#msgberlaku').html("<span class='label label-danger'>Silahkan Isi Password Lama!</span>").hide().fadeIn().fadeOut(4000);
        $('#berlaku').focus();
        return false;
      }else if(baru.length == 0){
        $('.baru').html("<span class='label label-danger'>Silahkan Isi Password Baru!</span>").hide().fadeIn().fadeOut(4000);
        $('#baru').focus();
        return false;
      }else if(ulang.length == 0){
        $('.ulang').html("<span class='label label-danger'>Silahkan Ulangi Password!</span>").hide().fadeIn().fadeOut(4000);
        $('#ulang').focus();
        return false;
      }
      return true;
  }
  </script>
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
                    <form method="post" class="form-horizontal" action="<?php echo base_url()?>index.php/admin/submitpassword" onsubmit="return cek();">
                        <div class="form-group">
                        <label for="Password Baru" class="control-label col-lg-2">Password Lama</label>
                        <div class="col-lg-10">
                          <input type="password" id="berlaku" name="berlaku" class="form-control"> <span id="msgberlaku"></span>
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="Password Baru" class="control-label col-lg-2">Password Baru</label>
                        <div class="col-lg-10">
                          <input type="password" id="baru" name="baru" class="form-control"> <span class="baru"></span>
                        </div>
                      </div><!-- /.form-group -->
                       <div class="form-group">
                        <label for="Password Baru" class="control-label col-lg-2">Ulangi Password Baru</label>
                        <div class="col-lg-10">
                          <input type="password" id="ulang" name="ulang" class="form-control"> <span class="ulang"></span>
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary" value="Change Password" id="simpan">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                    <a href="<?php echo base_url()?>index.php/admin/profile" class="btn btn-success">Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
</section>
<script type="text/javascript" src="jquery-1.4.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>