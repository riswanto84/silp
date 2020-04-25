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
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                         <button type="button" onclick="location.href='<?php echo base_url()."pages/Buat_sk/tambah_anggota"; ?>';" class="btn btn-primary btn-xs ">+ tambah anggota</button> 
                      </li>
                    </ul>
                    <h2>Anggota Pokja berdasarkan SK : <?php echo $tampil_sk->no_sk; ?></h2>
                    <div class="clearfix"></div><input type=button onClick=history.back(-1); value='&larr; Kembali'>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title text-center" >No </th>
                            <th class="column-title text-center" >Nama Pokja </th>
                            <th class="column-title text-center" >NIP </th>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 0;
                            foreach ($anggota as $anggota) 
                            {
                              $no++;
                              echo "<tr class='odd pointer'>";
                              echo "<td align='center'>".$no."</td>";
                              echo "<td align='center'>".$anggota->nama."</td>";
                              echo "<td align='center'>".$anggota->nip."</td>";
                            }
                          ?>
                        </tbody>
                      </table>
                </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->

