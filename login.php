<?php 
    session_start();
    require "function.php";
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username==="admin" && $password==="admin"){
            $_SESSION["username"] = "admin";
            header("Location: admin.php");
            exit();
        }

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if(mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])){
                $_SESSION["username"]=$row["username"];
                header("Location: index.php");
                exit();
            }
        }
        $error = true;
    }
    if(isset($_POST["register"])){
        header("Location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark d-flex row justify-content-center">
        <h1 style="text-align: center;width:100%;color:white;letter-spacing:3px" class="col-lg-4">Login</h1>
    </nav>
    <?php if(isset($error)):?>
        <div class="container mt-2">
            <p style="color:red;font-weight:bold;font-family:Verdana, Geneva, Tahoma, sans-serif">Username atau password salah.</p>
        </div>
    <?php endif ?>
    <div class="container-fluid px-5 mx-auto">
        <form action="" method="post">
            <div class="input-group my-3" style="height: 80px;">
                <span class="input-group-text" id="inputGroup-sizing-default" style="font-weight: bolder;font-size:larger">Username :</span>
                <input type="text" name="username" id="namafile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" require="required" style="height: 80px;font-size:larger">
            </div>
            <div class="input-group my-3">
                <span class="input-group-text" id="inputGroup-sizing-default" style="height: 80px; font-weight:bolder;font-size:larger">Password : </span>
                <input type="password" name="password" id="namafile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" require="required" style="height: 80px; font-size:larger">
            </div>
            <div class="input-group my-3">
                <button type="submit" class="btn btn-success" name="login">Login</button>
                <span style="width: 10px;"></span>
                <button type="submit" class="btn btn-success" name="register">Register</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>