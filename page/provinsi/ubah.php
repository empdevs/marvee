<?php 
     if(isset($_POST["ubah"])){
        $ubah=ubah_provinsi($_POST);
            if($ubah > 0){
                echo "
                <script>
                    alert('Data berhasil diubah admin gantengku');
                    document.location.href='my-profile.php?page=provinsi';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Ubah Data <?= $page;?>
</div>
    <?php $provinsi = data("SELECT * FROM","provinsi WHERE provinsi_id='$id'");?>
    <form action="" method="POST">
    <?php foreach($provinsi as $p):?>
    <input type="hidden" id="provinsi_id" name="provinsi_id" value="<?=$p['provinsi_id']?>">
        <div class="form-group">
            <label for="nama_provinsi">Provinsi</label>
            <input class="form-control" id="nama_provinsi" name="nama_provinsi" value="<?=$p['nama_provinsi']?>">
        </div>
    <?php endforeach;?>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
    </form>