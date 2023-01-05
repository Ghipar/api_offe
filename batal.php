<?php
include 'conn.php';
$kdtrans = $_POST['trans'];


$connect->query("UPDATE transaksi SET statust_trans = '3' WHERE Kode_Transaksi = '".$kdtrans."'");
?>