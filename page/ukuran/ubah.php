<?php 
     if(isset($_POST["ubah"])){
        $ubah=ubah_ukuran($_POST);
            if($ubah > 0){
                echo "
                <script>
                    alert('Data berhasil diubah admin gantengku');
                    document.location.href='my-profile.php?page=ukuran';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Ubah Data <?= $page;?>
</div>
    <form action="" method="POST">
    <?php $ukuran=data("SELECT * FROM","ukuran WHERE ukuran_id='$id'"); ?>
    <?php foreach($ukuran as $u):?>
    <input type="hidden" class="form-control" id="ukuran_id" name="ukuran_id" value="<?=$u['ukuran_id']?>">
        <div class="form-group">
            <label for="nama_ukuran">Ukuran</label>
            <input class="form-control" id="nama_ukuran" name="nama_ukuran" value="<?=$u['nama_ukuran']?>">
        </div>
    <?php endforeach;?>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
    </form>