<?php
     $data=data("SELECT gambar_kategori FROM","kategori WHERE kategori_id='$id'");
     foreach($data as $d){
         unlink("images/barang/".$d["gambar_kategori"]);
     }
    $hapus=hapus("kategori WHERE kategori_id=$id");
    if($hapus > 0){
        echo "
        <script>
            alert('Data berhasil dihapus admin gantengku');
            document.location.href='my-profile.php?page=kategori';
        </script>
        ";
    }
?>