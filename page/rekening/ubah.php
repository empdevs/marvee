
<?php
    if(isset($_POST["ubah"])){
        $ubah_rekening=ubah_rekening($_POST);
       if($ubah_rekening > 0){
        echo "
        <script>
            alert('Data berhasil diubah admin gantengku');
            document.location.href='my-profile.php?page=rekening';
        </script>
        ";
       }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Ubah Data <?= $page;?>
</div>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php $rekening=data("SELECT * FROM","rekening WHERE rekening_id='$id'");?>
        <?php foreach($rekening as $r):?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="rekening_id" name="rekening_id" value="<?= $r["rekening_id"];?>">
        </div>
        <div class="form-group">
            <label for="jenis_rekening">Jenis Rekening</label>
            <input class="form-control" id="jenis_rekening" name="jenis_rekening" value="<?=$r["jenis_rekening"]?>">
        </div>
        <div class="form-group">
            <label for="nama_rekening">Nama Rekening</label>
            <input class="form-control" id="nama_rekening" name="nama_rekening" value="<?=$r["nama_rekening"]?>">
        </div>
        <div class="form-group">
            <label for="no_rekening">Nomor Rekening</label>
            <input type="number" class="form-control" id="no_rekening" name="no_rekening" value="<?=$r['no_rekening']?>">
        </div>
        <div class="form-group">
            <label for="gambar">Pilih Gambar</label><br>
            <input type="file" class="form-control-file d-inline" id="gambar" name="gambar">
            <img src="images/bank/<?= $r["gambar"];?>" alt="" style="width: 100px; height:100px;">
        </div>
        <?php endforeach;?>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
    </form>