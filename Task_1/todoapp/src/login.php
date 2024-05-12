<?php
session_start();
include 'database.php';

if (isset($_SESSION['username'])) {
    header("location: ./index.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $user['id'];
        header('location: index.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Đăng nhập thất bại</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('https://intoroigiare.vn/wp-content/uploads/2023/11/background-dep-de-ghep-anh.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; width: 100vw;">

    <div class="container">
        <div class="row justify-content-center col-md-8 mx-auto my-6">
            <h1 class="text-center">Login</h1>
            <div class="">
                <div class="container border col-md-6 mb-3" style="border-radius: 20px; background-color: #F1ECA0;">
                    <form action="login.php" method="post" style="padding: 30px;">
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-3 col-form-label">Username: </label>
                            <div class="form-group col-sm-8">
                                <input type="text" class="form-control" name="username" placeholder="nhập username ở đây">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password: </label>
                            <div class="form-group col-sm-8">
                                <input type="text" class="form-control" name="password" placeholder="nhập password ở đây">
                            </div>
                        </div>
                        <div style="text-align: end; margin-top: 20px;  margin-right: 30px;">
                            <input type="submit" class="btn btn-primary" name="login">
                        </div>
                    </form>
                    <div style="display: flex; justify-content: center;">
                        <p>Bạn chưa đăng ký? <a href="register.php"> đăng ký tại đây</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>