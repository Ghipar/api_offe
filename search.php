<?php
include 'conn.php';
$name = $_POST['name'];
$queryResult=$connect->query("SELECT * FROM store WHERE Nama_toko = '".$name."' OR Nama_toko LIKE '%".$name."%' ");

$result=array();

while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);


?>