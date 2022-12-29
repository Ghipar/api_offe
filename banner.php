<?php
include 'conn.php';

$queryResult=$connect->query("SELECT * FROM banner");
// $queryResult1=$connect->query("SELECT * FROM banner");
$result=array();



// while($fetchData1 = $queryResult1->fetch_assoc()) {
//     $result[] = $fetchData1;
// }

while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);

