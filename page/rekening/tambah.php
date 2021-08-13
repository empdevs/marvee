<?php 
     if(isset($_POST["tambah"])){
        $tambah=tambah_rekening($_POST);
            if($tambah > 0){
                echo "
                <script>
                    alert('Data berhasil ditambahkan admin gantengku');
                    document.location.href='my-profile.php?page=rekening';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Tambah Data <?= $page;?>
</div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="jenis_rekening">Jenis Rekening</label>
            <input class="form-control" id="jenis_rekening" name="jenis_rekening">
        </div>
        <div class="form-group">
            <label for="nama_rekening">Nama Rekening</label>
            <input class="form-control" id="nama_rekening" name="nama_rekening">
        </div>
        <div class="form-group">
            <label for="nomor_rekening">Nomor Rekening</label>
            <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening">
        </div>
        <div class="form-group">
            <label for="gambar">Pilih Gambar</label><br>
            <input type="file" class="form-control-file d-inline" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
    </form>