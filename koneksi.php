<?php 

// $koneksi = mysqli_connect("localhost","root","","rkap");

 ?>




 <?php
//membangun koneksi
 $username ="dashboard";
 $password ="123456";
 $database ="LOCALHOST/orcl";
 $koneksi=oci_connect ($username,$password,$database);
 if(!$koneksi) {
 	$err=oci_error();
 	echo "Gagal tersambung ke ORACLE", $err['text'];
 } else {
 	echo "";
 }


 ?>