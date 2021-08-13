
<div class="tambah text-right">
    <a href="?page=barang&action=tambah" class="btn btn-primary mb-1">+ Tambah <?=$page?></a>
</div>
<div class="table-responsive-lg">
                    <div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Barang</div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Gambar</th>
                                <th scope="col" class="text-center">action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $barang=data("SELECT * FROM","barang");?>
                            <?php $no=1;?>
                            <?php foreach ($barang as $b):?>
                              <tr>
                                <th scope="row"><?=$no;?></th>
                                <td><?=$b['nama_barang']; ?></td>
                                <td><?= rupiah($b['harga']);?></td>
                                <td><img src="images/barang/<?=$b['gambar']?>" class="img-fluid" alt="" style="width: 50px; width:50px;"></td>
                                <td><a href="?page=barang&action=ubah&id=<?=$b['barang_id']?>" class="btn btn-success">Ubah</a>
                                    <a href="?page=barang&action=hapus&id=<?=$b['barang_id']?>" class="btn btn-danger rounded-0">Hapus</a>
                                </td>
                              </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                            </tbody>
                        </table><!-- end table-->
                        <?php if(empty($barang)): ?>
                            <h5>Belum ada data barang kamu ~</h5>
                        <?php endif; ?>
                    </div><!--end responsive-->