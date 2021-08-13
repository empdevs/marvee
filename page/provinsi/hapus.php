<?php
    $hapus=hapus("provinsi WHERE provinsi_id=$id");
    if($hapus > 0){
        echo "
        <script>
            alert('Data berhasil dihapus admin gantengku');
            document.location.href='my-profile.php?page=provinsi';
        </script>
        ";
    }
?>