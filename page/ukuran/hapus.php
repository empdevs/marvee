<?php 
    $hapus=hapus("ukuran WHERE ukuran_id='$id'");
    if($hapus > 0){
        echo "
        <script>
            alert('Data berhasil dihapus admin gantengku');
            document.location.href='my-profile.php?page=ukuran';
        </script>
        ";
    }
?>