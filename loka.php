<?php
include 'conn.php';
$dis = $_POST['distance'];
$queryResult=$connect->query("UPDATE store SET distance = '".$dis."'");

$result=array();

while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);


?>