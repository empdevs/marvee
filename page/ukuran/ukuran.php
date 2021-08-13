
<div class="tambah text-right">
    <a href="?page=ukuran&action=tambah" class="btn btn-primary mb-1">+ Tambah <?=$page?></a>
</div>
<div class="table-responsive-lg">
                    <div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Ukuran</div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Ukuran</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $ukuran=data("SELECT * FROM","ukuran");?>
                            <?php $no=1;?>
                            <?php foreach ($ukuran as $u):?>
                              <tr>
                                <th scope="row"><?=$no;?></th>
                                <td><?=$u['nama_ukuran']; ?></td>
                                <td><a href="?page=ukuran&action=ubah&id=<?=$u['ukuran_id']?>" class="btn btn-success">Ubah</a>
                                    <a href="?page=ukuran&action=hapus&id=<?=$u['ukuran_id']?>" class="btn btn-danger rounded-0">Hapus</a>
                                </td>
                              </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                            </tbody>
                        </table><!-- end table-->
                        <?php if(empty($ukuran)): ?>
                            <h5>Belum ada data barang kamu ~</h5>
                        <?php endif; ?>
                    </div><!--end responsive-->