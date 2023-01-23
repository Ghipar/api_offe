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

$sql = mysqli_query($db,"select max(Kode_Transaksi) as maxKT from transaksi");
$data = mysqli_fetch_array($sql);

$kode = $data['maxKT'];

$nourut = (int) substr($kode, 8, 3);


$nourut++;
$ket = date("Ymd");
$kodeauto =  $ket . sprintf("%03s", $nourut);


$update = "UPDATE `transaksi` SET `Grand_Total`='".$total."',
`Tanggal_transaksi`='".$ket."',`Pengambilan`='".$pengambilan."',
`Username`='".$usernama."',`Kode_Pembayaran`='chs',`Kode_Toko`='".$kdtok."',`Alamat`='".$lamat."',`statust_trans`='0' 
WHERE Kode_Transaksi = '".($kodeauto-1)."'";
$query = mysqli_query($db, $update);

$insert5 = "INSERT INTO `detail_transaksi`(`Kode_Transaksi`, `Kode_Menu`, `Jumlah_Pesanan`, `Sub_Total`) 
VALUES ('".($kodeauto-1)."','".$kdmenu."','".$jmlhpes."','".$sub."')";
$query5 = mysqli_query($db, $insert5);



?>