<?php
include "connect.php";

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_start();
    $data = $_SESSION['username'];
	if($_SESSION['status']!="login"){
		header("location:kasir.php");
	}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baihaqi Store</title>
    <link rel="icon" href="img/jal.ico">
    <link rel="icon" href="icon.ico" type="image/ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.dataTables.min.css"> 
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/header.css" type="text/css">
</head>


<!------ Include the above in your HEAD tag ---------->

    <!-- Navigation -->
<div class="masthead">
    <nav class="navbar navbar-expand-lg text-white-50 ">
        <div class="container">
        <a class="navbar-brand" href="item_list.php" style="color: white;"><img src="img/bar.jpg"/> Baihaqi Store</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link putih" href="item_list.php" style="color: white;"><i class="fa fa-desktop mr-2"></i> Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link putih" href="kasir.php" style="color: white;"><i class="fa fa-shopping-bag mr-2"></i> Kasir</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link putih" href="index.php" style="color: white;"><i class="fa fa-table mr-2"></i> What</a>
                            </li> -->
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                                <span class="nav-profile-name"><?php echo $data ?></span>
                                  <img src="img/lan.jpg" alt="profile"/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                    <a href="logout.php"><button class="btn">Logout</button></a>
                                </div>
                              </li>
                        </ul>
                    </div>
            </div>
        </div>
    </nav>
</div>