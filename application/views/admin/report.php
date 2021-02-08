    <section class="content">
    <div class="box box-primary">
            <div class="box-body">
            <form method="POST" action="<?php echo base_url('index.php/admin/report');?>" target="_blank">
                <div class="form-group">
                <label>Dari Tanggal</label>
                <table>
                  <td>
                    <select name="tgl" class="form-control">
                        <?php $this->model_tanggal->selectTanggal();?>
                    </select>
                  </td>
                  <td>
                    <select name="bln" class="form-control">
                      <?php $this->model_tanggal->selectBulan();?>
                    </select>
                  </td>
                  <td>
                    <select name="thn" class="form-control">
                    <?php $this->model_tanggal->selectTahun();?>
                    </select>
                  </td>
                </table>
                </div>

                <div class="form-group">
                <label>Sampai Tanggal</label>
                <table>
                  <td>
                    <select name="tgl2" class="form-control">
                        <?php $this->model_tanggal->selectTanggal();?>
                    </select>
                  </td>
                  <td>
                    <select name="bln2" class="form-control">
                      <?php $this->model_tanggal->selectBulan();?>
                    </select>
                  </td>
                  <td>
                    <select name="thn2" class="form-control">
                    <?php $this->model_tanggal->selectTahun();?>
                    </select>
                  </td>
                </table>
                </div>

                <div class="form-group">
                <label>Sumber</label>
                <table>
                  <td width="250px">
                    <select class="form-control" name="sumber">
                        <option value="all">All</option>
                        <?php
                          $data1 = $this->db->get('sumber');
                          foreach($data1->result() as $row){
                        ?>
                        <option value="<?php echo $row->id_sumber?>"><?php echo $row->sumber;?></option>
                        <?php
                    }
                    ?>
                    </select>
                  </td>
                </table>
                </div>

                <div class="control-group">
                  <div class="controls">
                    <input type="submit" name="cetakper" class="btn btn-success" value="Cetak">
                  </div>
                </div>
            </form>
          </div>
</section>