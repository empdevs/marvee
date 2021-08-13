<?php 
     if(isset($_POST["tambah"])){
        $tambah=tambah_kategori($_POST);
            if($tambah > 0){
                echo "
                <script>
                    alert('Data berhasil ditambahkan admin gantengku');
                    document.location.href='my-profile.php?page=kategori';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Tambah Data <?= $page;?>
</div>
    <?php if($page === "kategori"):?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input class="form-control" id="kategori" name="kategori">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input class="form-control" id="keterangan" name="keterangan">
        </div>
        <div class="form-group">
            <label for="gambar">Pilih Gambar</label><br>
            <input type="file" class="form-control-file d-inline" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
    </form>
    <?php endif; ?>