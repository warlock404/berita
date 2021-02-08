    <section class="content">
    <div class="box box-primary">
            <div class="box-body">
            <form role="form" method="POST" action="<?php echo base_url('index.php/admin/simpan_setting/1');?>" enctype="multipart/form-data">
              <div class="box-body">
                <?php
                  $info = $this->session->flashdata('info');
                  if(!empty($info)){
                    echo $info;
                  }
                ?>
                <div class="form-group">
                  <label>Nama Instansi/Lembaga : *</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Instansi/Lembaga  .." required value="<?php echo $nama?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea type="text" class="form-control" name="alamat" placeholder="Alamat .."><?php echo $alamat?></textarea>
                </div>
                <div class="form-group">
                  <label>Nama Pimpinan: </label>
                  <input type="text" class="form-control" name="nama_pim" placeholder="Nama Pimpinan  .." value="<?php echo $nama_pim?>">
                </div>
                <div class="form-group">
                  <label>NIP : </label>
                  <input type="text" class="form-control" name="nip_pim" placeholder="NIP Pimpinan  .." value="<?php echo $nip_pim?>">
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                        <img class="img-responsive" src="<?php echo base_url()?>upload/image/<?php echo $logo?>" alt="Photo" width="100px">
                  </div>
                </div>
                <div class="col-md-5">
                <div class="form-group">
                      <label>Logo</label>
                      <input type="file" class="form-control" accept=".jpg, .jpeg, .png" name="logo">
                </div>
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="tambah" id="tambah" value="Simpan">
              </div>
            </form>
          </div>
</section>