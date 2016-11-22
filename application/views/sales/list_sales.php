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
	            <hr class="bg-primary">    
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
							<th>Action</th>
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
									<td><a href="<?php echo base_url('sales/edit_sales/'.$row->id) ?>"><span class="mif mif-pencil"></span> Edit</a> - <a href="#" onclick="delete_sales('<?php echo $row->id ?>','<?php echo $row->name ?>')"><span class="mif mif-bin"></span> Hapus</a></td>
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
<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<script src="<?php echo base_url() ?>js/alertify.min.js"></script>
<script>
	function delete_sales(id,name){
		alertify.confirm("Apakah anda yakin ingin menghapus Sales "+name,
		  function(){
		    window.location.assign("<?php echo base_url() ?>sales/delete_sales/"+id);
		  },
		  function(){
		    $.Notify({caption: 'Gagal !', content: 'Sales gagal dihapus', type: 'alert'});
		  });
	}
	$(document).ready(function(){
		<?php if($this->session->userdata('sales')): ?>

	       <?php echo $this->session->userdata('sales') ?>

	    <?php endif; ?>
	});
	
</script>