<?php
session_start(); 
    require_once('function/function.php');
    if(!empty($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }
    $barang_id=isset($_GET["barang_id"])?$_GET["barang_id"]:false;
    $ukuran=isset($_GET["ukuran"])?$_GET["ukuran"]:false;
    $kuantitas=isset($_GET["kuantitas"])?$_GET["kuantitas"]:false;

    if(isset($_POST["registrasi"])){
        if(!empty($barang_id) || !empty($ukuran) || !empty($kuantitas)){
            $username=htmlspecialchars($_POST["username"]);
            $email=strtolower(htmlspecialchars($_POST["email"]));
            $no_telepon=htmlspecialchars($_POST["no_telepon"]);
            $password=htmlspecialchars($_POST["password"]);
            $level = "customer";
    
            $data=data("SELECT username,email,no_telepon FROM","user");
            foreach ($data as $d) {
                $usernamed=$d["username"];
                $emaild=$d["email"];
                $no_telepond=$d["no_telepon"];
    
                if($username == $usernamed){
                    echo "<script>
                        alert('Username telah digunakan!');
                        alert('Registrasi gagal!');
                        document.location.href='registrasi.php?barang_id=$barang_id&ukuran=$ukuran&kuantitas=$kuantitas';
                    </script>";
                    return false;
                }
    
                if($email == $emaild){
                    echo "<script>
                        alert('Email telah digunakan!');
                        alert('Registrasi gagal!');
                        document.location.href='registrasi.php?barang_id=$barang_id&ukuran=$ukuran&kuantitas=$kuantitas';
                    </script>";
                    return false;
                }
    
                if($no_telepon == $no_telepond){
                    echo "<script>
                        alert('Nomor telah digunakan!');
                        alert('Registrasi gagal!');
                        document.location.href='registrasi.php?barang_id=$barang_id&ukuran=$ukuran&kuantitas=$kuantitas';
                    </script>";
                    return false;
                }
            }
    
            if(empty($username) || empty($email) || empty($no_telepon) || empty($password)){
                echo "<script>
                        alert('Isi data semuanya!');
                        alert('Registrasi gagal!');
                        document.location.href='registrasi.php?barang_id=$barang_id&ukuran=$ukuran&kuantitas=$kuantitas';
                    </script>";
                    return false;
            }
    
            $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$email','$no_telepon','$password','$level')");
            echo "<script>
                        alert('Registrasi berhasil!');
                        document.location.href='login.php?barang_id=$barang_id&ukuran=$ukuran&kuantitas=$kuantitas';
                    </script>";
    
        }else{
            $username=htmlspecialchars($_POST["username"]);
            $email=strtolower(htmlspecialchars($_POST["email"]));
            $no_telepon=htmlspecialchars($_POST["no_telepon"]);
            $password=htmlspecialchars($_POST["password"]);
            $level = "customer";
    
            $data=data("SELECT username,email,no_telepon FROM","user");
            foreach ($data as $d) {
                $usernamed=$d["username"];
                $emaild=$d["email"];
                $no_telepond=$d["no_telepon"];
    
                if($username == $usernamed){
                    echo "<script>
                        alert('Username telah digunakan!');
                        alert('Registrasi gagal!');
                        document.location.href='registrasi.php';
                    </script>";
                    return false;
                }
    
                if($email == $emaild){
                    echo "<script>
                        alert('Email telah digunakan!');
                        alert('Registrasi gagal!');
                        document.location.href='registrasi.php';
                    </script>";
                    return false;
                }
    
                if($no_telepon == $no_telepond){
                    echo "<script>
                        alert('Nomor telah digunakan!');
                        alert('Registrasi gagal!');
                        document.location.href='registrasi.php';
                    </script>";
                    return false;
                }
            }
    
            if(empty($username) || empty($email) || empty($no_telepon) || empty($password)){
                echo "<script>
                        alert('Isi data semuanya!');
                        alert('Registrasi gagal!');
                        document.location.href='registrasi.php';
                    </script>";
                    return false;
            }
    
            $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$email','$no_telepon','$password','$level')");
            echo "<script>
                        alert('Registrasi berhasil!');
                        document.location.href='login.php';
                    </script>";    

        }
       
    }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">

    <title>Marvee</title>
  </head>
  <body>
<section class="registrasi" id="registrasi">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-6 d-none d-lg-block d-xl-none d-none d-xl-block d-xxl-none">
            <img class="img-fluid" src="images/undraw_Create_re_57a3.svg" alt="gambar">
        </div>
            <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST">
                <img class="img-fluid" src="images/logo.svg" alt="">
                <h3 class="text-center mt-3">Registrasi</h3>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input class="form-control" type="text" name="no_telepon" id="no_telepon" minlength="12" maxlength="12" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="registrasi">Registrasi</button>
                    </div>
                    <div class="form-group">
                        <?php if(!empty($_GET)): ?>
                            <p>Silahkan login <a href="login.php?barang_id=<?=$barang_id?>&ukuran=<?=$ukuran?>&kuantitas=<?=$kuantitas?>">Disini</a></p>
                        <?php else :?>
                            <p>Silahkan login <a href="login.php">Disini</a></p>
                        <?php endif;?>
                    </div>
                </form>
            </div><!--end col--> 
        </div><!--end row-->
    </div><!--end container-->
</section>
