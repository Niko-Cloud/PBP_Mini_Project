<?php
    require('connect.php');

        $jml = $_POST['jml'];
        $nama = $_POST['nama'];
        $query11= "UPDATE barang SET stok=stok+ $jml WHERE nama ='".$nama."'";
        $data = $db->query($query11);
        if(!$data){
            die("Tidak bisa mengquery perintah ke database: </br>". $db->$error . "</br> Query: ". $query);
        }
        $queryitem = "DELETE FROM item_struk WHERE nama='".$nama."'";
        $db->query($queryitem);
?>