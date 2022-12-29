<?php
include 'conn.php';

$queryResult=$connect->query("SELECT * FROM store ORDER BY store.Produk_Terjual DESC");

$result=array();





while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);








?>