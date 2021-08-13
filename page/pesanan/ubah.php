
<?php
    if(isset($_POST["ubah"])){
        $ubah_status=ubah_status($_POST);
       if($ubah_status > 0){
        echo "
        <script>
            alert('Data berhasil diubah admin gantengku');
            document.location.href='my-profile.php?page=pesanan';
        </script>
        ";
       }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Ubah Data <?= $page;?>
</div>
    <form action="" method="POST">
        <input type="hidden" name="pesanan_id" id="pesanan_id" value="<?=$id?>">
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
            <?php $status=data("SELECT status FROM","pesanan WHERE pesanan_id='$id'");?>
            <?php foreach($status as $s):?>
                <option value="<?= $s["status"]?>"><?= $s["status"]?></option>
                <option value="Ditolak">Ditolak</option>
                <option value="Lunas">Lunas</option>
            <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
    </form>