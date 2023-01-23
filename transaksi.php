<?php
$db = mysqli_connect('localhost','root','','project3');
if(!$db) {
    echo "Database connection failed";
}

$usernama = $_POST['Uname'];
$kdtok = $_POST['kdtok'];


$sql = mysqli_query($db,"select max(Kode_Transaksi) as maxKT from transaksi");
$data = mysqli_fetch_array($sql);

$kode = $data['maxKT'];

$nourut = (int) substr($kode, 8, 3);


$nourut++;

$ket = date("Ymd");
$kodeauto =  $ket . sprintf("%03s", $nourut);


$insert = "INSERT INTO `transaksi`(`Kode_Transaksi`, `Grand_Total`, `Tanggal_transaksi`, `Pengambilan`, `Username`, 
`Kode_Pembayaran`, `Kode_Toko`, `Alamat`, `statust_trans`) 
VALUES ('".$kodeauto."','0','2023-01-04','Dine','".$usernama."','chs','".$kdtok."','as','0')";
$query = mysqli_query($db, $insert);

?>