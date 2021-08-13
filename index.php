<?php require_once('function/function.php'); ?>
<?php require_once('layout/header.php');?>
<?php

  $barang_id=isset($_GET["barang_id"])?$_GET["barang_id"]:false;
  $ukuran=isset($_GET["ukuran"])?$_GET["ukuran"]:false;
  $kuantitas=isset($_GET["kuantitas"])?$_GET["kuantitas"]:false;

  $kategori_id=isset($_GET["kategori_id"])?$_GET["kategori_id"]:false;

  if(isset($_GET["barang_id"]) && isset($_GET["ukuran"]) && isset($_GET["kuantitas"])){//jika sudah login
      if(!empty($_SESSION["login"])){
          $barang_id=$_GET['barang_id'];
          $ukuran=$_GET['ukuran'];
          $kuantitas=$_GET['kuantitas'];
          mysqli_query($koneksi,"INSERT INTO keranjang VALUES('','$user_id','$barang_id','$ukuran','$kuantitas')");
          header("Location: keranjang.php");
      }else{
          header("Location: login.php?barang_id=$barang_id&ukuran=$ukuran&kuantitas=$kuantitas");
      }
  }
?>
    <!-- slider -->
    <section class="slider" id="slider">
      <div class="container">
          <div class="row">
            <div class="col-lg-8">
                <div id="carouselExampleSlidesOnly" class="carousel slide border mb-4" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img src="images/slider-1.svg" class="d-block w-100 img-fluid" alt="...">
                      </div>
                    </div>
                  </div>
            </div><!--end col-->
            <div class="col-lg-4">
                <div id="carouselExampleSlidesOnly" class="carousel slide mb-4" data-ride="carousel">
                    <div class="carousel-inner ">
                      <div class="carousel-item active ">
                          <img src="images/slider-2.svg" class="d-block w-100 img-fluid" alt="...">
                      </div>
                    </div>
                  </div>
                  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner ">
                        <div class="carousel-item active">
                            <img src="images/slide-2.svg" class="d-block img-fluid w-100" alt="...">
                        </div>
                      </div>
                    </div>
            </div>
          </div><!--end row-->
      </div><!--end container-->
    </section>
    <!-- end slider -->

    <section class="kategori" id="kategori">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <img class="img-fluid" src="images/tags-fill.svg" alt=""><h1 class="d-inline"> KATEGORI</h1>
            <hr>
          </div>
        </div><!--end row-->
        <div class="row">
        <?php $kategori=data("SELECT * FROM","kategori");?><!--ambil data di tabel kategori-->
        <?php foreach($kategori as $k):?><!--keluarin data-->
          <div class="col-lg-4">
            <a href="index.php?kategori_id=<?=$k['kategori_id']?>">
            <div class="item-kategori my-2">
              <img class="float-left mx-3 img-fluid" src="images/barang/<?=$k['gambar'];?>" alt="" style="width: 116px; height:137px;">
              <div class="keterangan-kategori">
                <h2 class="m-0"><?=$k['nama_kategori'];?></h2>
                <p><?=$k['keterangan'];?></p>
              </div>
            </div>
            </a>
          </div><!--end col-->
        <?php endforeach;?>
        </div><!--end row-->
      </div><!--end container-->
    </section>
<?php if(!$kategori_id):?>
    <section class="penjualan-terbaik" id="penjualan-terbaik">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <img class="img-fluid" src="images/star-fill.svg" alt=""><h1 class="d-inline"> PENJUALAN TERBAIK</h1>
            <hr>
          </div>
        </div><!--end row-->
        <div class="row">
        <?php $penjualan_terbaik=data("SELECT * FROM","barang ORDER BY barang_id DESC LIMIT 3");
        ?><!--ambil data di tabel barang diambil hanya 3 dari yang paling terakhir-->
        <?php foreach($penjualan_terbaik as $pt): ?><!--keluarin data-->
          <div class="col-lg-4">
            <div class="item-penjualan my-2">
              <div class="gambar-penjualan mx-2">
                <img class="float-left img-fluid" src="images/barang/<?=$pt['gambar'];?>" alt="" style="width: 130px; height:104px;">
              </div>
              <div class="keterangan-penjualan">
                <p><?=$pt['nama_barang'];?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div><!--end row-->
      </div><!--end container-->
    </section>
