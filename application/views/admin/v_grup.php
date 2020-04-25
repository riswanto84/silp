 
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Setting Role </h3>
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
                         <button type="button" onclick="location.href='<?php echo base_url()."pages/setting_grup/tambah_grup"; ?>';" class="btn btn-primary btn-xs ">+ tambah role</button> 
                      </li>
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
                            <th class="column-title text-center">Nama Role </th>
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
                                  <a data-toggle="modal" href="#myModal<?php echo $grup->id_group;?>"><i class="fa fa-edit"></i> Edit | </i></a>
                                  <!-- Modal 1 -->
                                  <div class="modal fade" id="myModal<?php echo $grup->id_group;?>" tabindex="-1" role="dialog" 
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="myModalLabel">Edit Nama Role</h4> 
                                        </div>
                                          <form action="<?php echo base_url();?>pages/setting_grup/update" method="post" class="form-horizontal form-label-left">
                                            <div class="modal-body">
                                              <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-3 for="id_absen">Nama Role </label>
                                              <div class="col-md-6 col-sm-6 col-xs-6">
                                              <input type="text" class="form-control" name="nama_grup" value="<?php echo $grup->nama_group; ?>">
                                              <input type="hidden" name="id_group" value="<?php echo $grup->id_group; ?>">
                                              </div>
                                              </div>
                                            </div>
                                              <div class="modal-footer">
                                              <button type="submit" class="btn btn-info">Ubah</button>
                                              </div>

                                          </form>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Modal 1 -->

                                  <!-- Modal 2 -->
                                  <div class="modal fade" id="myModal2<?php echo $grup->id_group;?>" tabindex="-1" role="dialog" 
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="myModalLabel">Tambah Nama Grup</h4> 
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Modal 2 -->



                                  <a href="<?php echo base_url()."pages/setting_grup/delete/".encrypt_url($grup->id_group) ?>" onclick="javascript: return confirm('Anda yakin menghapus grup ?')"><i class="fa fa-trash"></i> Hapus</i></a>
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

        