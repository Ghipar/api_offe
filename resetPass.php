<?php
$db = mysqli_connect('localhost','root','','project3');
if(!$db) {
    echo "Database connection failed";
}


$emaile = $_POST['Email'];
$pass = md5($_POST['Password']) ;

$query = "SELECT * FROM akun WHERE Email = '".$emaile."'";

$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);

if ($count == 0) {
    echo json_encode("Error");
} else {
    $update = "UPDATE akun SET Password = '".$pass."' WHERE Email = '".$emaile."'";
    $query = mysqli_query($db, $update);
    if($query) {
        echo json_encode("Success");
    }
}
?>