<?php endif;?>

    <section class="semua-kategori" id="semua-kategori">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <img class="img-fluid" src="images/bookmark-star-fill.svg" alt=""><h1 class="d-inline ml-3">SEMUA KATEGORI</h1>
            <hr>
          </div><!--end col-->
        </div><!--end row-->
        <div class="row">
          <?php 
          if($kategori_id){
            $barang=data("SELECT * FROM","barang WHERE kategori_id='$kategori_id'");//ambil data di tabel barang secara acak-->
          }else{
             $barang=data("SELECT * FROM","barang ORDER BY RAND()");//<!--ambil data di tabel barang secara acak-->
          }?>
          <?php  $ukuran=data("SELECT nama_ukuran FROM","ukuran ORDER BY nama_ukuran ASC LIMIT 1");?>
          <?php foreach($barang as $b): ?><!--keluarin data-->
          <div class="col-lg-3">
            <div class="item-semua-kategori my-2">
              <div class="gambar text-center">
                <img class="img-fluid" src="images/barang/<?=$b['gambar'];?>" alt="" style="width: 150px; height:186px;">
              </div>
              <p class="m-0"><?=$b['nama_barang']; ?></p>
              <p class="harga mb-2"><?=rupiah($b['harga']);?></p>
              <div class="btn-action">
                <a href="detail.php?barang_id=<?=$b['barang_id']?>" class="btn btn-primary">Detail</a>
                <?php foreach($ukuran as $u): ?><!--keluarin data-->
                  <a href="?barang_id=<?=$b['barang_id']?>&ukuran=<?=$u['nama_ukuran']?>&kuantitas=1" class="btn btn-cart btn-primary">Add To Cart +</a>
                <?php endforeach; ?>
                </div>
              </div>
            </div><!--end col-->
          <?php endforeach; ?>
        </div><!--end row-->
      </div><!--end container-->
    </section>

    <section class="banner" id="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="item-banner">
              <img class="float-left img-fluid mr-2" src="images/bag-check.svg" alt="">
              <h5 class="text-white">ORIGINAL PRODUCTS</h5>
              <p class="text-white">We always sell authentic original
                product to our customer</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="item-banner">
              <img class="float-left img-fluid mr-2" src="images/truck.svg" alt="">
              <h5 class="text-white">EXPRESS SHIPPING</h5>
              <p class="text-white">Get all your orders delivered right
                next day you place your order</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="item-banner">
              <img class="float-left img-fluid mr-2" src="images/clock.svg" alt="">
              <h5 class="text-white">24/7 SUPPORT</h5>
              <p class="text-white">Our customer support team is ready to
                help you in every point</p>
            </div>
          </div>
        </div><!--end row-->
      </div><!--end container-->
    </section>

    <section class="semua-kategori" id="semua-kategori">
      <div class="container">
        <div class="row">

            <?php foreach($barang as $b): ?><!--keluarin data-->
              <div class="col-lg-3">
                <div class="item-semua-kategori my-2">
                    <div class="gambar text-center">
                      <img class="img-fluid" src="images/barang/<?=$b['gambar'];?>" alt="" style="width: 150px; height:186px;">
                    </div>
                    <p class="m-0"><?=$b['nama_barang']; ?></p>
                    <p class="harga mb-2">Rp<?=number_format($b['harga']);?></p>
                    <div class="btn-action">
                      <a href="detail.php?barang_id=<?=$b['barang_id']?>" class="btn btn-primary">Detail</a>  
                    <?php foreach($ukuran as $u): ?><!--keluarin data-->
                     <a href="?barang_id=<?=$b['barang_id']?>&ukuran=<?=$u['nama_ukuran']?>&kuantitas=1" class="btn btn-cart btn-primary">Add To Cart +</a>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div><!--end col-->
            <?php endforeach; ?>
        </div><!--end row-->
      </div><!--end container-->
    </section>

<?php require_once('layout/footer.php'); ?>


















