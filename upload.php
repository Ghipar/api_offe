<?php
include 'conn.php';
$image = $_FILES['image']['name'];
$username = $_POST['Username'];
$imagepath= "profile/".$image;
move_uploaded_file($_FILES['image']['tmp_name'], $imagepath);

$connect->query("UPDATE akun SET Gambar = '".$image."' WHERE Username = '".$username."'");
?>