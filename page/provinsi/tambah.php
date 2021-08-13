<?php 
     if(isset($_POST["tambah"])){
        $tambah=tambah_provinsi($_POST);
            if($tambah > 0){
                echo "
                <script>
                    alert('Data berhasil ditambahkan admin gantengku');
                    document.location.href='my-profile.php?page=provinsi';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Tambah Data <?= $page;?>
</div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_provinsi">Provinsi</label>
            <input class="form-control" id="nama_provinsi" name="nama_provinsi">
        </div>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
    </form>