 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Informasi Detail User</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <center>
                    <?php
                      //fetching detail user db SILP
                      foreach ($detail_user as $detail) 
                        { 
                    ?>
                    <table class="table table-striped">
                    <tr>
                        <td rowspan=7 width=150 align=right>
                          <img src="<?php echo base_url()."assets/images/".$detail->avatar; ?>" width=150>
                        </td>
                      <td width=150 valign=top>Nama</td>
                      <td valign=top><?php echo $detail->nama; ?></td>
                    </tr>
                    <tr>
                      <td>NIP</td>
                      <td><?php echo $detail->nip; ?></td>
                    </tr>
                    <tr>
                      <td>Nomor HP</td>
                      <td><?php echo $detail->no_hp;  ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?php echo $detail->email;  ?></td>
                    </tr>
                    <tr>
                      <td>Role</td>
                      <td><?php echo $detail->nama_group;   ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><?php 
                                if(($status = $detail->status) == "1")
                                {
                                  echo "Aktif";
                                }
                                else{
                                  echo "<b><i>-- Tidak Aktif --</i></b>";
                                }
                            ?></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td><?php echo $detail->username;   ?></td>
                    </tr>
                    <tr>
                      <td colspan=3 align=center><input type=button onClick=history.back(-1); value='&larr; Kembali'></td>
                    </tr>
                    </table>
                    <?php
                      }
                    ?>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->