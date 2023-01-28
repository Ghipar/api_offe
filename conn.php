<?php
$connect = mysqli_connect("localhost","root","","project3");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>