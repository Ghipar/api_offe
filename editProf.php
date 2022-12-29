<?php
include 'conn.php';
$username = $_POST['Username'];
$usernama = $_POST['Usernama'];
$email = $_POST['Email'];
$phone = $_POST['no_hp'];
$alamat = $_POST['Alamat'];

$connect->query("UPDATE akun SET Username = '".$username."', no_hp = '".$phone."', Email = '".$email."', Alamat = '".$alamat."' WHERE Username = '".$usernama."'");
?>