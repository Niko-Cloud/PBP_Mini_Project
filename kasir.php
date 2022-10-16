<?php
    require('template/header.php');

    $query  = "SELECT * FROM barang WHERE stok != 0 ORDER BY id ";
    $query2 = "SELECT * FROM item_struk WHERE nama != '' ORDER BY tanggal";
    $result = $db->query($query);
    $result2 = $db->query($query2);

    if(!$result){
        die("Tidak bisa mengquery perintah ke database: </br>". $db->$error . "</br> Query: ". $query);
}
?>
<body>
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header  text-center">
                    Pilih Barang
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="item_name" 
                                name="item_name" placeholder="Pilih barang..." disabled required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary show-modal">Pilih</button> 
                                </div>
                            </div>
                            <br>

                            <div class="modal fade bs-example-modal-lg myModal" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel" id="myModal">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">List Barang</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table id="example" class="stripe row-border order-column" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $i = 1;
                                                while ($row = $result->fetch_object()){
                                                echo '<tr>';
                                                echo '<td>'.$i.'</td>';
                                                echo '<td>'.$row->nama.'</td>';
                                                echo '<td>Rp.'.$row->harga.'</td>';
                                                echo '<td>'.$row->stok.'</td>';
                                                echo '<td>';
                                                echo '<a href="javascript:kekeranjang('.$row->id.')" class="btn btn-primary btn-sm" name"pilih" id="pilih"> Pilih </a>                      
                                                </td>';
                                                echo '</tr>';
                                                $i++;
                                            }?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="POST">
                        <div class="form-group">
                        <input type="hidden" name="hiddenuid" id="hiddenuid" required>
                            <div class="input-group">
                                <input type="number" min="1" value="1" class="form-control" name="unit" id="unit" placeholder="Masukkan jumlah..." required>
                                <div class="input-group-append">
                                    <span class="input-group-text">Unit</span>
                                </div>
                            </div>
                        </div>
                        <br>

                        <button name="tambah" id="tambah" class="btn btn-primary float-right btntambah" onclick="invoice(uid.value); strukshow();">Tambah</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header text-center">
                    Pembayaran
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group row">
                            <label>Total Harga</label>
                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="total" id="total" placeholder="0" disabled required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah Bayar</label>

                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control inputnumber" name="pay-total" id="pay-total" placeholder="0" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="date" name="date" value="<?php echo date('l, d-m-Y');?>" disabled>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary float-right" onclick="pay(document.getElementById('pay-total').value)">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <div class="card">
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
                                class="fw-bold">//>w<\\</span></li>
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
                                <th scope="col"></th> 
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
                                    echo '<td><button type="button" style="border:none;background:none;" class="btnHapus"><img src="img/x.png" style="width:14px;height:14px;border"></button></td>';
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
                                <span><b>Rp. </b><b id="pay"></b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                <b>Total</b>
                                <span><b>Rp. </b><b id="totalhrg"></b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                <b>Kembalian</b>
                                <span><b id="return"></b></span>
                                </li>
                            </ul>
                        </div>

                <div class="col-sm-12 mt-3 text-center">
                    <p>TERIMA KASIH TELAH BERBELANJA</p>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<script>
    let uid = document.getElementById("hiddenuid");
</script>
</body>
<?php include 'template/footer.php';?>

