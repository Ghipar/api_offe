<?php
include 'conn.php';
$kdtk = $_POST['tko'];

$queryResult=$connect->query("UPDATE `store` SET `Produk_Terjual`= (SELECT SUM(detail_transaksi.Jumlah_Pesanan) AS total_qty FROM store INNER JOIN transaksi ON store.Kode_Toko = transaksi.Kode_Toko INNER JOIN detail_transaksi ON detail_transaksi.Kode_Transaksi = transaksi.Kode_Transaksi WHERE transaksi.Kode_Toko = '".$kdtk ."') WHERE Kode_Toko = '".$kdtk ."'");



?>