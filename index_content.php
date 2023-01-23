<?php 

include 'koneksi.php';
include 'function_master_truck.php';

?>

<br>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Update RFID Truck</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-md-6 col-lg-12">
                <div class="row">
                  <form action="index.php" method="get">
                    <div class="form-group row">
                      <div class="col-md-5">
                        <div align="center">
                         <b>  Cari POLICE NO  :</b>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <select name="cari_police_no" id="cari_police_no" class="form-control select2" style="width: 100%;">
                          <option> 
                            - Pilih Police No -
                          </option>
                          <?php
                            $data = oci_parse($koneksi, 'SELECT POLICE_NO from T1_TRUCK_MASTER');
                            oci_execute($data);
                            while(($truck = oci_fetch_array($data, OCI_BOTH)) != false)
                            {
                          ?>                
                          <option value="<?php echo $truck['POLICE_NO']; ?>"> 
                            <?php echo $truck['POLICE_NO']; ?> 
                          </option>
                          <?php 
                            } 
                          ?>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" value="cari_police_no" class="btn btn-info btn-sm">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                  <p align="center">
                    <?php 
                      if(isset($_GET['cari_police_no'])){
                       $cari_police_no = $_GET['cari_police_no'];
                       echo "<b> POLICE NO : ".$cari_police_no."</b>";
                      }
                    ?>
                  </p>
                  <table table-striped width="100%" border="0" cellspacing="4" cellpadding="4">
                    <?php  
                      if(isset($_GET['cari_police_no'])){

                        $cari_police_no = $_GET['cari_police_no'];
                        $nomor_polisi = $cari_police_no;

                        $nomor1 = oci_parse($koneksi, "SELECT 
                          NVL(POLICE_NO, '-')POLICE_NO,
                          NVL(OWNER_NAME, '-')OWNER_NAME,
                          NVL(TRADE_MARK, '-')TRADE_MARK,
                          NVL(TRUCK_WEIGHT, '0')TRUCK_WEIGHT,
                          NVL(TOTAL_WEIGHT_HT_CH, '0')TOTAL_WEIGHT_HT_CH,
                          NVL(ID_RFID, '-')ID_RFID
                          FROM T1_TRUCK_MASTER WHERE POLICE_NO='$nomor_polisi'");
                        oci_execute($nomor1);

                        while(($polisi = oci_fetch_array($nomor1, OCI_BOTH)) != false)
                        {
                    ?>
                        <tr>
                          <td>   </td>
                          <td> RFID </td>
                          <td>  : </td>
                          <td> 
                            <?php 
                              echo $hasil_rfid;
                            ?>
                          </td>
                        </tr>
                        <form method="post" action="edit_update.php">
                          <tr>
                            <td>   </td>
                            <td> RFID New </td>
                            <td>  : </td>
                            <td>
                              <!-- menyimpan histori data -->
                              <input type="hidden" name="POLICE_NO_LAMA" value="<?php echo $hasil_police_no; ?>">
                              <input type="hidden" name="ID_RFID_LAMA" value="<?php echo $hasil_rfid; ?>">
                              <input type="hidden" name="UPD_TS_LAMA" value="<?php echo date("d-m-Y H:i:s"); ?>">
                              <input type="hidden" name="USER_LOGIN" value="<?php echo  $_SESSION["username"] ?>">

                              <!-- mengupdate data -->
                              <input type="hidden" name="POLICE_NO" value="<?php echo $hasil_police_no; ?>">
                              <?php 
                                date_default_timezone_set('Asia/Jakarta');
                              ?>
                              <input type="hidden" name="UPD_TS_UPDATE" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("d-m-Y H:i:s"); ?>">
                              <input type="text" name="ID_RFID" id="ID_RFID" class="form-control">
                            </td>
                          </tr>
                          <tr>
                            <td>   </td>
                            <td>
                              <button type="submit" class="btn btn-primary btn-sm">
                                Update
                              </button>
                            </td>
                          </tr>
                        </form>
                      <?php 
                        }
                      }

                      else{
                        $hasil_police_no= '';
                        $hasil_owner_name= '';
                        $hasil_trade_mark= '';
                        $hasil_truck_weight= '';
                        $hasil_total_weight_ht_ch= '';
                        $hasil_rfid= '';
                      }
                      ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> History RFID Truck</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-md-6 col-lg-12">
                <div class="row">
                  <form action="index.php" method="get">
                    <div class="form-group row">
                      <div class="col-md-5">
                        <div align="center">
                          <b>  Cari POLICE NO &nbsp; :</b>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <select name="cari_history" id="cari_history" class="form-control select2" style="width: 100%;">
                          <option> 
                            - Pilih Police No -
                          </option>
                          <?php
                            $data = oci_parse($koneksi, 'SELECT POLICE_NO from T1_TRUCK_MASTER');
                            oci_execute($data);
                            while(($truck = oci_fetch_array($data, OCI_BOTH)) != false)
                            {
                          ?>                
                          <option value="<?php echo $truck['POLICE_NO']; ?>"> 
                            <?php echo $truck['POLICE_NO']; ?> 
                          </option>
                          <?php 
                            } 
                          ?>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" value="cari_history" class="btn btn-info btn-sm">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                  <p align="center">
                    <?php 
                      if(isset($_GET['cari_history'])){
                       $cari_history = $_GET['cari_history'];
                       echo "<b>POLICE_NO : ".$cari_history."</b>";
                      }
                    ?>
                  </p>
                  <table table-striped width="100%" border="0" cellspacing="4" cellpadding="4">
                    <?php 
                      if(isset($_GET['cari_history'])){
                        $cari_history = $_GET['cari_history'];
                        $nomor_polisi = $cari_history;
                        $no = 1;
                        $nomor1 = oci_parse($koneksi, "SELECT 
                          NVL(POLICE_NO, '-')POLICE_NO,
                          NVL(ID_RFID, '-')ID_RFID,
                          NVL(UPD_TS, '-')UPD_TS,
                          NVL(UPD_BY, '-')UPD_BY
                          FROM T1_TRUCK_RFID_HIST WHERE POLICE_NO='$nomor_polisi'");
                        oci_execute($nomor1);

                        while(($polisi = oci_fetch_array($nomor1, OCI_BOTH)) != false)
                        {
                    ?>
                      <tr>
                        <td>   </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RFID ke- <?php echo $no++; ?> </td>
                        <td>  : </td>
                        <td> 
                          <?php 
                            echo $polisi['ID_RFID'];
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>   </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UPD_TS </td>
                        <td>  : </td>
                        <td> 
                          <?php 
                            echo $polisi['UPD_TS'];
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>   </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UPD_BY </td>
                        <td>  : </td>
                        <td> 
                          <?php 
                            echo $polisi['UPD_BY'];
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>   </td>
                        <td> <hr> </td>
                        <td> <hr> </td>
                        <td> <hr> </td>
                      </tr>

                          <?php
                              }
                            }

                            else{
                              $hasil_police_no_history= '';
                              $hasil_rfid_history= '';
                              $hasil_waktu_history= '';
                              $hasil_user_login_history= '';
                            }
                          ?>
                        
                      
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Data Master Truck</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-md-6 col-lg-12">
                <div class="row">
                  <table table-striped width="100%" border="0" cellspacing="4" cellpadding="4">
                    <?php  
                      if(isset($_GET['cari_police_no'])){

                        $cari_police_no = $_GET['cari_police_no'];
                        $nomor_polisi = $cari_police_no;


                        $nomor1 = oci_parse($koneksi, "SELECT 
                          NVL(POLICE_NO, '-')POLICE_NO,
                          NVL(OWNER_NAME, '-')OWNER_NAME,
                          NVL(TRADE_MARK, '-')TRADE_MARK,
                          NVL(TRUCK_WEIGHT, '0')TRUCK_WEIGHT,
                          NVL(TOTAL_WEIGHT_HT_CH, '0')TOTAL_WEIGHT_HT_CH,
                          NVL(ID_RFID, '-')ID_RFID
                          FROM T1_TRUCK_MASTER WHERE POLICE_NO='$nomor_polisi'");
                        oci_execute($nomor1);

                        while(($polisi = oci_fetch_array($nomor1, OCI_BOTH)) != false)
                        {
                    ?>
                        <tr>
                          <td>   </td>
                          <td> OWNER NAME </td>
                          <td>  : </td>
                          <td> 
                            <?php 
                            echo $hasil_owner_name;
                            ?>
                          </td>
                          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                          <td>   </td>
                          <td> TRADE MARK </td>
                          <td>  : </td>
                          <td> 
                            <?php 
                            echo $hasil_trade_mark;
                            ?>
                          </td>
                          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                          <td>   </td>
                          <td> Truck Weight </td>
                          <td>  : </td>
                          <td> 
                            <?php 
                            echo $hasil_truck_weight;
                            ?>
                          </td>
                          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                          <td>   </td>
                          <td> Total Weight HT CH </td>
                          <td>  : </td>
                          <td> 
                            <?php 
                            echo $hasil_total_weight_ht_ch;
                            ?>
                          </td>
                          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                          <td>   </td>
                          <td> Terakhir Update </td>
                          <td>  : </td>
                          <td> 
                            <?php 
                              echo date('d-m-Y H:i:s', strtotime($hasil_upd_ts));   
                            ?>
                          </td>
                          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                          <td>   </td>
                          <td> 
                            <a class="btn btn-primary btn-sm" href="tambah.php"> &nbsp; Tambah Data &nbsp; </a> 
                          </td>
                          <td></td>
                          <td></td>
                          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>

                      <?php   
                          }                  
                        }
                        else{
                          $hasil_police_no= '';
                          $hasil_owner_name= '';
                          $hasil_trade_mark= '';
                          $hasil_truck_weight= '';
                          $hasil_total_weight_ht_ch= '';
                          $hasil_upd_ts= '';
                          $hasil_rfid= '';
                        }
                      ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->




