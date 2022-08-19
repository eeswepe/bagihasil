<?php 
    require "function.php";
    session_start();
    $datas = query("SELECT * FROM files ORDER BY dibuat DESC,nama ASC");
    if(!($_SESSION["username"])){
        header("Location: login.php");
    }
    if($_SESSION["username"]==="admin"){
        header("Location: admin.php");
    }
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: login.php");
    }
    if(isset($_POST["cari"])){
        $datas = cari($_POST["keyword"]);
    }
    if(isset($_POST["insert"])){
        header("Location: tweet.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-dark float-start py-4">
        <div class="container-fluid row">
            <div class="col-lg-6">
                <h1 class="text-light" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; text-align:center;letter-spacing:2px;font-weight:bold;">Bagi Hasil</h1>
            </div>
            <form class="d-flex col-lg-5 " style="padding: 0 50px 0 50px;" action="" method="post">
                <input class="form-control me-2 align-self-center mx-1 py-4 lh-lg" type="text" placeholder="keyword" aria-label="Search" name="keyword" >
                <button class="btn btn-outline-success mx-1" style="font-weight: bolder;" type="submit" name="cari">Search</button>
                <button class="btn btn-outline-info mx-1" type="submit" name="insert" style="font-weight: bolder;">Insert</button>
                <button class="btn btn-danger mx-1 " type="submit" name="logout">Log Out</button>
            </form>
        </div>
    </nav>
    <!-- card -->
    <div class="container-fluid px-5 pt-3 ">
        <div class="row">
            <?php foreach ($datas as $data) :?>
            <div class="col-sm-3">
                <div class="card my-3 mx-auto" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family:monospace;"><?= $data["nama"] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"  style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Oleh : <?= $data["author"] ?></h6>
                        <p class="card-text" style="font-family:Verdana, Geneva, Tahoma, sans-serif"><?= $data["deskripsi"] ?></p>
                        <a href="reborn/files/<?=$data['uniqid'] ?>" class="card-link">Download</a>
                        <p class="card-text"><?= $data["dibuat"] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>        
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>