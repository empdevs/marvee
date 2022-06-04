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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
          <div class="row">
        <?php if($user_id):?>
            <a class="nav-link text-white"><img src="images/person-fill.svg" alt=""> Hii <?=$username;?></a>
            <a class="nav-link text-white nav-profile mr-3" href="my-profile.php">My Profile</a>
            <a class="nav-link text-white nav-logout" href="logout.php">Logout</a>
        <?php else: ?>
            <a class="nav-link text-white nav-login" href="login.php"><img src="images/person-fill.svg" alt=""> Login / Register</a>
        <?php endif; ?>
          </div>
        </div><!--end container-->
      </nav>
    </header>
      
    