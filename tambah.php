<?php
//inisialisasi session
session_start();
 
//mengecek username pada session
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Tambah Data </title>
    <?php 
      include 'master/header.php';
     ?>     
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php 
      include 'master/navbar.php';
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar bg-white sidebar-dark-primary elevation-4">
    <?php 
      include 'master/sidebar.php';
    ?>
  </aside>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>

    <!-- Main content -->
    <section class="content">
      <form method="post" action="tambah_data.php">
        <div class="col-10 col-md-10 col-lg-10">
          <div class="card">

            <div class="card-header">
              <h3 class="card-title"> Tambah Data </h3>
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
              <div class="form-group row">
                <div class="col-md-2">
                  <label> POLICE NO </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="POLICE_NO" id="POLICE_NO" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> CUSTOMER </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="CUSTOMER" id="CUSTOMER" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> SITE ID </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="SITE_ID" id="SITE_ID" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> OWNER NAME </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="OWNER_NAME" id="OWNER_NAME" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> TRADE MARK </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="TRADE_MARK" id="TRADE_MARK" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> STNK NO </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="STNK_NO" id="STNK_NO" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> MACHINE NO </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="MACHINE_NO" id="MACHINE_NO" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> DESIGN NO </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="DESIGN_NO" id="DESIGN_NO" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> UPD TS </label>
                </div>
                <div class="col-md-10">
                  <input type="date" name="UPD_TS" id="UPD_TS" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> TRUCK CODE </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="TRUCK_CODE" id="TRUCK_CODE" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> TRUCK WEIGHT </label>
                </div>
                <div class="col-md-10">
                  <input type="number" name="TRUCK_WEIGHT" id="TRUCK_WEIGHT" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> STATE </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="STATE" id="STATE" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> OPER NAME </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="OPER_NAME" id="OPER_NAME" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> GATE NO </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="GATE_NO" id="GATE_NO" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> TOTAL WEIGHT HT CH </label>
                </div>
                <div class="col-md-10">
                  <input type="number" name="TOTAL_WEIGHT_HT_CH" id="TOTAL_WEIGHT_HT_CH" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> YEAR MADE </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="YEAR_MADE" id="YEAR_MADE" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> EXPIRED LISENCE </label>
                </div>
                <div class="col-md-10">
                  <input type="date" name="EXPIRED_LISENCE" id="EXPIRED_LISENCE" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> CHASSIS CODE </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="CHASSIS_CODE" id="CHASSIS_CODE" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> BBG YN </label>
                </div>
                <div class="col-md-10">
                  <select name="BBG_YN" id="BBG_YN" class="form-control">
                    <option value="Y"> Y </option>
                    <option value="N"> N </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> OTL YN </label>
                </div>
                <div class="col-md-10">
                  <select name="OTL_YN" id="OTL_YN" class="form-control">
                    <option value="Y"> Y </option>
                    <option value="N"> N </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label> ID RFID </label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="ID_RFID" id="ID_RFID" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-sm">
                    Simpan
                  </button>
                </div>
                <div class="col-md-6">
                  <a href="index.php" class="btn btn-secondary btn-sm float-right">Tutup</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </form>
    </section>

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  <?php 
    include 'master/footer.php';
   ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

  <?php 
    include 'master/script.php';
   ?>

</body>
</html>
