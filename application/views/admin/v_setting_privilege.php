       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Setting Privilege <?php echo $ng->nama_group; ?></h3>
              </div>
            </div>
            <form action="<?php echo base_url() ?>pages/setting_grup/update_role" method="post">
            <input type="hidden" name="id_group"  value="<?php echo $kode_groupq;?>">
            <div class="clearfix"></div>
            <div class="row">
              <div class="clearfix"></div>
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php
                      if($this->session->flashdata('berhasil')==true)
                      {
                        echo "
                          <div class='alert alert-success alert-dismissible fade in' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                          </button>
                          <strong>".$this->session->flashdata('berhasil')."</strong> 
                          </div>
                        ";
                      }
                    ?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-save"></i> Simpan</button>
                    <input type=button class="btn btn-success btn-xs"  onClick=history.back(-1); value='&larr; Kembali'>
                    <div><br/></div>
                      <table class="table table-striped jambo_table table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title text-center">No </th>
                            <th class="column-title text-center">Menu </th>
                            <th class="column-title text-center">Parent </th>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php 
                                $no = 0;
                                foreach ($tampil_menu as $menu) {
                                   $no++;
                                   $status = $menu->status;
                                   echo "
                        	<tr class='odd pointer'>
                                  <input type = 'hidden' name = 'id_menu[]' value = ".$menu->id_role.">
                                  <td class='text-center'>".$no."</td>
                                  <td class=''><label><input type='checkbox'";
                                  if ($status == 1) { echo "checked"; }
                                  echo " name='role[]' value='".$menu->id_role."'> ".$menu->nama_menu."</label></td>";
                                  if ($menu->parent == "#") {
                                      $ket_parent = "#";
                                      echo "
                                    <td class='text-center'>".$ket_parent."</td>
                                    </tr>";
                                  }else {
                                  $CI =& get_instance();
                                  $CI->load->model('M_setting');
                                  $id_parent = $menu->parent;
                                   $query_parent = $this->M_setting->get_menu_parent($id_parent)->result();
                                    foreach ($query_parent as $parent) {
                                      echo "
                                  <td class='text-center'>".$parent->nama_menu."</td>
                                    </tr>";
                                    }
                                  } }
                      ?>
                       </tbody>
                      </table>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

