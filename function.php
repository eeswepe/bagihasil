<?php 
    $conn = mysqli_connect("localhost",'root','','db_reborn');

    function query($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row; 
        }
        return $rows;
    }

    function register($data){
        global $conn;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn,$data["password"]);
        $confirmpassword = mysqli_real_escape_string($conn,$data["confirm-password"]);

        if($username==="" || $password===""){
            echo "<script>
                     alert('isi seluruh kolom dengan benar');
                 </script>";
            return false;
        }

        // cek username sama
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                     alert('username telah tersedia');
                 </script>";
            return false;
        }
        // cek dua password
        if($password !== $confirmpassword){
            echo "<script>
                     alert('password tidak sesuai');
                 </script>";
            return false;
        }
        // encrypt password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user VALUES ('$username','$password')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function upload(){
        $namaFile = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $tmpName = $_FILES['file']['tmp_name'];

        $ekstensi = ['jpg','png','pdf','docx','doc','ppt','pptx','xlsx','mp4'];
        $ekstensiGambar = explode('.',$namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensi)){
            return false;
        }
        if( $ukuran > 1000000){
            echo "<script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>";
            return false;
        }
        $namaBaru = uniqid();
        $namaBaru .= '.';
        $namaBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName,'files/'.$namaBaru);
        return $namaBaru;
    }

    function posting($data){
        $nama = $data["namafile"];
        $author = $_SESSION["username"];
        $deskripsi = $data["deskripsi"];
        $file = upload();
        global $conn;
        if(!$file){
            return false;
        }
        $query = "INSERT INTO files VALUES ('$file','$nama','$author','$deskripsi',NOW())";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function cari($cari){
        $query = "SELECT * FROM files WHERE nama LIKE '%$cari%' OR deskripsi LIKE '%$cari%' OR author LIKE '%$cari%'";
        return query($query);
    }

    function delete($data){
        global $conn;
        unlink("files/".$data);
        mysqli_query($conn, "DELETE FROM files WHERE uniqid = '$data'");
        return mysqli_affected_rows($conn);
    }

?>