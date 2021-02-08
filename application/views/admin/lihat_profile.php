<?php
foreach($data->result() as $row){
?>
<section class="content">
<div class="row">
                        <div class="col-xs-12">
                            <div class="box" style="padding-bottom:30px;padding-left:10px">
                                <div class="box-header">
                                    <h3 class="box-title"><b><?php echo $row->namalengkap?></b></h3>
                                   
                                </div><!-- /.box-header -->
                             
                                <div class="box-body no-padding">
                                <div class="row">
                                    <div class="col-md-5">
                                            <span class="foto_profil"><img width="500" src="<?php
                                          foreach($data->result() as $row){
                                            $foto = $row->foto;
                                            if(empty($foto)){
                                                echo base_url('upload/image/laki.png');
                                            }else{
                                              echo base_url()."upload/image/".$row->foto;
                                            }
                                          }?>" class="img-thumbnail"></span>
                                    </div>
                                    <div class="col-md-5">
                                            <table class="table table-hover pull-right">

                                        <tbody>
                                        <tr>
                                            <th class="col-md-5">Username</th>
                                            <td><?php echo $row->user_id?></td>
                                            </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?php echo $row->namalengkap?></td>
                                            </tr>
                                        <tr>
                                            <th>Level</th>
                                            <td><?php echo $row->level?></td>
                                            </tr>
                                        
                                    </tbody></table>
                                     <p></p>
                                <a href="<?php echo base_url()?>index.php/admin/editprofile" class="btn btn-primary">Edit Profil</a> <a href="<?php echo base_url()?>index.php/admin/ganti_password" class="btn btn-primary">Change Password</a>
                                    </div>
                                </div>
                               
                                
                                </div><!-- /.box-body -->
                               
                            <p></p>
                            </div><!-- /.box -->
                        </div>
                    </div>
                  
                </section>
<?php } ?>