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
	            <hr class="bg-primary">    
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
							<th>Action</th>
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
									<td><a href="tel:<?php echo $outlet->phone ?>"><?php echo $outlet->phone ?></a></td>
									<td><?php echo $outlet->address ?></td>
									<td><?php echo $outlet->store_manager ?></td>
									<td><a href="<?php echo base_url('outlets/edit_outlet/'.$outlet->id) ?>"><span class="mif mif-pencil"></span> Edit</a> - <a href="#" onclick="delete_outlet('<?php echo $outlet->id ?>','<?php echo $outlet->name ?>')"><span class="mif mif-bin"></span> Hapus</a></td>
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
<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<script src="<?php echo base_url() ?>js/alertify.min.js"></script>

<script>
	function delete_outlet(id,name){
		alertify.confirm("Apakah anda yakin ingin menghapus Toko "+name,
		  function(){
		    window.location.assign("<?php echo base_url() ?>outlets/delete_outlet/"+id);
		  },
		  function(){
		    $.Notify({caption: 'Gagal !', content: 'Toko gagal dihapus', type: 'alert'});
		  });
	}

	<?php if($this->session->userdata('success')): ?>

       <?php echo $this->session->userdata('success') ?>

    <?php endif; ?>
</script>