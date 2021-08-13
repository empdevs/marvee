<?php
    if(isset($_POST["ubah"])){
        $ubah=ubah_kategori($_POST);
            if($ubah > 0){
                echo "
                <script>
                    alert('Data berhasil diubah admin gantengku');
                    document.location.href='my-profile.php?page=kategori';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Ubah Data <?= $page;?>
</div>
    <?php if($page === "kategori"):?>
    <?php $data=data("SELECT * FROM","kategori WHERE kategori_id=$id");?>
    <form action="" method="POST" enctype="multipart/form-data">
    <?php foreach($data as $isi_kategori):?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="kategori_id" name="kategori_id" value="<?= $isi_kategori["kategori_id"];?>">
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input class="form-control" id="kategori" name="kategori" value="<?= $isi_kategori["nama_kategori"];?>">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input class="form-control" id="keterangan" name="keterangan" value="<?= $isi_kategori["keterangan"];?>">
        </div>
        <div class="form-group">
            <label for="gambar">Pilih Gambar</label><br>
            <input type="file" class="form-control-file d-inline" id="gambar" name="gambar" value="<?= $isi_kategori["gambar"];?>">
            <img src="images/barang/<?= $isi_kategori["gambar"];?>" alt="" style="width: 100px; height:100px;">
        </div>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
    <?php endforeach; ?>
    </form>
    <?php endif; ?>
