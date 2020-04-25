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
                           foreach ($data_simpeg as $simpeg) 
                            {
                    ?>
                    <table class="table table-striped">
                    <tr>
                        <td rowspan=13 width=150 align=center>
                          <img src="<?php echo base_url()."assets/images/".$detail->avatar; ?>" width=80>
                        </td>
                      <td width=150 valign=top>Nama</td>
                      <td valign=top><?php echo $detail->nama; ?></td>
                    </tr>
                    <tr>
                      <td>NIP</td>
                      <td><?php echo $detail->nip; ?></td>
                    </tr>
                    <tr>
                      <td>Pangkat</td>
                      <td><?php echo $simpeg->NM_PANGKAT;  ?></td>
                    </tr>
                    <tr>
                      <td>Unit Kerja</td>
                      <td><?php echo $simpeg->NM_UNIT_ES2;  ?></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td><?php echo $simpeg->NM_JABATAN." - ".$simpeg->NM_UNIT_ORG;  ?></td>
                    </tr>
                    <tr>
                      <td>Kantor</td>
                      <td><?php echo $simpeg->NM_KANTOR;  ?></td>
                    </tr>
                    <tr>
                      <td>NPWP</td>
                      <td><?php echo $simpeg->NPWP;  ?></td>
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
                      <td>Pendidikan Formal</td>
                      <td><?php echo $simpeg->KET_PEND_FORMAL." ".$simpeg->NM_LEMB_PEND_FORMAL;   ?></td>
                    </tr>
                    <tr>
                      <td colspan=3 align=center><input type=button onClick=history.back(-1); value='&larr; Kembali'></td>
                    </tr>
                    </table>
                    <?php
                        }
                      }
                    ?>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->