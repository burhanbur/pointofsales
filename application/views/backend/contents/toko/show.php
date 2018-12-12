<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
		</div>

		<h2 class="panel-title">Data Toko</h2>
	</header>
	<div class="panel-body">
		<table class="table table-bordered table-striped mb-none" id="datatable-default">
			<thead>
				<tr>
					<th class="center" width="20">No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th width="200">No. Telepon</th>
					<th>Email</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					$no = 1;
					foreach ($toko as $row){
					?>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->nama; ?></td>
					<td><?php echo $row->alamat; ?></td>
					<td><?php echo $row->telp; ?></td>
					<td><?php echo $row->email; ?></td>
					<td>
						
					</td>
				</tr>
					<?php }?>
			</tbody>
		</table>
	</div>
</section>