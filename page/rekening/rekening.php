
<div class="tambah text-right">
    <a href="?page=rekening&action=tambah" class="btn btn-primary mb-1">+ Tambah <?=$page?></a>
</div>
<div class="table-responsive-lg">
                    <div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Rekening</div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Rekening</th>
                                <th scope="col">Nama Rekening</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Gambar</th>
                                <th scope="col" class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $rekening=data("SELECT * FROM","rekening");?>
                            <?php $no=1;?>
                            <?php foreach ($rekening as $r):?>
                              <tr>
                                <th scope="row"><?=$no;?></th>
                                <td><?=$r['jenis_rekening']; ?></td>
                                <td><?=$r['nama_rekening']; ?></td>
                                <td><?=$r['no_rekening']; ?></td>
                                <td><img src="images/bank/<?=$r['gambar']?>" class="img-fluid" alt="" style="width: 50px; width:50px;"></td>
                                <td><a href="?page=rekening&action=ubah&id=<?=$r['rekening_id']?>" class="btn btn-success">Ubah</a>
                                    <a href="?page=rekening&action=hapus&id=<?=$r['rekening_id']?>" class="btn btn-danger rounded-0">Hapus</a>
                                </td>
                              </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                            </tbody>
                        </table><!-- end table-->
                        <?php if(empty($rekening)): ?>
                            <h5>Belum ada data barang kamu ~</h5>
                        <?php endif; ?>
                    </div><!--end responsive-->