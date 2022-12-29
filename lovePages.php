<?php
include 'conn.php';

$queryResult=$connect->query("SELECT * FROM store WHERE like_status = 'true' ORDER BY store.like_count DESC");

$result=array();

while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);


?>