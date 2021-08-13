<?php
    $hapus=hapus("pengiriman WHERE pengiriman_id=$id");
    if($hapus > 0){
        echo "
        <script>
            alert('Data berhasil dihapus admin gantengku');
            document.location.href='my-profile.php?page=pengiriman';
        </script>
        ";
    }
?>