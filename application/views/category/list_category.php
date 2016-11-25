<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	            <h3 style="display:inline-block;float:right;"><small><a id="add_link" style="cursor: pointer;">Tambah kategori baru <span class="fa fa-plus-circle"></span></a></small></h3>
	        </div>
	    </div>
	</div>
	<div class="grid condensed">
		<!--Form Add Tray-->
		<?php echo form_open('category/add_category')?>
		<div class="row" id="append_category" style="display: none" class="closed-add">
			<h3 style="margin-bottom: 20px;">Tambah Kategori Baru</h3>
            <hr class="bg-primary">	
    		<div class="cell">
    			<label>Nama Kategori</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan nama kategori" name="category_name" data-validate-func="required" data-validate-hint="Nama kategori harus diisi">
                </div>
                <label>Kode Kategori</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan kode untuk kategori (1 Huruf/Angka)" name="new_tray" data-validate-func="required,maxlength" data-validate-arg=",1" data-validate-hint="Kode kategori harus diisi max 1 karakter">
                </div>
    		</div>
            <div class="cell text-center">
               <input type="Submit" name="submit" class="button bg-primary btn-teal" value="Submit"> 
            </div>
    	</div>
    	<?php echo form_close()?>
    	<!--End Form-->
	    <div class="row">
	    	<div class="cell">
	    		<h3 style="margin-bottom: 20px;">Daftar Baki</h3>
				<hr class="bg-primary">	
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Cari..." id="filter" >
                </div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell">
				<div class="table-responsive toggle-circle-filled">
				<table class="table table-condensed" id="table_tray" data-page-size="10" data-filter="#filter">
					<thead>
						<tr>
							<th data-type="numeric">No</th>
							<th data-type="numeric">Kode Baki</th>
							<th data-hide="phone">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($trays): ?>
							<?php $i=1; ?>
							<?php foreach($trays as $tray): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $tray->code ?></td>
								<!-- <td>
									<?php #$outlet = $this->crud_model->get_by_condition('outlets', array('id'=>$customer->outlet_id))->row('name');
										#echo $outlet;
									?>
								</td> -->
								<td><a href="<?php echo base_url('tray/edit_tray/'.$tray->id) ?>"><span class="mif mif-pencil"></span> Edit</a> - <a href="#" onclick="delete_tray('<?php echo $tray->id ?>','<?php echo $tray->code ?>')"><span class="mif mif-bin"></span> Hapus</a></td>
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
</div>

<script src="<?php echo base_url() ?>js/alertify.min.js"></script>
<script src="<?php echo base_url() ?>js/footable.js"></script>
<script src="<?php echo base_url() ?>js/footable.filter.js"></script>
<script src="<?php echo base_url() ?>js/footable.paginate.js"></script>
<script src="<?php echo base_url() ?>js/footable.sort.js" type="text/javascript"></script>

<script>
	

    $(document).ready(function(){
        <?php if($this->session->flashdata('tray')): ?>
            <?php echo $this->session->flashdata('tray') ?>
        <?php endif; ?>
        $('#table_tray').footable();
    });

    $('#add_link').click(function(){
    	if($('#append_category').hasClass('closed-add')){
    		$('#append_category').show();	
			$('#append_category').removeClass('closed-add');
    	}
    	else{
    		$('#append_category').hide();	
			$('#append_category').addClass('closed-add');	
    	}
    	
    });
    
	function delete_tray(id,kode){
		alertify.confirm("Apakah anda yakin ingin menghapus Customer "+name,
		  function(){
		    window.location.assign("<?php echo base_url() ?>customer/delete_customer/"+id);
		  },
		  function(){
		    $.Notify({caption: 'Gagal !', content: 'Customer gagal dihapus', type: 'alert'});
		  });
	}
</script>