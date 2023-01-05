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
// $kode++;
$ket = date("Ymd");
$kodeauto =  $ket . sprintf("%03s", $nourut);

// echo ($kode);


//ini 
$query = "SELECT * FROM transaksi WHERE  Kode_Transaksi = '".($kodeauto -1)."'";

$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);



if ($count == 0) {
    // echo json_encode("pertamax");
    // echo 'halo';
    //transaksi dan detail menggunakan kodeauto
    
    $insert = "INSERT INTO `transaksi`(`Kode_Transaksi`, `Grand_Total`, `Tanggal_transaksi`, `Pengambilan`, `Username`, `Kode_Pembayaran`, `Kode_Toko`, `Alamat`, `statust_trans`) 
    VALUES ('".$kodeauto."','".$total."','".$ket."','".$pengambilan."','".$usernama."','chs','".$kdtok."','".$lamat."','0')";
    $query = mysqli_query($db, $insert);
    $insert2 = "INSERT INTO `detail_transaksi`(`Kode_Transaksi`, `Kode_Menu`, `Jumlah_Pesanan`, `Sub_Total`) 
    VALUES ('".$kodeauto."','".$kdmenu."','".$jmlhpes."','".$sub."')";
    $query2 = mysqli_query($db, $insert2);
    if($query && $query2) {
        echo json_encode("1Success");
    } else {
        echo json_encode("1Error");
    }
    
    
} else {
    // echo json_encode("keduax");
    //detail transaksi saja menggunakan kodeauto-1
    
    $insert3 = "INSERT INTO `detail_transaksi`(`Kode_Transaksi`, `Kode_Menu`, `Jumlah_Pesanan`, `Sub_Total`) 
    VALUES ('".($kodeauto-1)."','".$kdmenu."','".$jmlhpes."','".$sub."')";
    $query3 = mysqli_query($db, $insert3);
    
   
    if($query3) {
        echo json_encode("2Success");
    } 
    else if (!$query3) {
        
        $insert4 = "INSERT INTO `transaksi`(`Kode_Transaksi`, `Grand_Total`, `Tanggal_transaksi`, `Pengambilan`, `Username`, `Kode_Pembayaran`, `Kode_Toko`, `Alamat`, `statust_trans`) 
        VALUES ('".$kodeauto."','".$total."','".$ket."','".$pengambilan."','".$usernama."','chs','".$kdtok."', '".$lamat."', '0')";
        $query4 = mysqli_query($db, $insert4);
        $insert5 = "INSERT INTO `detail_transaksi`(`Kode_Transaksi`, `Kode_Menu`, `Jumlah_Pesanan`, `Sub_Total`) 
        VALUES ('".$kodeauto."','".$kdmenu."','".$jmlhpes."','".$sub."')";
        $query5 = mysqli_query($db, $insert5);
        
        if($query4&&$query5) {
            echo json_encode("3Success");
        } else {
            echo json_encode("3Error");
        }
    }
    
}


?>