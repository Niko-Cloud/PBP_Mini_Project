


<title>Dashboard</title>

<?php
require('template/header.php');

$query = "SELECT * FROM barang ORDER BY id ";
$result = $db->query($query);

if(!$result){
    die("Tidak bisa mengquery perintah ke database: </br>". $db->$error . "</br> Query: ". $query);
}
?>
    <div class="container">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Lihat daftar barang tersedia</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Item List
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <a href="add_barang.php" class="btn btn-primary">Tambah Barang</a>
                                </div>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php 
                                        $i = 1;
                                        while ($row = $result->fetch_object()){
                                        echo '<tr>';
                                        echo '<td>'.$row->id.'</td>';
                                        echo '<td>'.$row->nama.'</td>';
                                        echo '<td>'.$row->stok.'</td>';
                                        echo '<td>Rp. '.$row->harga.'</td>';
                                        echo '<td>
                                        
                                        <a href="edit_barang.php?id='.$row->id.'" class="btn btn-warning btn-sm"> Edit </a>
                                        
                                        <a href="remove_barang.php?id='.$row->id.'" class="btn btn-danger btn-sm"> Delete </a>
                                        
                                        </td>';
                                        echo '</tr>';
                                        $i++;
                                        }?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            </div>
            
            <?php include('template/footer.php')?>
        </div>
    </div>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>