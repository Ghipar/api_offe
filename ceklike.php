<?php

$db = mysqli_connect('localhost','root','','project3');
if(!$db) {
    echo "Database connection failed";
}
$kd = $_POST['Kode_Toko'];
$usernm = $_POST['Username'];
$query = "SELECT * FROM store WHERE like_status = 'true' && Kode_Toko = '".$kd."'";

$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $delete = "DELETE FROM `like_table` WHERE Kode_Toko = '".$kd."'";
    $update = "UPDATE store SET like_count = (SELECT COUNT(*) AS Jmlh_like
	FROM like_table
	WHERE Kode_Toko = '".$kd."'), like_status = '' WHERE Kode_Toko = '".$kd."'";
    $query = mysqli_query($db, $delete);
    $query1= mysqli_query($db, $update);
} else {
    $insert = "INSERT INTO like_table (ID_Like, Username, Kode_Toko) VALUES ('','".$usernm."','".$kd."')";
    $update = "UPDATE store SET like_count = (SELECT COUNT(*) AS Jmlh_like
	FROM like_table
	WHERE Kode_Toko = '".$kd."'), like_status = 'true' WHERE Kode_Toko = '".$kd."'";
    $query = mysqli_query($db, $insert);
    $query2 = mysqli_query($db,  $update);
    if($query && $query2) {
        echo json_encode("Success");
    }
}


?>