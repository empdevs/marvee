<?php 
session_start();
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:false;
$username=isset($_SESSION["username"])?$_SESSION["username"]:false;
$login=isset($_SESSION["login"])?$_SESSION["login"]:false;
$level=isset($_SESSION["level"])?$_SESSION["level"]:false;
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
    <link rel="stylesheet" href="easySelect/easySelectStyle.css">
    <title>Marvee</title>
  </head>
  
  <body>
  <header>
      <ul class="nav">
        <div class="container">
          <div class="row">
            <div class="col-auto mr-auto">
              <ul>
                <li class="nav-item">
                  <a class="nav-link text-white" href=""><img src="images/envelope-fill.svg" alt=""> arifrozikinh@gmail.com</a>
                </li>
              </ul>
            </div><!--end col-->
            <div class="col-auto">
              <ul>
                <li class="nav-item">
                  <a class="nav-link float-left mx-3" href=""><img src="images/facebook.svg" alt=""></a>
                  <a class="nav-link float-left mx-3" href=""><img src="images/instagram.svg" alt=""></a>
                  <a class="nav-link float-left mx-3" href=""><img src="images/twitter.svg" alt=""></a>
                  <a class="nav-link float-left mx-3" href=""><img src="images/wifi.svg" alt=""></a>
                  <a class="nav-link float-left mx-3" href=""><img src="images/youtube.svg" alt=""></a>
                </li>
              </ul>
            </div><!--end col-->
          </div><!--end row-->
        </div><!--end container-->    
      </ul>
      
      <nav class="nav-tengah">
        <div class="container">
          <div class="row">
            <div class="col-auto mr-auto">
              <ul>
                <li class="nav-item">
                  <a class="navbar-brand p-0 m-0" href="http://localhost/marvee"><img src="images/logo.svg" alt="" class="img-fluid"></a>
                </li>
              </ul>
            </div>
            <div class="col-auto">
              <ul>
                <li class="nav-item d-inline-block">
                    <form>
                        <div class="form-group m-0">
                          <input type="text" class="form-control float-left mr-1" id="search" placeholder="Cari Produk...">
                        <button type="submit" class="btn btn-primary img-fluid"><img src="images/search.svg" alt=""></button>
                      </form>
                </li>
                <li class="nav-item d-inline-block ml-4">
                    <a class="ic-keranjang" href="keranjang.php"><img src="images/cart.svg" alt=""></a>
                </li>
              </ul>
            </div>
          </div><!--end row-->
        </div><!--end container-->
      </nav>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
        <?php if($user_id):?>
            <a class="nav-link text-white"><img src="images/person-fill.svg" alt=""> Hii <?=$username;?></a>
            <a class="nav-link text-white nav-profile mr-3" href="my-profile.php">My Profile</a>
            <a class="nav-link text-white nav-logout" href="logout.php">Logout</a>
        <?php else: ?>
            <a class="nav-link text-white nav-login" href="login.php"><img src="images/person-fill.svg" alt=""> Login / Register</a>
        <?php endif; ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
              <a class="nav-link text-white" href="#">Home</a>
              <a class="nav-link text-white" href="#">Kategori</a>
              <a class="nav-link text-white" href="#">Produk</a>
              <a class="nav-link text-white" href="#">Kontak</a>
            </div>
          </div>
        </div><!--end container-->
      </nav>
    </header>
      
    