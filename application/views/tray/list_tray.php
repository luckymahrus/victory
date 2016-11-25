<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	          <!--   <h3 style="display:inline-block;float:right;"><small><a href="<?php echo base_url('tray/add_tray') ?>">Tambah tray baru <span class="fa fa-arrow-circle-o-right"></span></a></small></h3> -->
	        </div>
	    </div>
	</div>
	<div class="grid condensed">
		<div class="row form-title">	 
            <div class="cell">
            	<h3 style="margin-bottom: 20px;">Tambah Baki Baru</h3>
                <hr class="bg-primary">	
            </div>
        </div>
		<div class="row cells2">
    		<div class="cell">
    			<label>Kode Tray</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan kode untuk baki baru" name="new_tray" data-validate-func="required" data-validate-hint="Kode tray harus diisi">
                </div>
    		</div>
            <div class="cell" style="padding-top: 19px;padding-left: 10px;">
               <input type="Submit" name="submit" class="button bg-primary btn-teal" value="Submit"> 
            </div>
    	</div>
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
							<th data-type="numeric">Kode Tray</th>
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
									<?php $outlet = $this->crud_model->get_by_condition('outlets', array('id'=>$customer->outlet_id))->row('name');
										echo $outlet;
									?>
								</td> -->
								<td><a href="<?php echo base_url('tray/edit_tray/'.$tray->id) ?>"><span class="mif mif-pencil"></span> Edit</a> - <a href="#" onclick="delete_tray('<?php echo $tray->id ?>','<?php echo $customer->name ?>')"><span class="mif mif-bin"></span> Hapus</a></td>
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
	$('#table_tray').footable();

    $(document).ready(function(){
        <?php if($this->session->flashdata('tray')): ?>
            <?php echo $this->session->flashdata('tray') ?>
        <?php endif; ?>
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