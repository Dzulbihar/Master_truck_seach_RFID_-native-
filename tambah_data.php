<?php 
// koneksi database
// include 'koneksi.php';
require_once 'koneksi.php';
// menangkap data yang di kirim dari form
if (!isset($_POST['submit'])){
	$POLICE_NO = $_POST['POLICE_NO'];
	$CUSTOMER = $_POST['CUSTOMER'];
	$SITE_ID = $_POST['SITE_ID'];
	$OWNER_NAME = $_POST['OWNER_NAME'];
	$TRADE_MARK = $_POST['TRADE_MARK'];
	$STNK_NO = $_POST['STNK_NO'];
	$MACHINE_NO = $_POST['MACHINE_NO'];
	$DESIGN_NO = $_POST['DESIGN_NO'];
	$UPD_TS = $_POST['UPD_TS'];
	$TRUCK_CODE = $_POST['TRUCK_CODE'];
	$TRUCK_WEIGHT = $_POST['TRUCK_WEIGHT'];
	$STATE = $_POST['STATE'];
	$OPER_NAME = $_POST['OPER_NAME'];
	$GATE_NO = $_POST['GATE_NO'];
	$TOTAL_WEIGHT_HT_CH = $_POST['TOTAL_WEIGHT_HT_CH'];
	$YEAR_MADE = $_POST['YEAR_MADE'];
	$EXPIRED_LISENCE = $_POST['EXPIRED_LISENCE'];
	$CHASSIS_CODE = $_POST['CHASSIS_CODE'];
	$BBG_YN = $_POST['BBG_YN'];
	$OTL_YN = $_POST['OTL_YN'];
	$ID_RFID = $_POST['ID_RFID'];


	$query = "INSERT INTO T1_TRUCK_MASTER (POLICE_NO,CUSTOMER,SITE_ID,OWNER_NAME,TRADE_MARK,STNK_NO,MACHINE_NO,DESIGN_NO,UPD_TS,TRUCK_CODE,TRUCK_WEIGHT,STATE,OPER_NAME,GATE_NO,TOTAL_WEIGHT_HT_CH,YEAR_MADE,EXPIRED_LISENCE,CHASSIS_CODE,BBG_YN,OTL_YN,ID_RFID)
	
	VALUES ('$POLICE_NO','$CUSTOMER','$SITE_ID','$OWNER_NAME','$TRADE_MARK','$STNK_NO','$MACHINE_NO','$DESIGN_NO','$UPD_TS','$TRUCK_CODE','$TRUCK_WEIGHT','$STATE','$OPER_NAME','$GATE_NO','$TOTAL_WEIGHT_HT_CH','$YEAR_MADE','$EXPIRED_LISENCE','$CHASSIS_CODE','$BBG_YN','$OTL_YN','$ID_RFID')";
	

	$statement = oci_parse($koneksi,$query);

	$r = oci_execute($statement,OCI_DEFAULT);
	$res = oci_commit($koneksi);

	if ($res) {
	    // pesan jika data tersimpan
		echo "<script>alert('Data Truck berhasil ditambahkan'); 
		window.location.href='index.php'</script>";
	} else {
	    // pesan jika data gagal disimpan
		echo "<script>alert('Data Truck gagal ditambahkan');
		window.location.href='index.php'</script>";
	}
} 

else {
//jika coba akses langsung halaman ini akan diredirect ke halaman index
	header('Location: index.php'); 
}


?>