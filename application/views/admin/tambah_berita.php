<section class="content">
<div class="row">
<div class="col-lg-12">
<div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <form role="form" enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/admin/simpan_berita');?>">
              <div class="box-body">
                <?php
                $info = $this->session->flashdata('info');
                if(!empty($info)){
                  echo $info;
                }
                ?>
                <input type="hidden" name="id_berita" value="<?php echo $id_berita?>">
                <div class="form-group">
                  <label>Judul *</label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="<?php echo $judul?>" required>
                </div>
                <div class="form-group">
                  <label>Sumber *</label>
                  <select class="form-control" name="sumber" required>
                  <?php
                    $data1 = $this->db->get('sumber');
                    foreach($data1->result() as $row){
                      if($sumber == $row->id_sumber){
                        ?>
                        <option value="<?php echo $row->id_sumber?>" selected><?php echo $row->sumber;?></option>
                        <?php
                      }else{
                        ?>
                        <option value="<?php echo $row->id_sumber?>"><?php echo $row->sumber;?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Terbit *</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?php echo $tanggal?>" required>
                </div>
                <div class="form-group">
                  <label>Halaman</label>
                  <input type="text" class="form-control" id="halaman" name="halaman" placeholder="Halaman" value="<?php echo $halaman?>">
                </div>
                 <div class="form-group">
                  <label>Reporter</label>
                  <input type="text" class="form-control" id="reporter" name="reporter" placeholder="Reporter" value="<?php echo $reporter?>">
                </div>
                
                <div class="form-group">
                  <label>Upload (FIle Harus Berupa PDF)</label>
                  <input type="file" name="upload" accept=".pdf">
                </div>
                 <div class="form-group">
                  <label>Label</label>
                  <select type="text" class="form-control" name="label" required>
                    <option value="">-- Pilih --</option>
                    <option value="positif" <?php if($label == 'positif'){echo 'selected';}?>>Postif</option>
                    <option value="negatif" <?php if($label == 'negatif'){echo 'selected';}?>>Negatif</option>
                    <option value="netral" <?php if($label == 'netral'){echo 'selected';}?>>Netral</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Resume</label>
                  <textarea class="form-control" rows="3" name="resume" placeholder="Resume ..."><?php echo $resume?></textarea>
                </div>
              </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo base_url()?>/index.php/admin/lihat_berita" class="btn btn-danger"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class=" glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
            </form>
          </div>
          </div>
          </div>
          </section>
