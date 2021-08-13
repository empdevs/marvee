                <div class="table-responsive-lg">
                    <div class="judul text-white p-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">Pesanan</div>    
                        <table class="table">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal & Jam</th>
                                <th scope="col">Status</th>
                                <th scope="col">action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($level == "admin"){
                              $pesanan=data("SELECT pesanan_id,invoice,nama_penerima,status,tanggal FROM","pesanan");
                            }else{
                              $pesanan=data("SELECT pesanan_id,invoice,nama_penerima,status,tanggal FROM","pesanan WHERE user_id='$user_id'");
                            }
                            ?>
                            <?php $no=1;?>
                            <?php foreach ($pesanan as $p):?>
                              <tr>
                                <th scope="row"><?=$no;?></th>
                                <td><?=$p['invoice']; ?></td>
                                <td><?=$p['nama_penerima']; ?></td>
                                <td><?=$p['tanggal'];?></td>
                                <td><?=$p['status']?></td>
                                <td><a href="?page=detail_pesanan&id=<?=$p["pesanan_id"]?>" class="btn btn-primary rounded-0">Lihat Pesanan</a>
                                  <?php if($level == "admin"):?>
                                    <a href="?page=pesanan&action=ubah&id=<?=$p["pesanan_id"]?>" class="btn btn-success mt-1">Ubah</a>
                                  <?php endif;?>
                                </td>
                              </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                            </tbody>
                        </table><!-- end table-->
                        <?php if(empty($pesanan)): ?>
                            <h5>Belum ada pesanan kamu ~</h5>
                        <?php endif; ?>
                        <a href="index.php" class="btn btn-success mt-2">Belanja Yuk</a>
                    </div><!--end responsive-->