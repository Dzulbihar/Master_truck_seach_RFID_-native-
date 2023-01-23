<?php 

include 'koneksi.php';

  // __________________ Cari police_no _____________________
if(isset($_GET['cari_police_no'])){

  $cari_police_no = $_GET['cari_police_no'];
  $nomor_polisi = $cari_police_no;


  $nomor1 = oci_parse($koneksi, "SELECT 
    NVL(POLICE_NO, '-')POLICE_NO,
    TO_CHAR(UPD_TS, 'yyyy-mm-dd hh24:mi:ss') AS UPD_TS,
    NVL(OWNER_NAME, '-')OWNER_NAME,
    NVL(TRADE_MARK, '-')TRADE_MARK,
    NVL(TRUCK_WEIGHT, '0')TRUCK_WEIGHT,
    NVL(TOTAL_WEIGHT_HT_CH, '0')TOTAL_WEIGHT_HT_CH,
    NVL(ID_RFID, '-')ID_RFID
    FROM T1_TRUCK_MASTER WHERE POLICE_NO='$nomor_polisi'");
  oci_execute($nomor1);

  while(($polisi = oci_fetch_array($nomor1, OCI_BOTH)) != false)
  {

    $hasil_police_no= $polisi['POLICE_NO'];
    $hasil_upd_ts= $polisi['UPD_TS'];
    $hasil_owner_name= $polisi['OWNER_NAME'];
    $hasil_trade_mark= $polisi['TRADE_MARK'];
    $hasil_truck_weight= $polisi['TRUCK_WEIGHT'];
    $hasil_total_weight_ht_ch= $polisi['TOTAL_WEIGHT_HT_CH'];
    $hasil_rfid= $polisi['ID_RFID'];
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

  // __________________ Cari history _____________________
if(isset($_GET['cari_history'])){

  $cari_history = $_GET['cari_history'];
  $nomor_polisi = $cari_history;


  $nomor1 = oci_parse($koneksi, "SELECT 
    NVL(POLICE_NO, '-')POLICE_NO,
    NVL(ID_RFID, '-')ID_RFID,
    NVL(UPD_TS, '-')UPD_TS,
    NVL(UPD_BY, '-')UPD_BY
    FROM T1_TRUCK_RFID_HIST WHERE POLICE_NO='$nomor_polisi'");
  oci_execute($nomor1);

  while(($polisi = oci_fetch_array($nomor1, OCI_BOTH)) != false)
  {
    $hasil_police_no_history= $polisi['POLICE_NO'];
    $hasil_rfid_history= $polisi['ID_RFID'];
    $hasil_waktu_history= $polisi['UPD_TS'];
    $hasil_user_login_history= $polisi['UPD_BY'];
  }

}

else{

  $hasil_police_no_history= '';
  $hasil_rfid_history= '';
  $hasil_waktu_history= '';
  $hasil_user_login_history= '';
}

?>




