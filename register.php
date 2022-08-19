<?php 
    require "function.php";

    if ( isset($_POST["submit"])) {
        if(register($_POST) > 0){
            echo "<script>
                     alert('data berhasil ditambahkan');
                     document.location.href = 'index.php';
                 </script>";
        } else {
            echo "<script>
                     document.location.href = 'register.php';
                 </script>";
        }
     }
     if(isset($_POST["login"])){
        header("Location: login.php");
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
        <h1 style="text-align: center;width:100%;color:white;letter-spacing:3px" class="col-lg-4">Register</h1>
    </nav>
    <form action="" method="post">
        <div class="container-fluid mx-auto px-5">
            <div class="input-group my-3">
                <span class="input-group-text" id="inputGroup-sizing-default"style="height: 80px; font-weight:bolder;font-size:larger">Username :</span>
                <input type="text" name="username" id="namafile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" require="required" style="height: 80px;">
            </div>
            <div class="input-group my-3">
                <span class="input-group-text" id="inputGroup-sizing-default"style="height: 80px; font-weight:bolder;font-size:larger">Password : </span>
                <input type="password" name="password" id="namafile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" require="required" style="height: 80px;">
            </div>
            <div class="input-group my-3">
                <span class="input-group-text" id="inputGroup-sizing-default"style="height: 80px; font-weight:bolder;font-size:larger">Confirm Password : </span>
                <input type="password" name="confirm-password" id="namafile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" require="required" style="height: 80px;">
            </div>
            <button type="submit" class="btn btn-success" name="login">Login</button>
            <span style="width: 10px;"></span>
            <button type="submit" class="btn btn-success" name="submit">Register</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>