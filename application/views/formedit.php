<?php
defined('BASEPATH') or exit('Akses langsung tidak diperbolehkan');
//echo validation_errors();
?>

<section class="container-fluid">
	<div class="row">
		<div class="form-input clearfix">
			<div class="col-md-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Edit Data produk</div>
					<div class="panel-body">
						<!-- <form action="<?php //echo base_url('home/tambahproduk'); 
											?>" method="post" class="form-horizontal"> -->

						<?php echo form_open('home/updateproduk/' . $db->kdproduk, ['class' => 'form-horizontal', 'method' => 'post']); ?>
						<div class="form-group <?php echo (form_error('kdproduk') != '') ? 'has-error has-feedback' : '' ?>">
							<label for="kdproduk" class="control-label col-sm-2">Kode produk </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="kdproduk" value="<?php echo set_value('kdproduk', $db->kdproduk); ?>" readonly>
								<?php echo (form_error('kdproduk') != '') ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
								<?php echo form_error('kdproduk'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="nama_produk" class="control-label col-sm-2">nama_produk </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nama_produk" value="<?php echo set_value('nama_produk', $db->nama_produk); ?>">
								<?php echo form_error('nama_produk'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="harga" class="control-label col-sm-2">harga </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="harga" value="<?php echo set_value('harga', $db->harga); ?>">
								<?php echo form_error('harga'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="kategori_id" class="control-label col-sm-2">kategori_id </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="kategori_id" value="<?php echo set_value('kategori_id', $db->kategori_id); ?>">
								<?php echo form_error('kategori_id'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="status_id" class="control-label col-sm-2">status_id </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="status_id" value="<?php echo set_value('status_id', $db->status_id); ?>">
								<?php echo form_error('status_id'); ?>
							</div>
						</div>

						<div class="form-group">
							<div class="btn-form col-sm-12">
								<a href="<?php echo base_url('home/lihatdata'); ?>"><button type="button" class='btn btn-default'>Batal</button></a>
								<button type="submit" class='btn btn-primary'>Simpan</button>
							</div>
						</div>
						<?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>