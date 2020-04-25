<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Role baru </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><input type=button onClick=history.back(-1); value='&larr; Kembali'>
                    <form action="<?php echo base_url()."pages/setting_grup/register_group"; ?>" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_grup" name="nama_grup" class="form-control col-md-7 col-xs-12" data-validate-length-range="100" placeholder="isikan nama grup" required="required" type="text">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input type="submit" value="Simpan" class="btn btn-success">
                          <input type="reset" value="Batal" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->