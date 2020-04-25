 
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Setting Privilege </h3>
              </div>
            </div>
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
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                        <input type=button class="btn btn-success btn-xs" onClick=history.back(-1); value='&larr; Kembali'>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title text-center">No </th>
                            <th class="column-title">Nama Role </th>
                            <th class="column-title text-center">Aksi </th>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            //menampilkan data akun yang terdaftar
                            $no = 0;
                            foreach($data_grup as $grup) {
                              $no++;
                              echo "
                                <tr class='odd pointer'>
                                  <td class='text-center'>".$no."</td>
                                  <td class=''>".$grup->nama_group."</td>
                                  <td class='text-center'>"; ?>
                                  
                                  <a href="<?php echo base_url()."pages/setting_grup/setting_privilege/".encrypt_url($grup->id_group) ?>"><i class="fa fa-cogs"></i> Setting</i></a>

                                 
                                  </td>
                                </tr>
                                  <?php
                            }
                          ?>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        