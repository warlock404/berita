<section class="content">
<div class="row">
<div class="col-lg-12">
<div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <form role="form" method="POST" action="<?php echo base_url('index.php/admin/simpan_users');?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Username *</label>
                  <input type="text" class="form-control" name="user_id" placeholder="Username" value="<?php echo $user_id?>"<?php
                  $uri = $this->uri->segment(3);
                  if(!empty($uri)){
                    echo "readonly";
                  }
                  ?>>
                </div>

                 <div class="form-group">
                  <label>Nama Lengkap *</label>
                  <input type="text" class="form-control" name="namalengkap" placeholder="Nama Lengkap" value="<?php echo $namalengkap?>" required>
                </div>

                <div class="form-group">
                  <label>Hak Akses : *</label>
                  <select type="text" class="form-control" name="level" required>
                    <option value="">-- Pilih --</option>
                    <option value="Super Admin" <?php if($level == 'Super Admin'){echo 'selected';}?>>Super Admin</option>
                    <option value="User" <?php if($level == 'User'){echo 'selected';}?>>User</option>
                  </select>
                </div>
                <?php
                $uri = $this->uri->segment(3);
                if(empty($uri)){
                ?>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="text" class="form-control" name="password" placeholder="Password" value="admin123" required>
                </div>
                <?php } ?>
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
