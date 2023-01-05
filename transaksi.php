<?php
$db = mysqli_connect('localhost','root','','project3');
if(!$db) {
    echo "Database connection failed";
}

$usernama = $_POST['Uname'];
$total = $_POST['total'];
$pengambilan = $_POST['ambil'];
$kdtok = $_POST['kdtok'];
$kdmenu = $_POST['kdmn'];
$jmlhpes = $_POST['pes'];
$sub = $_POST['subtl'];
$lamat = $_POST['lamet'];

$query = "SELECT * FROM transaksi WHERE Kode_Transaksi = '1'";

$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode("Error");
} else {
    $insert = "INSERT INTO `transaksi`(`Kode_Transaksi`, `Grand_Total`, `Tanggal_transaksi`, `Pengambilan`, `Username`, `Kode_Pembayaran`, `Kode_Toko`, `Alamat`, `statust_trans`) 
    VALUES ('1','".$total."','".$ket."','".$pengambilan."','".$usernama."','chs','".$kdtok."','".$lamat."','0')";
    $query = mysqli_query($db, $insert);
    if($query) {
        echo json_encode("Success");
    }
}
?>