<?php 
    require_once('function/function.php');
    session_start();
    if(!empty($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    $barang_id=isset($_GET["barang_id"])?$_GET["barang_id"]:false;
    $ukuran=isset($_GET["ukuran"])?$_GET["ukuran"]:false;
    $kuantitas=isset($_GET["kuantitas"])?$_GET["kuantitas"]:false;

    if(isset($_POST["login"])){
        if(!empty($barang_id) || !empty($ukuran) || !empty($kuantitas)){
            if(!empty($_SESSION["checkout"])){
                $email=$_POST["email"];
                $password=$_POST["password"];
                $query=mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'");
                if(mysqli_num_rows($query) > 0){
                        foreach($query as $user){
                            if(!password_verify($password,$user["password"])){
                                echo "<script>
                                    alert('Password atau Email yang anda masukkan salah');
                                    document.location.href='login.php';
                                </script>";
                                exit;
                            }else{
                                $_SESSION["login"]=true;
                                $_SESSION["user_id"]=$user["user_id"];
                                $_SESSION["username"]=$user["username"];
                                $_SESSION["level"]=$user["level"];
                                    $query=mysqli_query($koneksi,"INSERT INTO keranjang VALUES('','$_SESSION[user_id]','$barang_id','$ukuran','$kuantitas')");
                                    if(!empty($query)){
                                        echo "<script>
                                        alert('Login Berhasil');
                                            document.location.href='checkout.php';
                                        </script>";
                                    }
                                }
                            }    
                    }else{
                        echo "<script>
                            alert('Email Tidak terdaftar');
                            document.location.href='login.php?barang_id=$barang_id&ukuran=$ukuran&kuantitas=$kuantitas';
                        </script>";
                        }
                    exit;
                    }
                
                    $email=$_POST["email"];
                    $password=$_POST["password"];
                    $query=mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'");
                    if(mysqli_num_rows($query) > 0){
                            foreach($query as $user){
                                if(!password_verify($password,$user["password"])){
                                    echo "<script>
                                        alert('Password atau Email yang anda masukkan salah');
                                        document.location.href='login.php';
                                    </script>";
                                    exit;
                                }else{
                                    $_SESSION["login"]=true;
                                    $_SESSION["user_id"]=$user["user_id"];
                                    $_SESSION["username"]=$user["username"];
                                    $_SESSION["level"]=$user["level"];
                                        $query=mysqli_query($koneksi,"INSERT INTO keranjang VALUES('','$_SESSION[user_id]','$barang_id','$ukuran','$kuantitas')");
                                        if(!empty($query)){
                                            echo "<script>
                                            alert('Login Berhasil');
                                                document.location.href='keranjang.php';
                                            </script>";
                                        }
                                    }
                                }    
                            }else{
                                echo "<script>
                                        alert('Email Tidak terdaftar');
                                </script>";
                            }
                }else{
                    $email=$_POST["email"];
                    $password=$_POST["password"];
                    $query=mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'");
                    if(mysqli_num_rows($query) > 0){
                            foreach($query as $user){
                                if(!password_verify($password,$user["password"])){
                                    echo "<script>
                                        alert('Password atau Email yang anda masukkan salah');
                                        document.location.href='login.php';
                                    </script>";
                                }else{
                                    $_SESSION["login"]=true;
                                    $_SESSION["user_id"]=$user["user_id"];
                                    $_SESSION["username"]=$user["username"];
                                    $_SESSION["level"]=$user["level"];

                                    if($_SESSION["level"] === 'admin'){
                                        echo "<script>
                                            alert('Selamat Datang Admin Gantengku');
                                            document.location.href='index.php';
                                        </script>";
                                    }
                                    echo "<script>
                                        alert('Login Berhasil');
                                        document.location.href='index.php';
                                    </script>";
                                }    
                            }
                        }else{
                            echo "<script>
                                alert('Email Tidak terdaftar');
                            </script>";
                        }
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
<section class="login" id="login">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-6">
            <img class="img-fluid" src="images/undraw_Login_re_4vu2.svg" alt="gambar">
        </div>
            <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST">
                <img class="img-fluid" src="images/logo.svg" alt="">
                <h3 class="text-center mt-3">Login</h3>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="login">Login</button>
                    </div>
                    <div class="form-group">
                    <?php if(!empty($_GET)):?>
                        <p>Belum punya akun ?<br>Buat Akun <a href="registrasi.php?barang_id=<?=$barang_id?>&ukuran=<?=$ukuran?>&kuantitas=<?=$kuantitas?>">Disini</a></p>
                    <?php else: ?>
                        <p>Belum punya akun ?<br>Buat Akun <a href="registrasi.php">Disini</a></p>
                    <?php endif;?>
                    </div>
                </form>
            </div><!--end col--> 
        </div><!--end row-->
    </div><!--end container-->
</section>

