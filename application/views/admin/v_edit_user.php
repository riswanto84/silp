<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update user </h2> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><input type=button onClick=history.back(-1); value='&larr; Kembali'>
                    <?php
                      

                      foreach ($edit_user as $edit) 
                      {     
                    ?>
                    <br />
                    <form action="<?php echo base_url()."pages/user/update"; ?>" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">
                      <input type="hidden" name="user_id" value="<?php echo encrypt_url($edit->id_user)  ?>">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama" name="nama" class="form-control col-md-7 col-xs-12" data-validate-length-range="100" name="name" placeholder="isikan nama lengkap" required="required" type="text" value="<?php echo $edit->nama ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="nip" name="nip"data-validate-length-range="18,18" class="form-control col-md-7 col-xs-12"  value="<?php echo $edit->nip ?>" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="username" name="username" class="form-control col-md-7 col-xs-12" data-validate-length-range="100" name="username" value="<?php echo $edit->username ?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password1" type="password" name="password1" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Ulangi Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password1" class="form-control col-md-7 col-xs-12" required="required" placeholder="ulangi password">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Nomor HP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="no_hp" name="no_hp" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $edit->no_hp ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $edit->email ?>"">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Role <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="role" required="required" >
                            <?php
                              foreach ($role as $data_role) {
                                echo "<option value='".$data_role->id_group."'>".$data_role->nama_group."</option>";
                              }
                            ?>
                            
                          </select>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="file" name="file_foto" accept=".jpg,.jpeg,.png,.gif"/>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input type="submit" value="Simpan" class="btn btn-success">
                        </div>
                      </div>
                    </form> <?php } ?>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->