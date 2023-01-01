

<?php
include 'conn.php';
$kdtok= $_POST['store_id'];
$queryResult=$connect->query('SELECT * FROM menu WHERE Kode_Toko = "'.$kdtok.'" AND katagori_menu = "Makanan"');

$result=array();

while($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);


?>