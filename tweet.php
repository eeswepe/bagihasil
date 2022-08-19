<?php 
    session_start();
    require "function.php";
    if(!($_SESSION["username"])){
        header("Location: login.php");
    }
    if(isset($_POST["posting"])){
        if(posting($_POST)>0){
            echo "<script>
                     alert('data berhasil ditambahkan');
                     document.location.href = 'index.php';
                 </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah | Bagi Hasil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <h3 style="text-align: center;width:100%;color:white;">Add Post</h3>
    </nav>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group my-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Filename:</span>
                <input type="text" name="namafile" id="namafile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" require="required">
            </div>
            <div class="input-group my-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Desc : </span>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" require="required">
            </div>
            <div class="input-group my-3">
                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file" id="file">
                <button type="submit" class="btn btn-success" name="posting">submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>