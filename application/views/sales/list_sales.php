<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Menu</a></small></h3>
	            <h3 style="display:inline-block;float:right;"><small><a href="<?php echo base_url('sales/add_sales') ?>">Tambah sales <span class="fa fa-arrow-circle-o-right"></span></a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Sales</h1>
	            <hr class="bg-teal">    
	        </div>
	    </div>
		<div class="row">
			<div class="cell" style="overflow-x: scroll;">
				<table class="table hovered border">
					<thead>
						<tr>
							<th class="sortable-column">No.</th>
							<th class="sortable-column">Nama Sales</th>
							<th class="sortable-column">Telp.</th>
							<th class="sortable-column">Outlet</th>
						</tr>
					</thead>
					<tbody>
						<?php if($sales): ?>
							<?php $i = 1; ?>
							<?php foreach($sales as $row): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row->name ?></td>
									<td><a href="tel:<?php echo $row->phone ?>"><?php echo $row->phone ?></a></td>
									<td><?php echo $row->outlet_name ?></td>
								</tr>
							<?php $i++; ?>
							<?php endforeach ?>
						<?php endif; ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>