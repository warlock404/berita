<section class="content">
<div class="row">
<div class="col-lg-12">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Sumber</h3>
            </div>
            <form role="form" method="POST" action="<?php echo base_url('index.php/admin/simpan_sumber');?>">
              <div class="box-body">
                <?php
                $info = $this->session->flashdata('info');
                if(!empty($info)){
                  echo $info;
                }
                ?>
                <input type="hidden" name="id_sumber" value="<?php echo $id_sumber?>">
                <div class="form-group">
                  <label>Nama Sumber *</label>
                  <input type="text" class="form-control" id="sumber" name="sumber" placeholder="Sumber" value="<?php echo $sumber?>" required>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" rows="3" name="ket" placeholder="Keterangan ..."><?php echo $ket?></textarea>
                </div>
              </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          </div>
          </div>
          </section>
