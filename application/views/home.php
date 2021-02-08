 <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
          <?php
          if($data->num_rows() > 0){
          foreach($data->result() as $row){
          ?>
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $this->model_tanggal->TanggalIndo($row->tanggal);?></span>

                <h3 class="timeline-header"><a href="<?php echo base_url();?>index.php/home/berita/<?php echo $row->id_berita?>"><?php echo $row->judul?></a></h3>

                <div class="timeline-body">
                <div class="row">
                <div class="col-md-2">
                <span class="foto_profil"><img width="120" src="<?php
                      $foto = $row->foto;
                      if(empty($foto)){
                        echo base_url('upload/berita/default.jpg');
                         }else{
                         echo base_url()."upload/berita/".$foto;
                      }?>" class="img-thumbnail">
                </span>
                </div>

                      <div class="col-md-9">  
                      <?php echo $row->resume?>
                      <br>
                      <label class="label label-success"><?php echo $row->label?></label>
                      </div>

                </div>
                </div>
              </div>
            </li>
            <?php
            }
            }else{
              echo "Data Tidak Di Temukan";
            }
            ?>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->