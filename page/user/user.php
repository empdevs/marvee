
<div class="table-responsive-lg">
                    <div class="judul text-white k-1 mb-1"><img src="images/person-fill.svg" alt="" class="mr-2">User</div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">level</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $user=data("SELECT * FROM","user");?>
                            <?php $no=1;?>
                            <?php foreach ($user as $u):?>
                              <tr>
                                <th scope="row"><?=$no;?></th>
                                <td><?=$u['username']; ?></td>
                                <td><?=$u['email']; ?></td>
                                <td><?=$u['no_telepon']; ?></td>
                                <td><?=$u['level']; ?></td>
                              </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                            </tbody>
                        </table><!-- end table-->
                        <?php if(empty($user)): ?>
                            <h5>Belum ada data barang kamu ~</h5>
                        <?php endif; ?>
                    </div><!--end responsive-->