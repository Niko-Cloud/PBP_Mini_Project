


<title>Delete Barang</title>

<?php
require('template/header.php');

if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(empty($id)){
        header("Location: item_list.php");
    }
} else {
    header("Location: item_list.php");
}

if(!isset($_POST["submit"])){
    $query = "SELECT * FROM barang WHERE $id=id ORDER BY id ";
    $result = $db->query($query);

    if(!$result){
        die("Tidak bisa mengquery perintah ke database: </br>". $db->$error . "</br> Query: ". $query);
    } else {
        while($row = $result -> fetch_object()){
            $nama = $row -> nama;
            $stok = $row -> stok;
            $harga = $row -> harga;
        } 
    }

} else {
    $query = "DELETE FROM barang WHERE id=".$id." ";
    $result = $db -> query($query);
    if(!$result) {
        die("Tidak bisa menyelesaikan query </br>". $db -> error."</br> Query:".$query);
    } else {
        $db -> close();
        header("Location: item_list.php");
    }

}

?>
    <div class="container">
    <div class="card">
            <div class="card-header">
                Delete Barang
            </div> 
            <div class="card-body">
                <p>Yakin ingin menghapus barang? Berikut adalah detail barang:</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>" method="post">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $nama?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" name="stok" id="stok" class="form-control" value="<?php echo $stok?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $harga?>" disabled>
                    </div>
                    
                    <div class="action mt-3">
                        <button type="submit" class="btn btn-danger" name="submit" value="submit">
                        Delete Item
                        </button>
                        <a href="item_list.php" class="btn btn-primary">Cancel</a>
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