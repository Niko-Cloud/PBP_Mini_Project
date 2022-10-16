<?php 
    include("connect.php");
    $query2 = "SELECT * FROM item_struk WHERE nama != '' ORDER BY tanggal";
    $result2 = $db->query($query2);
    
    $i = 1;
    while ($row2 = $result2->fetch_object()){
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td><span class="namavoice">'.$row2->nama.'</span></td>';
        echo '<td><span class="jml">'.$row2->jumlah_barang.'</span></td>';
        echo '<td>Rp. '.$row2->harga.'</td>';
        echo '<td>Rp. <b class="hrg">'.(int)$row2->sub_total.'</b></td>';
        echo '<td><button type="button" style="border:none;background:none;" class="btnHapus"><img src="img/x.png" style="width:14px;height:14px;border"></button></td>';
        echo '</tr>';
        $i++;
    }
?>
