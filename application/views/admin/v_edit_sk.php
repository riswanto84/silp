<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
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
                    <h2>Edit SK Pokja </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><input type=button onClick=history.back(-1); value='&larr; Kembali'>
                    <form action="<?php echo base_url()."pages/Buat_sk/update_sk"; ?>" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">
                      <?php 
                        foreach ($edit_sk as $edit) 
                        {
                      ?>
                      <input type="hidden" name="id_sk" value="<?php echo encrypt_url($edit->id_sk) ?>">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_sk">Nomor SK <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="no_sk" name="no_sk" class="form-control col-md-7 col-xs-12" data-validate-length-range="100" required="required" type="text" value="<?php echo $edit->no_sk ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_sk">Tanggal SK <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2' ">
                            <input type='text' class="form-control" placeholder = "isikan tanggal SK" required="required" name="tanggal" value="<?php echo date_format(date_create($edit->tanggal_sk), 'd-m-Y') ?>" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="perihal">Perihal <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <textarea id="perihal" name="perihal" class="form-control col-md-7 col-xs-12" data-validate-length-range="100" name="perihal" required="required"><?php echo $edit->perihal ?></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
                        <div class="radio">
                            <label>
                              <input type="radio" name="status" value="1" checked=""> Aktif
                            </label>
                            <label>
                              <input type="radio" name="status" value="0"> Tidak Aktif
                            </label>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file_sk">Upload file SK .pdf
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="file" name="file_sk" accept=".pdf"/>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input type="submit" value="Simpan" class="btn btn-success">
                          <input type="reset" value="Batal" class="btn btn-primary">
                          <?php } ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                      <table id="example1" class="table table-striped jambo_table table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title text-center" >No </th>
                            <th class="column-title text-center" >Nomor SK </th>
                            <th class="column-title text-center" >Perihal </th>
                            <th class="column-title text-center" >Status </th>
                            <th class="column-title text-center" >Edit Anggota </th>
                            <th class="column-title text-center" >Edit SK </th>
                            <th class="column-title text-center" >Download SK </th>
                            <th class="column-title text-center" >Hapus SK </th>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 0;
                            foreach ($tampil_sk as $tampil_sk) 
                            {
                              $no++;
                              echo "<tr class='odd pointer'>";
                              echo "<td align='center'>".$no."</td>";
                              echo "<td align='center'>".$tampil_sk->no_sk."</td>";
                              echo "<td align='center'>".$tampil_sk->perihal."</td>";
                              $status = $tampil_sk->status;
                              if ($status == 1) {
                                echo "<td align='center'>Aktif</td>";
                              } else { 
                               echo "<td align='center'>Tidak Aktif</td>";
                              }
                              $id_sk = encrypt_url($tampil_sk->id_sk);
                              echo "<td><a href=";
                              echo base_url()."pages/Buat_sk/edit_anggota/".$id_sk;;
                              echo "><i class='fa fa-user'></i> Edit Anggota </i></a></td>";

                              echo "<td><a href=";
                              echo base_url()."pages/buat_sk/edit_sk/".$id_sk;
                              echo "><i class='fa fa-edit'></i> Edit SK </i></a></td>";


                              echo "<td><a href='".base_url()."assets/files/".$tampil_sk->link_file."' download><i class='fa fa-file-pdf-o'></i> File SK</a>
                              </td><td>";
                             ?>
                             <a href="<?php echo base_url()."pages/Buat_sk/delete/".$id_sk; ?>" onclick="javascript: return confirm('Anda yakin akan menghapus SK ?')"><i class="fa fa-trash"></i> Hapus</i></a>

                             <?php
                              echo "</td></tr>";
                            }
                          ?>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
        <!-- /page content -->

