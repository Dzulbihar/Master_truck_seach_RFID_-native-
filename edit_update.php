<?php 

include 'function_master_truck.php';

// koneksi database
require_once 'koneksi.php';
// menangkap data yang di kirim dari form
if (!isset($_POST['submit'])){

	// mengupdate data
	$POLICE_NO = $_POST['POLICE_NO'];
	$ID_RFID = $_POST['ID_RFID'];	
	$UPD_TS_UPDATE = $_POST['UPD_TS_UPDATE'];

	$query1 = "UPDATE T1_TRUCK_MASTER 
	SET 
	ID_RFID ='".$ID_RFID."',
	UPD_TS =TO_DATE('$UPD_TS_UPDATE', 'dd-mm-yyyy hh24:mi:ss')
	WHERE POLICE_NO = '".$POLICE_NO."'";

	$statement = oci_parse($koneksi,$query1);
	$r = oci_execute($statement, OCI_DEFAULT);
	$res = oci_commit($koneksi);

	// menyimpan histori data
	$POLICE_NO = $_POST['POLICE_NO_LAMA'];
	$ID_RFID = $_POST['ID_RFID_LAMA'];
	$UPD_TS_LAMA = $_POST['UPD_TS_LAMA'];
	$UPD_BY = $_POST['USER_LOGIN'];

	$query2 = "INSERT INTO T1_TRUCK_RFID_HIST (POLICE_NO,ID_RFID,UPD_TS,UPD_BY)
	
	VALUES ('$POLICE_NO','$ID_RFID','$UPD_TS_LAMA','$UPD_BY')";

	$statement2 = oci_parse($koneksi,$query2);
	$r = oci_execute($statement2, OCI_DEFAULT);
	$res = oci_commit($koneksi);

	if ($res) {
	    // pesan jika data diubah
		echo "<script>
		alert('Data RFID Truck berhasil diupdate'); 
		window.location.href='index.php'
		</script>";
	} else {
	    // pesan jika data gagal diubah
		echo "<script>
		alert('Data RFID Truck gagal diupdate');
		window.location.href='index.php'
		</script>";
	}
} 

else {
//jika coba akses langsung halaman ini akan diredirect ke halaman index
	header('Location: index.php'); 
}


?>