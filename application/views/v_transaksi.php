<br><br><h2 align="center">Transaction</h2> <br><br>
<div class="col-md-6">
	<table id="example" class="table table-hover table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Merk</th>
				<th>Price</th>
				<th>Stock</th>
				<th>Categori</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0; foreach($tampil_sepatu as $sepatu): $no++; ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$sepatu->nama_sepatu?></td>
				<td><?=$sepatu->harga?></td>
				<td><?=$sepatu->stok?></td>
				<td><?=$sepatu->nama_kategori?></td>
				<?php if($sepatu->stok>0): ?>
				<td><a href="<?=base_url('index.php/transaksi/addcart/'.$sepatu->id_sepatu)?>" class="btn btn-info">Buy</a></td>
			<?php elseif($sepatu->stok==0): ?>
				<td><button type="button" class="btn btn-danger" data-toggle="popover" data-content="Stok habis, segera hubungi admin?">Sold</button></td>
			<?php endif ?>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>

<div class="col-md-6">
	<form action="<?=base_url('index.php/transaksi/simpan')?>" method="post">
		<a href="<?=base_url('index.php/transaksi/clearcart')?>" class="btn btn-danger">Clear Cart</a>
		Name of Buyer : <input type="text" name="nama_pembeli" class="form-control" style="display: inline-block;width:200px"><br>
		<input type="hidden" name="id_user" class="form-control" value="<?= $this->session->userdata('id_user'); ?>" style="display: inline-block;width:200px"><br>
		<table class="table table-striped table-hover" blocked>
			<tr>
				<th>No</th>
				<th>Merk</th>
				<th>QTY</th>
				<th>Price</th>
				<th>Subtotal</th>
				<th>Action</th>
			</tr>
				<?php $no=0; foreach($this->cart->contents() as $items): $no++; ?>
				<input type="hidden" name="id_sepatu[]" value="<?=$items['id']?>">
				<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">
			<tr>
				<td><?=$no?></td>
				<td><?=$items['name']?></td>
				<td width="2"><input type="number" required name="qty[]" value="<?=$items['qty']?>" class="form-control" style="padding: 4px;width: 47px"></td>
				<td><?=number_format($items['price'])?></td>
				<td><?=number_format($items['subtotal'])?></td>
				<td><a href="<?=base_url('index.php/transaksi/hapus_cart/'.$items['rowid'])?>" class="btn btn-danger">&times;</a></td>
			</tr>
			<?php endforeach ?>
			<input type="hidden" name="total" value="<?=$this->cart->total()?>">
			<tr style="border-bottom:5px black solid">
				<th colspan="4">Grandtotal</th>
				<th><?= number_format($this->cart->total()) ?></th>
				<th></th>
			</tr>
			<tr>
				<th colspan="4">Pay</th>
				<th><input type="number" name="uang_bayar" class="form-control" style="display: inline-block;width:200px"></th>
				<th></th>
			</tr>
		</table>
		<input type="submit" name="update" class="btn btn-success" value="Update QTY">
		<input required type="submit" name="bayar" onclick="return confirm('Are you sure?')" class="btn btn-warning" value="Pay">
	</form>
<?php if ($this->session->flashdata('pesan')): ?>
	<div class="alert alert-warning"><?= $this->session->flashdata('pesan'); ?></div>
<?php endif ?>
</div>
