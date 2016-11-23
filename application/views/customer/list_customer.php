<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Menu</a></small></h3>
	            <h3 style="display:inline-block;float:right;"><small><a href="<?php echo base_url('customer/add_customer') ?>">Tambah Customer <span class="fa fa-arrow-circle-o-right"></span></a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Customer</h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    
		<div class="row">
			<div class="cell" style="overflow-x: scroll;">
				<table class="table hovered border">
					<thead>
						<tr>
							<th class="sortable-column">No</th>
							<th class="sortable-column">Nama</th>
							<th class="sortable-column">Tipe</th>
							<th class="sortable-column">Telephone</th>
							<th class="sortable-column">Email</th>
							<th class="sortable-column">Alamat</th>
							<th class="sortable-column">Outlet</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($customers): ?>
							<?php $i=1; ?>
							<?php foreach($customers as $customer): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $customer->name ?></td>
								<td><?php echo $customer->type ?></td>
								<td><a href="tel:<?php echo $customer->phone ?>"><?php echo $customer->phone ?></a></td>
								<td><?php echo $customer->email ?></td>
								<td><?php echo $customer->address ?></td>
								<td>
									<?php $outlet = $this->crud_model->get_by_condition('outlets', array('id'=>$customer->outlet_id))->row('name');
										echo $outlet;
									?>
								</td>
								<td><a href="<?php echo base_url('customer/edit_customer/'.$customer->id) ?>"><span class="mif mif-pencil"></span> Edit</a> - <a href="#" onclick="delete_customer('<?php echo $customer->id ?>','<?php echo $customer->name ?>')"><span class="mif mif-bin"></span> Hapus</a></td>
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
    $(document).ready(function(){
        <?php if($this->session->flashdata('customer')): ?>
            <?php echo $this->session->flashdata('customer') ?>
        <?php endif; ?>
    });

    
	function delete_customer(id,name){
		alertify.confirm("Apakah anda yakin ingin menghapus Customer "+name,
		  function(){
		    window.location.assign("<?php echo base_url() ?>customer/delete_customer/"+id);
		  },
		  function(){
		    $.Notify({caption: 'Gagal !', content: 'Customer gagal dihapus', type: 'alert'});
		  });
	}
</script>