<?php 
     if(isset($_POST["tambah"])){
        $tambah=tambah_ukuran($_POST);
            if($tambah > 0){
                echo "
                <script>
                    alert('Data berhasil ditambahkan admin gantengku');
                    document.location.href='my-profile.php?page=ukuran';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Tambah Data <?= $page;?>
</div>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nama_ukuran">Ukuran</label>
            <input class="form-control" id="nama_ukuran" name="nama_ukuran">
        </div>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
    </form>