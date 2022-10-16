<?php require('template/header.php');
//    $queryclean = "TRUNCATE item_struk";
//    $db->query($queryclean); 
    $t_harga = $_GET["totalharga"];
    $t_bayar = $_GET["totalbayar"];
    $query2 = "SELECT * FROM item_struk WHERE nama != '' ORDER BY tanggal";
    $result2 = $db->query($query2);
    $query3 = "INSERT INTO `struk`(`total_harga`, `Cek`) VALUES (".$t_harga.",'0')";
    $db->query($query3);
    $query4 = "SELECT id_struk FROM struk WHERE Cek != 1 and total_harga = ".$t_harga."";
    $result3 = $db->query($query4);
    $obj = $result3->fetch_object();
    $query5 = "UPDATE `struk` SET `Cek`= 1 WHERE id_struk = '".$obj->id_struk."'";
    $db->query($query5);
    $i = 0;
?>

<body>
    <link rel="stylesheet" href="css/button.css">
    <h2 id="notif" style="text-align: center;">Payment Success</h2>
    <br>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <div class="card" id="struk">
                <div class="card-header text-center">
                    BAIHAQI STORE
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="col-md-12">
                        <div class="text-center">
                            <i class="fab fa-4x ms-0" style="font-size: 20px">Detail Invoice</i>
                            <br>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                            <li class="text-muted"><i class="fas fa-circle" style="color:grey ;"></i> <span
                                class="fw-bold">Struk ID: </span><?php echo $obj->id_struk; ?></li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:grey ;"></i> <span
                                class="fw-bold">Nama Kasir: </span><?php echo $data ?></li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <ul class="list-unstyled">
                            <li class="text-muted"><i class="fas fa-circle" style="color:grey ;"></i> <span
                                class="fw-bold">Tanggal: </span><?php echo date('l, d-m-Y');?></li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:grey ;"></i> <span
                                class="fw-bold">Waktu: </span><?php echo date('H:i:s a');?></li>
                            </ul>
                        </div>
                    </div>
                    <hr class="mt-0">
                    <div class="row my-auto mx-auto justify-content-center">
                        <table class="table table-striped table-borderless" id="myTable">
                            <thead style="background-color:#d9d4d8 ;" class="text-black">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Sub-Total</th> 
                            </tr>
                            </thead>
            
                            <tbody id="fetchstruk">
                            <?php 
                                $i = 1;
                                while ($row2 = $result2->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$i.'</td>';
                                    echo '<td><span class="namavoice">'.$row2->nama.'</span></td>';
                                    echo '<td><span class="jml">'.$row2->jumlah_barang.'</span></td>';
                                    echo '<td>Rp. '.$row2->harga.'</td>';
                                    echo '<td>Rp. <b class="hrg">'.(int)$row2->sub_total.'</b></td>';
                                    echo '</tr>';
                                    $i++;
                            }?>
                            </tbody>

                        </table>
                        </div>

                        <div class="col-12">
                            <hr class="mt-2">
                            <ul class="list-group border-0">
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                <b >Bayar</b>
                                <span><b>Rp. </b><b id="pay"><?php echo $t_bayar?></b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                <b>Total</b>
                                <span><b>Rp. </b><b id="totalhrg"><?php echo $t_harga?></b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                <b>Kembalian</b>
                                <span><b>Rp. </b><b id="return"><?php echo (int)$t_bayar-(int)$t_harga?></b></span>
                                </li>
                            </ul>
                        </div>

                <div class="col-sm-12 mt-3 text-center">
                    <p>TERIMA KASIH TELAH BERBELANJA</p>
                </div>
            </div>
        </div>
    <!-- </div>
        <figure class="text-center">
            <img src="img/rid.jpg" class="figure-img img-fluid rounded" alt="img/rider" id="what">
            <figcaption class="figure-caption text-center">Beautiful isn't she?</figcaption>
        </figure>
    </div>
    <section class="button-style"> 
        <div class="text-center"> 
        <a href="javascript:hmm()" class="highlight-button btn btn-medium button xs-margin-bottom-five" data-abc="true" id="no"><i class="fa fa-warning"></i>No Thank You Ma'am</a>
        <a href="index.php" class="highlight-button btn btn-medium button xs-margin-bottom-five" data-abc="true" id="yes"><i class="fa fa-check-square-o"></i>Yeah I Will</a>
        </div>
        

    </section> -->
    <!-- <script type="text/javascript">
        let what = document.getElementById("what");
        let no = document.getElementById("no");
        let yes = document.getElementById("yes");
        function hmm(){
            document.getElementById("notif").innerHTML = "DUSA GOES BRRRRR";
            what.src = "img/gor.jpg";
            no.innerHTML = "So-sorry";
            yes.text = "F-fine";
            no.href = "index.php";
        }
    </script> -->
    <div class="text-center">
            <div class="btn btn-secondary" onclick="printStruk('struk')">Print Struk</div>
    </div>
    <script>
        function printStruk(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        }
    </script>

    
    
</body>

<?php include 'template/footer.php';?>
