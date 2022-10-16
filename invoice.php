<?php

require_once('connect.php');

if(isset($_POST['unit']) && isset($_POST['uid']) && $_POST['unit']!=0){
    $id = (int)$_POST['uid'];
    $unit = (int)$_POST['unit'];
    $query = "SELECT * FROM barang where id = $id";
    $result = $db->query($query);

    if(!$result){
        die("Could not query the database: <br>".$db->error);
    }
    
    $row = $result->fetch_object();
    $price = (int)$row->harga;
    $sum = (int)$price * $unit;
    if($row->stok<$unit){
        echo "<script>alert('Stok Kurang')</script>";
    }else{
        $query2 = "INSERT INTO `item_struk` (`nama`, `harga`, `jumlah_barang`, `sub_total`) VALUES ('".$row->nama."', ".$price.", ".$unit.", ".$sum.") ON DUPLICATE KEY UPDATE jumlah_barang = jumlah_barang + ".$unit.", sub_total = harga * jumlah_barang";
        $query3 = "UPDATE barang SET stok=stok - $unit WHERE id  =$id";
        $result2 = $db->query($query2);
        $db->query($query3);
    }

    
    
    header("location:login.php");
}



?>