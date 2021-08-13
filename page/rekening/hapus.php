<?php
$hapus = hapus("rekening WHERE rekening_id='$id'");
if($hapus > 0){
    echo "
    <script>
        alert('Data berhasil dihapus admin gantengku');
        document.location.href='my-profile.php?page=rekening';
    </script>
    ";
}
?>