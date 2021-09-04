
<?php
    if(isset($_POST["ubah"])){
        $ubah=ubah_barang($_POST);
       if($ubah > 0){
        echo "
        <script>
            alert('Data berhasil diubah admin gantengku');
            document.location.href='my-profile.php?page=barang';
        </script>
        ";
       }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Ubah Data <?= $page;?>
</div>
        <?php $barang=data("SELECT * FROM","barang INNER JOIN kategori ON barang.kategori_id = kategori.kategori_id WHERE barang_id = '$id'");?>
        <?php $kategori=data("SELECT * FROM","kategori");?>
        <?php $ukuran = data("SELECT * FROM","ukuran") ?>
        <?php $ukuran_user = data("SELECT * FROM","barang_ukuran INNER JOIN ukuran ON barang_ukuran.ukuran_id = ukuran.ukuran_id WHERE barang_id = '$id'") ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="barang" class="m-0">Kategori</label><br>
            <?php foreach($barang as $b):?>
                <small class="text-muted">Kategori sebelumnya (<?= $b["nama_kategori"] ?>)</small>
            <?php endforeach; ?>
            <select class="form-control" name="kategori_id" id="kategori_id">
            <?php foreach($barang as $b):?>
               
                <option disabled value="<?=$b["kategori_id"]?>"><?= $b["nama_kategori"];?></option>
            <?php endforeach; ?>
            <?php foreach($kategori as $k):?>
                <option value="<?=$k["kategori_id"]?>"><?= $k["nama_kategori"];?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <?php foreach($barang as $b):?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="barang_id" name="barang_id" value="<?= $b["barang_id"];?>">
        </div>
        <div class="form-group">
            <label for="nama_barang">Barang</label>
            <input class="form-control" id="nama_barang" name="nama_barang" value="<?=$b["nama_barang"]?>">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?=$b["harga"]?>">
        </div>
        <div class="form-group">
            <label for="harga" class="m-0">Ukuran</label><br>
            <small class="text-muted">Ukuran sebelumnya (<?php foreach($ukuran_user as $uu): ?>
                                    <?= $uu["nama_ukuran"]; ?>,
                                 <?php endforeach ?>)
            </small>
            <select class="form-select" name="ukuran[]" id="demo" multiple="multiple">
                <?php foreach($ukuran as $u): ?>
                    <option value="<?=$u['ukuran_id']?>"><?=$u['nama_ukuran']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?=$b["deskripsi"]?></textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Pilih Gambar</label><br>
            <input type="file" class="form-control-file d-inline" id="gambar" name="gambar">
            <img src="images/barang/<?= $b["gambar"];?>" alt="" style="width: 100px; height:100px;">
        </div>
        <?php endforeach;?>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
    </form>