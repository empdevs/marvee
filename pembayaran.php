<?php require_once('layout/header2.php'); ?> 
<?php require_once('function/function.php');?>
<?php
    $rekening=isset($_GET["rekening"])?$_GET["rekening"]:false;
    $bank=data("SELECT * FROM","rekening WHERE rekening_id='$rekening'");
?>
<section class="pembayaran" id="pembayaran">
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <h1>Pembayaran</h1>
            </div><!--end col-->
        </div><!--end row-->
        <div class="keterangan-pembayaran">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                    <img class="img-fluid" src="images/undraw_online_payments_luau.svg" alt="">
                    <h4 class="text-center mt-2">Lakukan Pembayaran</h4>
                    <?php foreach($bank as $b):?>
                    <p>No.Rekening <?=$b["jenis_rekening"]?> : <span class="bold"><?=$b["no_rekening"];?></span></p> 
                    <p>Atas Nama : <span class="bold"><?=$b["nama_rekening"];?></span></p>
                    <img class="img-fluid mx-auto d-block"src="images/bank/<?=$b["gambar"]?>" alt="" style="width: 300px;">
                    <?php endforeach; ?>
                    <a href="selesai.php" class="btn btn-primary mt-3 mb-1">Selesai</a>
                    <a href="my-profile.php" class="btn btn-secondary mb-3">Nanti Saja</a>
                    <p class="note text-left">Catatan : Jika sudah melakukan pembayaran kirim bukti
                        transfer melalui WhatsApp .</p>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
    </div><!--end container -->
</section>
<?php require_once('layout/footer.php'); ?>