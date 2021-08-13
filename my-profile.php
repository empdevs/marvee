<?php require_once('function/function.php');?>
<?php require_once('layout/header.php');?>
<?php 
if(empty($_SESSION["user_id"])){//kalo user_id gada balik lagi ke halaman login.php
    header("Location: login.php");
    exit;
}

$page=isset($_GET["page"])?$_GET["page"]:false;
$action=isset($_GET["action"])?$_GET["action"]:false;
$id=isset($_GET["id"])?$_GET["id"]:false;

?>

<section class="my-profile mb-4" id="my-profile">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="kiri">
                    <div class="profile">
                        <?php if($level == "admin"): ?>
                            <img src="images/admin.png" alt="" class="d-block img-fluid rounded-circle mx-auto">
                        <?php else: ?>
                                <img src="images/user.png" alt="" class="d-block img-fluid rounded-circle mx-auto">
                        <?php endif; ?>
                        <h5 class="text-center my-3 text-white"><?= $username; ?></h5>
                        <div id="list-example" class="list-group">
                        <?php if($level === "admin"):?>
                            <a href="?page=kategori" class="list-group-item list-group-item-action <?php if($page == 'kategori'){echo 'active';}?>">Kategori</a>
                            <a href="?page=barang" class="list-group-item list-group-item-action <?php if($page == 'barang'){echo 'active';}?>">Barang</a>
                            <a href="?page=pengiriman" class="list-group-item list-group-item-action <?php if($page == 'pengiriman'){echo 'active';}?>">Pengiriman</a>
                            <a href="?page=provinsi" class="list-group-item list-group-item-action <?php if($page == 'provinsi'){echo 'active';}?>">Provinsi</a>
                            <a href="?page=rekening" class="list-group-item list-group-item-action <?php if($page == 'rekening'){echo 'active';}?>">Rekening</a>
                            <a href="?page=ukuran" class="list-group-item list-group-item-action <?php if($page == 'ukuran'){echo 'active';}?>">Ukuran</a>
                            <a href="?page=user" class="list-group-item list-group-item-action <?php if($page == 'user'){echo 'active';}?>">User</a>
                        <?php endif;?>
                            <a href="?page=pesanan" class="list-group-item list-group-item-action <?php if($page == 'pesanan'){echo 'active';}?>">Pesanan</a>
                          </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-9">
                <div class="kanan">
                    <div class="konten">
                    <?php if($page): ?>
                        <?php if($action):?>
                            <?php require_once("page/$page/$action.php");?>
                            <?php exit; ?>
                        <?php endif; ?>
                        <?php require_once("page/$page/$page.php");?>
                    <?php else: ?>
                        <?php require_once("page/pesanan/pesanan.php");?> 
                    <?php endif; ?>
                    </div><!--konten-->
                </div><!--kanan-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<?php require_once('layout/footer.php');?>