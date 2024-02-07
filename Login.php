<?php
    session_start();

    if(isset($_SESSION['login'])) {
    header('location: index.php');
    exit();
    }

    include './layout/Config.php';

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

    $cek = mysqli_num_rows($result);
        if($cek > 0) {
        $_SESSION['login'] = true;
        header('Location: index.php');
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SINTA-Login</title>
</head>
<body class="bg">
    <div class="container-fluid">
        <div class="row">
            <div class="card position-absolute top-50 start-50 translate-middle border border-info-subtle border-4 card-warna" style="width: 22rem;">
                <div class="card-title">
                    <h2 class="text-center pt-3">LOGIN</h2>
            </div>
        <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
    			<label for="">UserName</label>
    			<input type="text" name="username" class="form-control" placeholder="UserName">
    		</div>
    				
            <div class="form-group">
    			<label for="">Password</label>
    			<input type="password" name="password" class="form-control mb-3" placeholder="Password">
    		</div>

            <div class="d-flex justify-content-center">
                <button type="submit" name="login" class="btn btn-primary btn-lg">Submit</button>
            </div>

        </form>
    </div>

    <div class="card-title">
        <p class="text-center"><a href="" class="text-muted" style="text-decoration: none;">Forgot your email & Password?</a></p>
        <p class="text-center">Don't have account?<a href="Registrasi.php" style="font-size: 1.05rem; text-decoration: none;"> Register Here!</a></p>
    </div>
</div>
</div>
</div>


    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>                                                                                                                                                                                                                 