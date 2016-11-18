<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3><small><a href=""><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Menu</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Outlet</h1>
	            <hr class="bg-teal">    
	        </div>
	    </div>
		<div class="row">
			<div class="cell" style="overflow-x: scroll;">
				<table class="table hovered border" id="table_outlet" >
					<thead>
						<tr>
							<th class="sortable-column">No.</th>
							<th class="sortable-column">Kode</th>
							<th class="sortable-column">Nama</th>
							<th class="sortable-column">Telp</th>
							<th class="sortable-column">Alamat</th>
							<th class="sortable-column">Manager</th>
						</tr>
					</thead>
					<tbody>
						<?php if($outlets): ?>
							<?php $i = 1; ?>
							<?php foreach($outlets as $outlet): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $outlet->code ?></td>
									<td><?php echo $outlet->name ?></td>
									<td><?php echo $outlet->phone ?></td>
									<td><?php echo $outlet->address ?></td>
									<td><?php echo $outlet->store_manager ?></td>
								</tr>		
								<?php $i++; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>