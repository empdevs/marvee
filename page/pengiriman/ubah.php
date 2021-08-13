<?php 
     if(isset($_POST["ubah"])){
        $ubah_pengiriman=ubah_pengiriman($_POST);
            if($ubah_pengiriman > 0){
                echo "
                <script>
                    alert('Data berhasil diubah admin gantengku');
                    document.location.href='my-profile.php?page=pengiriman';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Tambah Data <?= $page;?>
</div>
    <?php $pengiriman=data("SELECT * FROM","pengiriman WHERE pengiriman_id='$id'");?>
    <form action="" method="POST">
    <?php foreach($pengiriman as $p):?>
    <input type="hidden" id="pengiriman_id" name="pengiriman_id" value="<?=$p['pengiriman_id']?>">
        <div class="form-group">
            <label for="nama_pengiriman">Jasa Pengiriman</label>
            <input class="form-control" id="nama_pengiriman" name="nama_pengiriman" value="<?=$p['nama_pengiriman']?>">
        </div>
        <div class="form-group">
            <label for="ongkir">Ongkir</label>
            <input type="number" class="form-control" id="ongkir" name="ongkir" value="<?=$p['ongkir']?>">
        </div>
    <?php endforeach;?>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
    </form>