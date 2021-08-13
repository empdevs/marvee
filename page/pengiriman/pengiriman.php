<div class="tambah text-right">
    <a href="?page=pengiriman&action=tambah" class="btn btn-primary mb-1">+ Tambah jasa <?=$page?></a>
</div>
<div class="table-responsive-lg">
                    <div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Jasa Pengiriman</div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jasa Pengiriman</th>
                                <th scope="col">Harga</th>
                                <th scope="col">action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $pengiriman=data("SELECT * FROM","pengiriman");?>
                            <?php $no=1;?>
                            <?php foreach ($pengiriman as $p):?>
                              <tr>
                                <th scope="row"><?=$no;?></th>
                                <td><?=$p['nama_pengiriman']; ?></td>
                                <td><?= rupiah($p['ongkir']);?></td>
                                <td><a href="?page=pengiriman&action=ubah&id=<?=$p['pengiriman_id']?>" class="btn btn-success">Ubah</a>
                                    <a href="?page=pengiriman&action=hapus&id=<?=$p['pengiriman_id']?>" class="btn btn-danger rounded-0">Hapus</a>
                                </td>
                              </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                            </tbody>
                        </table><!-- end table-->
                        <?php if(empty($pengiriman)): ?>
                            <h5>Belum ada data barang kamu ~</h5>
                        <?php endif; ?>
                    </div><!--end responsive-->