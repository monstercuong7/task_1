<?php
include 'database.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('https://live.staticflickr.com/65535/52273200308_e399f0f2e2_b.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; width: 100vw;">

    <div class="container border  w-50" style=" border-radius: 20px; background-color: #F1ECA0;">
        <h1 class="text-center">Register</h1>
        <?php
        // print_r($_POST);
        if (isset($_POST["submit"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $error = array();
            if (empty($username) or empty($password) or empty($repassword)) {
                array_push($error,  "Không được để trống");
            }
            if (strlen($password) < 8) {
                array_push($error, "Password phải lớn hơn 8 ký tự");
            }
            if ($password != $repassword) {
                array_push($error, "Mật khẩu không trùng khớp");
            }
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($error, "Username đã tồn tại");
            }
            if (count($error) > 0) {
                foreach ($error as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<div class='alert alert-success'>Đăng ký thành công</div>";
                } else {
                    echo "<div class='alert alert-danger'>Đăng ký thất bại</div>";
                }
            }
        }
        ?>
        <form action="register.php" method="post" style="padding: 30px;">
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
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Repeat password: </label>
                <div class="form-group col-sm-8">
                    <input type="text" class="form-control " name="repassword" placeholder="nhập lại password ở đây">
                </div>
            </div>
            <div style="text-align: end; margin-top: 20px;  margin-right: 55px;">
                <input type="submit" class="btn btn-primary" name="submit">
            </div>

        </form>
        <div style="display: flex; justify-content: center;">
            <p>Bạn đã có tài khoản? <a href="login.php"> đăng nhập tại đây</a></p>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>