
<div class="tambah text-right">
    <a href="?page=provinsi&action=tambah" class="btn btn-primary mb-1">+ Tambah <?=$page?></a>
</div>
<div class="table-responsive-lg">
                    <div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Provinsi</div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $provinsi=data("SELECT * FROM","provinsi");?>
                            <?php $no=1;?>
                            <?php foreach ($provinsi as $p):?>
                              <tr>
                                <th scope="row"><?=$no;?></th>
                                <td><?=$p['nama_provinsi']; ?></td>
                                <td><a href="?page=provinsi&action=ubah&id=<?=$p['provinsi_id']?>" class="btn btn-success">Ubah</a>
                                    <a href="?page=provinsi&action=hapus&id=<?=$p['provinsi_id']?>" class="btn btn-danger rounded-0">Hapus</a>
                                </td>
                              </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                            </tbody>
                        </table><!-- end table-->
                        <?php if(empty($provinsi)): ?>
                            <h5>Belum ada data barang kamu ~</h5>
                        <?php endif; ?>
                    </div><!--end responsive-->