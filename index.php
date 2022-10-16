<?php

session_start();
require_once('connect.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {
    $valid = TRUE;

    $username = test_input($_POST['username']);
    if ($username == '') {
        $error_username = 'username is required';
        $valid = FALSE;
    }

    $password = test_input($_POST['password']);
    if ($password == '') {
        $error_password = 'Password is required';
        $valid = FALSE;
    }

    if ($valid) {
        $query = "SELECT * FROM admin WHERE username='".$username."' AND password='".md5($password)."' ";
        $result = $db->query($query);
        if(!$result){
            die ("Couldn't query the database: <br/>".$db->error);
        }else{
            if($result->num_rows>0){
                $_SESSION['status'] = "login";
                $_SESSION['username'] = $username;
                header('Location:item_list.php');
                exit;
            }else{
                echo '<script>alert("Combination of username and password are not correct.")</script>';
            }
        }
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" href="img/jal.ico">
        <link rel="icon" href="icon.ico" type="image/ico">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" type="username" placeholder="Username" name="username" value="<?php if (isset($username)) echo $username; ?>" />
                                                <label for="username">Username</label>
                                                <div class="error"><?php if (isset($error_username)) echo $error_username ?></div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" placeholder="Password" name="password" value="<?php if (isset($password)) echo $password; ?>" />
                                                <label for="password">Password</label>
                                                <div class="error"><?php if (isset($error_password)) echo $error_password ?></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="submit" value="submit" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php include('template/footer.php')?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
