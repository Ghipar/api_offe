<?php
include 'conn.php';
$username = $_POST['Username'];
$queryResult=$connect->query("SELECT * FROM akun WHERE Username = '".$username."'");

$result=array();


while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);




?>