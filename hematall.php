<?php
include 'conn.php';
$kdtok= $_POST['store_id'];
$queryResult=$connect->query("SELECT * FROM menu WHERE katagori_menu = 'Paket' && Kode_Toko = '".$kdtok."'");

$result=array();

while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);


?>