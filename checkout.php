<?php require_once('layout/header.php'); ?>
<?php require_once('function/function.php'); ?>
<?php 
if(empty($_SESSION["user_id"])){
    header("Location: login.php");
    exit;
}
$keranjang = data("SELECT * FROM","keranjang WHERE user_id='$user_id'");
if(empty($keranjang)){//jika keranjang kosong gaboleh kesini :)
    header("Location: keranjang.php");
}

if(isset($_POST["buat_pesanan"])){//jika tombol buat pesanan di gunakan jalankan aksi dibawah
   $nama_penerima=$_POST["nama_penerima"];
   $alamat=$_POST["alamat"];
   $telepon=$_POST["telepon"];
   $provinsi=$_POST["provinsi"];
   $kota=$_POST["kota"];
   $jasa_pengiriman=$_POST["jasa_pengiriman"];
   $rekening=$_POST["rekening"];
   $status="Belum Lunas";
   date_default_timezone_set('Asia/Jakarta');
   $invoice="BR-".rand(10000,90000);
   $tanggal = date("d-m-Y H:i:s");
   if(empty($nama_penerima) || empty($alamat) ||empty($telepon) || empty($provinsi) || empty($kota) || empty($jasa_pengiriman) || empty($rekening)){//jika salah satu saja kosong maka false
       return false;
   }else{
        mysqli_query($koneksi,"INSERT INTO pesanan VALUES('','$user_id','$invoice','$nama_penerima','$alamat','$telepon','$provinsi','$kota','$jasa_pengiriman','$rekening','$status','$tanggal')");//masukin data ke tabel pesanan

        $keranjang = data("SELECT * FROM","keranjang WHERE user_id='$user_id'");//ulang data keranjang
        foreach($keranjang as $k){
            $barang_id=$k['barang_id'];
            $ukuran=$k['ukuran'];
            $kuantitas=$k['kuantitas'];

            $pesanan=data("SELECT pesanan_id FROM","pesanan WHERE user_id='$user_id'");//ulang pesanan_id
            foreach($pesanan as $p){
                $pesanan_id=$p['pesanan_id'];
            }
            mysqli_query($koneksi,"INSERT INTO pesanan_detail VALUES('','$pesanan_id','$user_id','$barang_id','$ukuran','$kuantitas')");//masukin data ke tabel pesanan detail
        }

        mysqli_query($koneksi,"DELETE FROM keranjang WHERE user_id='$user_id'");//hapus isi keranjang
    }

    

    header("Location: pembayaran.php?rekening=$rekening");//pindah ke halaman selanjutnya
   
}
?>
<section class="checkout" id="checkout">
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <h1>Checkout</h1>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-7">
                <div class="detail-penerima">
                    <h3 class="mb-4">Detail Penerima</h3>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama_penerima">Nama Penerima</label>
                            <input name="nama_penerima" id="nama_penerima" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea >
                        </div>
                        <div class="form-group">
                            <label for="telepon">Nomor Telepon</label>
                            <input type="text" name="telepon" class="form-control" minlength="12" maxlength="12" required></input >
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" class="form-control" id="provinsi">
                                <?php $provinsi=data("SELECT * FROM","provinsi");?>
                                <?php foreach($provinsi as $prov):?>
                                    <option><?=$prov['nama_provinsi'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input name="kota" id="kota" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jasa_pengiriman">Jasa Pengiriman</label>
                            <select name="jasa_pengiriman" class="form-control" id="jasa_pengiriman">
                                <?php $jasa_pengiriman=data("SELECT * FROM","pengiriman");?>
                                <?php foreach($jasa_pengiriman as $js):?>
                                    <option value="<?=$js['pengiriman_id'];?>"><?=$js['nama_pengiriman'];?> (<?=rupiah($js['ongkir']);?>)</option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Metode Pembayaran</label><br>
                            <?php $rekening=data("SELECT * FROM","rekening");?>
                            <?php foreach($rekening as $r):?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rekening" id="inlineRadio<?=$r['rekening_id']?>" value="<?=$r['rekening_id'];?>" required="required">
                                <label class="form-check-label" for="inlineRadio<?=$r['rekening_id']?>"><img src="images/bank/<?=$r['gambar'];?>" alt="" style="width: 90px; height:60px"></label>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                   
                </div>
            </div><!--end col-->
            <div class="col-lg-5">
                <div class="pesanan-kamu">
                    <div class="row">
                        <div class="col-12"><h3>Pesanan Kamu</h3></div>
                    </div><!--end row-->
                    <div class="row">
                            <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Kuantitas</th>
                                        <th scope="col">Subtotal</th>
                                      </tr>
                                    </thead>
                                    <?php $total = 0;?>
                                    <?php foreach($keranjang as $k): ?>
                                        <?php
                                            $barang_id=$k['barang_id'];
                                            $ukuran=$k['ukuran'];
                                            $kuantitas=$k['kuantitas'];
                                        ?>
                                    <?php $barang = data("SELECT * FROM","barang WHERE barang_id='$barang_id'");?>
                                    <tbody>
                                    <?php foreach($barang as $brg):?>
                                      <tr>
                                        <td><?=$brg['nama_barang'];?>
                                            (Ukuran : <?=$ukuran;?>)</td>
                                        <td class="text-center"><?=$kuantitas;?></td>
                                        <?php $subtotal = $kuantitas * $brg['harga'];?>
                                        <td><?=rupiah($subtotal);?></td>
                                        <?php $total = $total + $subtotal;?>
                                      </tr>
                                    <?php endforeach; ?>
                                    <?php endforeach; ?>
                                      <tr>
                                        <!-- <td>Ongkos Kirim </td>
                                        <td></td>
                                        <td>Rp.34.000</td> -->
                                      </tr>
                                      <tr>
                                        <th class="total" scope="col">Total Pembayaran</th>
                                        <th class="total" scope="col"></th>
                                        <th class="total" scope="col"><?=rupiah($total);?></th>
                                      </tr>
                                    </tbody>
                            </table>
                        <div class="col-12">
                            <button name="buat_pesanan" id="buat_pesanan" class="btn btn-primary">Buat Pesanan</button></div>
                        </form><!--end form-->

                    </div><!--end row-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<?php require_once('layout/footer.php'); ?>