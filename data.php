<?php

    require('connect.php');

    extract($_POST);

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query= "SELECT * FROM barang WHERE id = '$id'";
        $data = $db->query($query);
        $re = array();
        
        if(mysqli_num_rows($data) > 0){
            while ($row = mysqli_fetch_assoc($data)){
                $re = $row;
            }
        }
        echo json_encode($re);
    }
?>