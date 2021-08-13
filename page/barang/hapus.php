<?php
    $data=data("SELECT gambar FROM","barang WHERE barang_id='$id'");
    foreach($data as $d){
        unlink("images/barang/".$d["gambar"]);
    }
    $hapus=hapus("barang WHERE barang_id=$id");
    if($hapus > 0){
        echo "
        <script>
            alert('Data berhasil dihapus admin gantengku');
            document.location.href='my-profile.php?page=barang';
        </script>
        ";
    }
?>