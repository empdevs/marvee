
<div class="tambah text-right">
    <a href="?page=kategori&action=tambah" class="btn btn-primary mb-1">+ Tambah <?=$page?></a>
</div>
<div class="table-responsive-lg">
                    <div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Kategori</div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col" class="text-center">action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $kategori=data("SELECT * FROM","kategori");?>
                            <?php $no=1;?>
                            <?php foreach ($kategori as $k):?>
                              <tr>
                                <th scope="row"><?=$no;?></th>
                                <td><?=$k['nama_kategori']; ?></td>
                                <td><?=$k['keterangan'];?></td>
                                <td><img src="images/barang/<?=$k['gambar_kategori']?>" class="img-fluid" alt="" style="width: 50px; width:50px;"></td>
                                <td><a href="?page=kategori&action=ubah&id=<?=$k['kategori_id']?>" class="btn btn-success">Ubah</a>
                                    <a href="?page=kategori&action=hapus&id=<?=$k['kategori_id']?>" class="btn btn-danger rounded-0">Hapus</a>
                                </td>
                              </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                            </tbody>
                        </table><!-- end table-->
                        <?php if(empty($kategori)): ?>
                            <h5>Belum ada data kategori kamu ~</h5>
                        <?php endif; ?>
                    </div><!--end responsive-->