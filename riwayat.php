<?php
include 'conn.php';
$user= $_POST['user'];
$queryResult=$connect->query("SELECT *
FROM transaksi
INNER JOIN store
ON transaksi.Kode_Toko = store.Kode_Toko WHERE transaksi.statust_trans = '2' && transaksi.Username = '".$user."'");

$result=array();

while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);


?>