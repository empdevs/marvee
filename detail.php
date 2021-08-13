<?php
require_once('function/function.php');
require_once("layout/header.php");

$barang_id=isset($_GET["barang_id"])?$_GET["barang_id"]:false;

if(isset($_POST["keranjang"])){//jika tombol Add to Cart+ ditekan jalankan aksi dibawah
    if($_POST["kuantitas"] < 1){//jika kuantitas lebih kecil dari 1
        $_POST["kuantitas"] = 1;
    }
    //ambil data
    $ukuran =htmlspecialchars($_POST["ukuran"]);
    $kuantitas = htmlspecialchars(($_POST["kuantitas"]));

    if(empty($user_id)){
        header("Location: login.php?barang_id=$barang_id&ukuran=$_POST[ukuran]&kuantitas=$_POST[kuantitas]");
        exit;
    }
   
//jika barang sejenis sudah ada di keranjang
    $data_keranjang = data("SELECT barang_id,ukuran,kuantitas FROM","keranjang WHERE user_id='$user_id'");//pilih kolom barang_id dll di tabel keranjang berdasarkan user_id saat ini;
if($data_keranjang){//jika data keranjang ada ? 
    foreach($data_keranjang as $dk){//keluarkan data
        if($dk["barang_id"] == $barang_id && $dk["ukuran"] == $ukuran){//jika barang_id dan ukurannya sama jalankan aksi ini ,Jika tidak silahkan kebawah njir jangan keesini lu salah jalan
            $kuantitas += $dk["kuantitas"]; //kuantitas user(baru) + kuantitas(lama)/kuantitas di database
            mysqli_query($koneksi,"UPDATE keranjang SET kuantitas = '$kuantitas' WHERE barang_id='$barang_id'");//ubah kuantitas = kuantitas terbaru yang ada didalam tabel keranjang berdasarkan barang_id nya
            header("Location: keranjang.php");
            exit;//stop njir jan diterusin
        }
    }
}
    mysqli_query($koneksi,"INSERT INTO keranjang VALUES('','$user_id','$barang_id','$ukuran','$kuantitas')");//kalo data baru baru jalanin ini
    header("Location: keranjang.php");
    
}elseif(isset($_POST["checkout"])){
    if($_POST["kuantitas"] < 1){
        $_POST["kuantitas"] = 1;
    }
    $ukuran =htmlspecialchars($_POST["ukuran"]);
    $kuantitas = htmlspecialchars(($_POST["kuantitas"]));
    
    if(empty($user_id)){
        header("Location: login.php?barang_id=$barang_id&ukuran=$_POST[ukuran]&kuantitas=$_POST[kuantitas]");
        $_SESSION["checkout"]=true;
        exit;
    }

    $data_keranjang = data("SELECT barang_id,ukuran,kuantitas FROM","keranjang WHERE user_id='$user_id'");//pilih kolom barang_id dll di tabel keranjang berdasarkan user_id saat ini;
    if($data_keranjang){//jika data keranjang ada ? 
        foreach($data_keranjang as $dk){//keluarkan data
            if($dk["barang_id"] == $barang_id && $dk["ukuran"] == $ukuran){//jika barang_id dan ukurannya sama jalankan aksi ini ,Jika tidak silahkan kebawah njir jangan keesini lu salah jalan
                $kuantitas += $dk["kuantitas"]; //kuantitas user(baru) + kuantitas(lama)/kuantitas di database
                mysqli_query($koneksi,"UPDATE keranjang SET kuantitas = '$kuantitas' WHERE barang_id='$barang_id'");//ubah kuantitas = kuantitas terbaru yang ada didalam tabel keranjang berdasarkan barang_id nya
                header("Location: checkout.php");
                exit;//stop njir jan diterusin
            }
        }
    }
    
    mysqli_query($koneksi,"INSERT INTO keranjang VALUES('','$user_id','$barang_id','$ukuran','$kuantitas')");//kalo data baru baru jalanin ini
    header("Location: checkout.php");
}
?>
<section class="detail" id="detail">
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <h1>Detail</h1>  
            </div>  
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-7 mb-2">
                <div class="detail-keterangan">
                    <div class="gambar-produk text-center">
                    <?php $data=data("SELECT * FROM","barang WHERE barang_id = '$barang_id'");?>
        <?php foreach($data as $row):?>
                        <img class="img-fluid" src="images/barang/<?=$row['gambar'];?>" alt="" style="width: 400px; height:450px;">
                    </div>
                    <div class="deskripsi-produk mx-4">
                        <h2>Deskripsi Produk</h2>
                        <p><?=$row['deskripsi'];?></p>
                    </div>
        
                </div>
            </div><!--end col-->
            <div class="col-lg-5">
                <div class="detail-harga">
                    <div class="container">
                        <div class="row">
                            <div class="col-12"><h5><?=$row['nama_barang'];?></h5></div><!--end col-->
                            <div class="col-12"><h3 ><?=rupiah($row['harga']);?></h3></div><!--end col-->
        <?php endforeach;?><!--end foreach-->
                        </div><!--end row-->
                <form action="" method="POST">
                        <div class="row my-4">
                                <div class="col-6">Ukuran</div>
                                <div class="col-6">
                                <?php $ukuran=data("SELECT nama_ukuran FROM","ukuran");?>
                                <select name="ukuran" id="ukuran" class="form-select">
                                <?php foreach($ukuran as $uk):?>
                                    <div class="custom-control custom-radio mx-2">
                                        <?php $customcheck = 'customCheck';
                                                $customcheck .= $uk['nama_ukuran'];
                                        ?>
                                    <option value="<?=$uk["nama_ukuran"]?>"><?=$uk["nama_ukuran"]?></option>
                                <label class="custom-control-label" for="<?=$customcheck?>"><?=$uk['nama_ukuran']?></label>
                                </div>
                                <?php endforeach;?>
                                </select>
                                
                                <!-- <select name="ukuran" id="ukuran" class="form-control form-control-sm text-center">
                                    <option value="<?=$uk['nama_ukuran'];?>"><?=$uk['nama_ukuran'];?></option>
                                </select> -->
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row my-4">
                                    <div class="col-6">Kuantitas</div>
                                    <div class="col-6">
                                        <input type="text" name="kuantitas" class="form-control" style="width: 40%;" value="1" min="1" max="100">
                                            <!-- <button type="button" class="btn btn-danger">-</button>
                                            <input type="text" class="form-control" id="kuantitas" aria-describedby="kuantitas" value="10" min="1" max="100">
                                            <button type="button" class="btn btn-success">+</button> -->
                                    </div><!--end col-->
                            </div><!--end row-->
                    
                            <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary my-2" name="checkout" id="btn-action" role="button">Beli Sekarang</button>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" name="keranjang" id="btn-secondary" role="button">Add To Cart +</button>
                                    </div>
                            </div><!--end row-->
                </div><!--end container-->
            </div><!--end col-->
            </form>
        </div><!--end row-->
    </div><!--end container-->
</section>
<?php require_once('layout/footer.php');?>