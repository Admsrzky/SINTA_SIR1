<?php 
    include 'layout/Config.php';

    if (isset($_POST['regist'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (fullname, username, email, password) VALUES('$fullname', '$username', '$email', '$password')";
        $perintah = mysqli_query($koneksi, $query);
        echo "Data  User berhasil ditambahkan. <a href='Login.php'>lihat</a>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body class="bg">
<div class="container-fluid">
        <div class="row">
            <div class="card position-absolute top-50 start-50 translate-middle border border-info-subtle border-4 card-warna" style="width: 22rem;">
                <div class="card-title">
                    <h2 class="text-center pt-3">Registrasi</h2>
            </div>
        <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
    			<label for="">Fullname</label>
    			<input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap">
    		</div>
    				
            <div class="form-group">
    			<label for="">UserName</label>
    			<input type="text" name="username" class="form-control mb-3" placeholder="Username">
    		</div>
            
            <div class="form-group">
    			<label for="">Email</label>
    			<input type="text" name="email" class="form-control mb-3" placeholder="Email">
    		</div>
            
            <div class="form-group">
    			<label for="">Password</label>
    			<input type="password" name="password" class="form-control mb-3" placeholder="Password">
    		</div>

            <div class="d-flex justify-content-center">
                <button type="submit" name="regist" class="btn btn-primary btn-lg">Submit</button>
            </div>

        </form>
    </div>

    <div class="card-title">
        <p class="text-center"><a href="" class="text-muted" style="text-decoration: none;">Forgot your email & Password?</a></p>
        <p class="text-center">Have Account?<a href="Login.php" style="font-size: 1.05rem; text-decoration: none;"> Login Here!</a></p>
    </div>
</body>
</html>