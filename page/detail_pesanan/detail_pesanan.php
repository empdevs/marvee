<?php
$pesanan=data("SELECT * FROM","pesanan WHERE pesanan_id='$id'");?>
<section class="detail-pesanan" id="detail-pesanan">
	<img src="images/logo.svg" class="img-fluid d-block mb-2" style="width: 200px;">
	<table class="mb-4">
	<?php foreach($pesanan as $p):?>
	<?php $rekening=$p["rekening"];?>
	<?php $id_jasa_pengiriman=$p["jasa_pengiriman"];?>
		<tr>
			<td><h5>Invoice</h5></td>
			<td class="px-3"><h5>:</h5></td>
			<td><h5><?= $p["invoice"]; ?></h5></td>
		</tr>
		<tr>
			<td>Nama Penerima</td>
			<td class="px-3">:</td>
			<td><?= $p["nama_penerima"]; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td class="px-3">:</td>
			<td><?= $p["alamat"]; ?></td>
		</tr>
		<tr>
			<td>Provinsi</td>
			<td class="px-3">:</td>
			<td><?= $p["provinsi"]; ?></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td class="px-3">:</td>
			<td><?= $p["kota"]; ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td class="px-3">:</td>
			<td><?= $p["telepon"]; ?></td>
		</tr>
		<tr>
			<td>Tanggal & Jam</td>
			<td class="px-3">:</td>
			<td><?= $p["tanggal"]; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<div class="table-responsive">
	<table class="table table-sm">
		<thead class="thead-light">
			<tr>
			<th scope="col">No</th>
			<th scope="col">Produk</th>
			<th scope="col">Harga</th>
			<th scope="col">Kuantitas</th>
			<th scope="col">Ukuran</th>
			<th scope="col">Subtotal</th>
			</tr>
		</thead>
		<tbody>
		<?php $no = 1; ?>
		<?php $total = 0; ?>
		
		<?php $barang_pesanan=data("SELECT * FROM","pesanan_detail INNER JOIN barang ON pesanan_detail.barang_id = barang.barang_id INNER JOIN ukuran ON pesanan_detail.ukuran_id = ukuran.ukuran_id WHERE pesanan_id='$id'"); ?>
		<?php foreach($barang_pesanan as $bp):?>
			<tr>
				<th scope="row"><?=$no;?></th>
				<td><?=$bp["nama_barang"];?></td>
				<td><?= rupiah($bp["harga"]);?></td>
				<td class="text-center"><?=$bp["kuantitas"];?></td>
				<td><?=$bp["nama_ukuran"];?></td>
				<td>
					<?php $subtotal = $bp["harga"] * $bp["kuantitas"];?>
					<?= rupiah($subtotal);?>
					<?php $total = $total + $subtotal; ?>
				</td>
			</tr>
			<?php $no++; ?>
		<?php endforeach;?>
		
		<tr>
			<td colspan="4"></td>
			<td>Ongkos Kirim</td>
		<?php $kurir=data("SELECT * FROM","pengiriman WHERE pengiriman_id='$id_jasa_pengiriman'"); ?>
		<?php foreach($kurir as $k):?>
			<td><?= rupiah($k["ongkir"]);?></td>
			<?php $total += $k["ongkir"];?> 
		<?php endforeach; ?>
		</tr>
		<tr>
			<td colspan="4"></td>
			<td><h4 class="harga font-weight-bold">Total</h4></td>
			<td><h4 class="harga font-weight-bold"><?= rupiah($total);?></h4></td>
		</tr>
		</tbody>
	</table>
	<a href="my-profile.php" class="btn btn-success" style="width: 150px;">Kembali</a>
	<a href="pembayaran.php?rekening=<?=$rekening?>" class="btn btn-primary float-right" style="width: 150px;">Bayar</a>
</div>
</section>
