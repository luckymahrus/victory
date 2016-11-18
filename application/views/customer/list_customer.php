<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3><small><a href=""><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Menu</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Customer</h1>
	            <hr class="bg-teal">    
	        </div>
	    </div>
	    
		<div class="row">
			<div class="cell">
				<table class="table hovered border">
					<thead>
						<tr>
							<th class="sortable-column">No</th>
							<th class="sortable-column">Nama</th>
							<th class="sortable-column">Tipe</th>
							<th class="sortable-column">Telephone</th>
							<th class="sortable-column">Email</th>
							<th class="sortable-column">Alamat</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						<?php foreach($customers as $customer): ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $customer->name ?></td>
							<td><?php echo $customer->type ?></td>
							<td><?php echo $customer->telephone ?></td>
							<td><?php echo $customer->email ?></td>
							<td><?php echo $customer->address ?></td>
						</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>