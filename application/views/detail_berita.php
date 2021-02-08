              <?php
              foreach($data->result() as $row){
              ?>
    <section class="content">
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              
            </div>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <tr>
                <td align="center" colspan="6"><b><?php echo $row->judul?></b></td>
              </tr>
                <tr>
                  <td colspan="3" align="center">
                                            <embed src="<?php echo base_url()?>upload/berita/<?php echo $row->upload?>" type="application/pdf" width="100%" height="670"/>
                    <div class="box-body box-profile">
                

                <a href="<?php echo base_url()?>upload/berita/<?php echo $row->upload?>" target="_blank"><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>upload/image/pdf.png" alt="User profile picture"><h3 class="profile-username text-center">Download</h3></a>
              </div>
                  </td>
                </tr>
                <tr>
                  <td width="200px"><b>Sumber</b></td>
                  <td width="5px">:</td>
                  <td><?php echo $row->sumber?></td>
                </tr>
                <tr>
                  <td width="200px"><b>Tanggal Terbit</b></td>
                  <td width="5px">:</td>
                  <td><?php echo $this->model_tanggal->TanggalIndo($row->tanggal)?></td>
                </tr>
                <tr>
                  <td width="200px"><b>Halaman</b></td>
                  <td width="5px">:</td>
                  <td><?php echo $row->halaman?></td>
                </tr>
                <tr>
                  <td width="200px"><b>Reporter</b></td>
                  <td width="5px">:</td>
                  <td><?php echo $row->reporter?></td>
                </tr>
                <tr>
                  <td width="200px"><b>Label</b></td>
                  <td width="5px">:</td>
                  <td><?php echo $row->label?></td>
                </tr>
                 <tr>
                  <td colspan="3"><?php echo $row->resume;?></td>
                </tr>
                
              </table>
            </div>
        </div>
      </div>
      </section>
                <?php } ?>