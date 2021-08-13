<?php 
     if(isset($_POST["tambah"])){
        $tambah=tambah_barang($_POST);
            if($tambah > 0){
                echo "
                <script>
                    alert('Data berhasil ditambahkan admin gantengku');
                    document.location.href='my-profile.php?page=barang';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Tambah Data <?= $page;?>
</div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="barang">Kategori</label>
            <select class="form-control" name="kategori_id" id="kategori_id">
            <?php $kategori=data("SELECT * FROM","kategori");?>
            <?php foreach($kategori as $k):?>
                <option value="<?=$k["kategori_id"]?>"><?= $k["nama_kategori"];?></option>
            <?php endforeach; ?>
            </select>
            <!-- <input class="form-control" id="kategori_id" name="kategori_id"> -->
        </div>
        <div class="form-group">
            <label for="nama_barang">Barang</label>
            <input class="form-control" id="nama_barang" name="nama_barang">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Pilih Gambar</label><br>
            <input type="file" class="form-control-file d-inline" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
    </form>