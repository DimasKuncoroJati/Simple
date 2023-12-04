<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<?php
			if (isset($_SESSION['hapus_sukses']) || isset($_SESSION['update_sukses'])) :
				$notif = '';

				isset($_SESSION['hapus_sukses']) ? $notif .= $_SESSION['hapus_sukses'] : '';
				isset($_SESSION['update_sukses']) ? $notif .= $_SESSION['update_sukses'] : '';
			?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Sukses!</strong> <?php echo $notif; ?>
				</div>
			<?php
			endif;
			?>

			<div class="panel panel-primary">
				<div class="panel-heading">Data Produk</div>
				<div class="panel-body">
					<div class="col-md-12" style="padding-bottom: 15px;">
						<a href="<?php echo base_url('home/formtambah'); ?>">
							<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
						</a>
					</div>

					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Kode Produk</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Kategori id</th>
										<th>Status id</th>
										<th>Opsi</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$no = 1;
									foreach ($database as $db) : ?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $db->kdproduk; ?></td>
											<td><?php echo $db->nama_produk; ?></td>
											<td><?php echo $db->harga; ?></td>
											<td><?php echo $db->kategori_id; ?></td>
											<td><?php echo $db->status_id; ?></td>
											<td>
												<a href="<?php echo base_url('home/formedit/' . $db->kdproduk); ?>"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
												<a href="<?php echo base_url('home/hapusdata/' . $db->kdproduk); ?>" onclick="return confirm('Anda yakin hapus ?')"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></a>
											</td>
										</tr>
									<?php
										$no++;
									endforeach;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
/*print_r($database);

	echo "<br> <br>";

	foreach ($database as $key => $value)
	{
		echo $key;
		echo $value->kdmobil;
	}

	echo "<br> <br>";

	$lol = 	[
			[
				'nama' => 'ardi',
				'kelas' => '2'
			],
			[
				'nama' => 'nesia',
				'kelas' => '3'
			]
			];

	print_r($lol);

	echo $lol['0']['nama'];

	echo "<br> <br>";

	foreach ($lol as $key => $value) 
	{
		echo $value['nama'];
	}

	echo "<br> <br>";

	$lol = 	['nama' => 'ardi', 'kelas' => '2'];

	foreach ($lol as $key => $value) 
	{
		echo $key;
		echo $value;
	} */
?>