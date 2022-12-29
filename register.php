<?php
$db = mysqli_connect('localhost','root','','project3');
if(!$db) {
    echo "Database connection failed";
}

$username = $_POST['Username'];
$emaile = $_POST['Email'];
$pass = md5($_POST['Password']) ;

$query = "SELECT * FROM akun WHERE Username ='".$username."' || Email = '".$emaile."'";

$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode("Error");
} else {
    $insert = "INSERT INTO akun (Username, Password, Level, no_hp, Email, Alamat, gambar) VALUES ('".$username."','".$pass."','0','','".$emaile."','','')";
    $query = mysqli_query($db, $insert);
    if($query) {
        echo json_encode("Success");
    }
}
?>