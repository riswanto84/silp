 
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manajemen user </h3>
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
                         <button type="button" onclick="location.href='<?php echo base_url()."pages/user/tambah_user"; ?>';" class="btn btn-primary btn-xs ">+ tambah user</button> 
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="example1" class="table table-striped jambo_table table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Nama </th>
                            <th class="column-title">NIP </th>
                            <th class="column-title">Username </th>
                            <th class="column-title">Role </th>
                            <th class="column-title">Status </th>
                            <th class="column-title text-center">Aksi </th>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            //menampilkan data akun yang terdaftar
                            $no = 0;
                            foreach ($data_akun as $akun) {
                              $nip = $akun->nip;
                              if($nip == "") {
                                $nip = "0";
                              }
                              $no++;
                              echo "
                                <tr class='odd pointer'>
                                  <td class=''>".$no."</td>
                                  <td class=''>".$akun->nama."</td>
                                  <td class=''>".$akun->nip."</td>
                                  <td class=''>".$akun->username."</td>
                                  <td class=''>".$akun->role."</td>
                                  <td class=''>".$akun->status_user."</td>
                                  <td class='text-center'>"; ?>
                                  <a href="<?php echo base_url()."pages/user/detail/".encrypt_url($akun->id_user)."/".$nip ?>"><i class="fa fa-edit"></i> Detail | </i></a>
                                  <a href="<?php echo base_url()."pages/user/edit/".encrypt_url($akun->id_user) ?>"><i class="fa fa-edit"></i> Edit | </i></a>
                                  <a href="<?php echo base_url()."pages/user/delete/".encrypt_url($akun->id_user) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash"></i> Hapus</i></a>
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

        