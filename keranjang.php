<?php require_once('function/function.php');?>
<?php require_once('layout/header.php');?>
<?php 
// if(empty($_SESSION["user_id"])){//kalo user_id gada balik lagi ke halaman login.php
//     header("Location: login.php");
//     exit;
// }

//jika langsung mencet tombol Add To Cart+ yang ada di file index

if(isset($_GET["keranjang_id"])){
    $keranjang_id=$_GET["keranjang_id"];
    hapus("keranjang WHERE keranjang_id='$keranjang_id'");
}

  $keranjang = data("SELECT * FROM","keranjang INNER JOIN ukuran ON keranjang.ukuran_id = ukuran.ukuran_id WHERE user_id='$user_id'");//pilih semua yang ada didalem tabel keranjang berdasarkan user_id saat ini
?>
<section class="keranjang" id="keranjang">
    <div class="container">
         <div class="row my-4">
            <div class="col">
                <h1>Keranjang</h1>  
            </div>  
        </div><!--end row-->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="keranjang-produk">
                    <?php if(empty($user_id)): ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <img src="images/undraw_empty_cart_co35.svg" alt="" class="img-fluid mb-3">
                                <h4>Mau belanja apa hari ini ?</h3>
                                <p>Saat ini belum ada barang dikeranjang kamu ~</p>
                                <a class="btn btn-success mx-auto d-block" href="index.php">Silahkan Belanja</a>
                            </div>
                        </div>
                    <?php else: ?>
                    <?php if(empty($keranjang)):?>
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <img src="images/undraw_empty_cart_co35.svg" alt="" class="img-fluid mb-3">
                                <h4>Mau belanja apa hari ini ?</h3>
                                <p>Saat ini belum ada barang dikeranjang kamu ~</p>
                                <a class="btn btn-success mx-auto d-block" href="index.php">Silahkan Belanja</a>
                            </div>
                        </div>
                    <?php else:?>
                    <div class="table-responsive-lg">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th class="text-center" scope="col">Ukuran</th>
                            <th class="text-center" scope="col">Kuantitas</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php $subtotal = 0;?>
                        <?php $total = 0;?>
                        <?php foreach($keranjang as $k):?><!--keluarin data keranjang yang atas tadi-->
                        <?php
                            $keranjang_id=$k['keranjang_id'];
                            $ukuran=$k['nama_ukuran'];
                            $kuantitas=$k['kuantitas'];
                            $barang_id=$k['barang_id'];
                        ?>
                        <?php $barang=data("SELECT * FROM","barang WHERE barang_id='$barang_id'"); ?><!--pilih semua data yang ada ditabel barang berdasarkan user_id saat ini-->
                        <?php foreach($barang as $brg):?><!--keluarin data barang-->
                            <tr>

                                <th scope="row"><?=$no;?></th>
                                <td><img class=" img-fluid float-left mr-2" src="images/barang/<?=$brg['gambar'];?>" alt="" style="width:61px; height:75px;"><p><?=$brg['nama_barang']?></p></td>
                                <td><?=rupiah($brg['harga']);?></td>
                                <td class="text-center"><?=$ukuran;?></td>
                                <td class="text-center"><?=$kuantitas;?></td>
                                <td>
                                    <?php $subtotal=$kuantitas * $brg['harga'];?><!--subtotal-->
                                    <?= rupiah($subtotal);?>  <!--hasil subtotal-->
                                    <?php $total+=$subtotal;?> <!--hasil total (total = total + subtotal)-->
                                </td>
                                <td><a href="?keranjang_id=<?=$keranjang_id;?>"><img class="img-fluid" src="images/trash.svg" alt=""></a></td>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                        <?php endforeach ?>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <a class="btn btn-success" href="index.php">< Kembali Belanja</a>
                     <?php endif; ?>
                     <?php endif; ?>
                    </div>
            </div><!--end col-->
        </div><!--end row-->
        <?php if(!empty($user_id)):?><!--jika user_id ada-->
            <?php if(empty($keranjang)):?><!--jika keranjang kosong maka -->
                <!--Keranjang kosong-->
            <?php else: ?><!--jika user_id ada dan isi keranjang ada tampilkan perintah dibawah-->
        <div class="row">
            <div class="col-lg-12">
                <div class="total-belanja">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5>Total Belanja</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Subtotal</p>
                            </div>
                            <div class="col-6">
                                <p class="text-right"><?= rupiah($total);?></p><!--total belanja-->
                            </div>
                            <div class="col-6">
                                <p class="total">Total</p>
                            </div>
                            <div class="col-6">
                                <p class="text-right total"><?= rupiah($total);?><!--sebenernya ini total saya malas mengganti nama variabelnya :)--></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            </div>
                        </div>
                    </div><!--end container-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    <?php endif; ?>
    <?php endif; ?>
    </div><!--end container-->
</section>

<?php require_once('layout/footer.php');?>