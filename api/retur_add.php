<?php

session_start();

date_default_timezone_set("Asia/Jakarta");

 header("Access-Control-Allow-Origin: *");

 include_once 'koneksi.php';



// cek


// $id= $_POST['id'];

$id= $_POST['id'];
$nama_supplier= $_POST['nama_supplier'];
$nama_barang= $_POST['nama_barang'];
$qty= $_POST['qty'];
$total= $_POST['total'];
$pengambilan_barang= $_POST['pengambilan_barang'];
$no_retur= $_POST['no_retur'];


// cek double 

$sqlcek = "SELECT no_retur FROM retur WHERE no_retur='$no_retur'";


$jml = $conn->query($sqlcek)->rowCount();

if($jml > 0 ){

    echo 402;

}else{

    $sql="INSERT INTO `retur`
            (`no_retur`,
             `tgl`,
             `nama_supplier`,
             `nama_barang`,
                 `qty`,
                 `total`,
                 `pengambilan_barang`)
    VALUES ('$no_retur',
            NOW(),
            '$nama_supplier',
            '$nama_barang',
            '$qty',
            '$total',
            '$pengambilan_barang');";



    if ($conn->query($sql)) {

      

      echo 200;

    }else{

      echo 404;

    }


}





?>