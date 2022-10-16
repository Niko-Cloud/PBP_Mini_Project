<title>Add Barang</title>

<?php
require('template/header.php');

if(isset($_POST["submit"])){

    $valid = TRUE;
    $nama = test_input($_POST["name"]);
    if(empty($nama)){
        $error_name = "Nama barang tidak boleh kosong!";
        $valid = FALSE;
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
        $error_name = "Nama barang hanya dapat berisi huruf dan spasi!";
        $valid = FALSE;
    }

    $stok = test_input($_POST["stok"]);
    if(empty($stok)){
        $error_stok = "Stok tidak boleh kosong!";
        $valid = FALSE;
    } elseif(!preg_match("/^[0-9]*$/",$stok)){
        $error_stok = "Stok barang hanya dapat berisi angka!";
        $valid = FALSE;
    }

    $harga = $_POST["harga"];
    if($harga == ""){
        $error_harga = "harga harus diisi!";
        $valid = FALSE;
    } elseif(!preg_match("/^[0-9]*$/",$harga)){
        $error_harga = "Harga barang hanya dapat berisi angka!";
        $valid = FALSE;
    }

    if($valid){
        $query = "INSERT INTO barang (nama, stok, harga) VALUES ('$nama', '$stok', '$harga')";
        $result = $db -> query($query);
        if(!$result) {
            die("Tidak bisa menyelesaikan query </br>". $db -> error."</br> Query:".$query);
        } else {
            $db -> close();
            header("Location: item_list.php");
        }
    }
}

?>
    <div class="container">
    <div class="card">
            <div class="card-header">
                Edit Barang
            </div> 
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php if(isset($nama)) echo $nama;?>">
                        <div class="error text-danger">
                            <?php if (isset($error_name)) echo $error_name;?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" name="stok" id="stok" class="form-control" value="<?php if(isset($stok)) echo $stok;?>">
                        <div class="error text-danger">
                            <?php if (isset($error_stok)) echo $error_stok;?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" value="<?php if(isset($harga)) echo $harga;?>">
                        <div class="error text-danger">
                            <?php if (isset($error_harga)) echo $error_harga;?>
                        </div>
                    </div>
                    
                    <div class="action mt-3">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                        </button>
                        <a href="item_list.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
    
    <?php include('template/footer.php')?>

    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>