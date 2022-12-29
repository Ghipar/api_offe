<?php
include 'conn.php';
$user= $_POST['Username'];
$password = md5($_POST['Password']);

$queryResult=$connect->query("SELECT * FROM akun WHERE Username ='".$user."' and Password ='".$password."' and Level = 0 ");

$result=array();


while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);


?>