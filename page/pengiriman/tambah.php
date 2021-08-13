<?php 
     if(isset($_POST["tambah"])){
        $tambah_pengiriman=tambah_pengiriman($_POST);
            if($tambah_pengiriman > 0){
                echo "
                <script>
                    alert('Data berhasil ditambahkan admin gantengku');
                    document.location.href='my-profile.php?page=pengiriman';
                </script>
                ";
            }
    }
?>
<div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Tambah Data <?= $page;?>
</div>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nama_pengiriman">Jasa Pengiriman</label>
            <input class="form-control" id="nama_pengiriman" name="nama_pengiriman">
        </div>
        <div class="form-group">
            <label for="ongkir">Ongkir</label>
            <input type="number" class="form-control" id="ongkir" name="ongkir">
        </div>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
    </form>