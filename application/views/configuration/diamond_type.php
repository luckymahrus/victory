<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	            <h3 style="display:inline-block;float:right;"><small><a id="add_link" style="cursor: pointer;">Tambah tipe berlian <span id="plus" class="fa fa-plus-circle"></span></a></small></h3>
	        </div>
	    </div>
	</div>
	<div class="grid">
		<!--Form Add Tray-->
		<?php echo form_open('configuration/diamond_type',array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false'))?>
		<div class="row closed-add" id="append_tray" style="display: none">
			<h3 style="margin-bottom: 20px;">Tambah Tipe Baru</h3>
            <hr class="bg-primary">	
        	<div class="grid">
            	<div class="row cells2">
            		<div class="cell">
            			<label>Kode Berlian</label>
		                <div class="input-control text full-size" data-role="input">
		                    <input type="text" placeholder="Masukkan Kode Berlian (cth: Rd)" name="type" data-validate-func="required" data-validate-hint="Limit harus diisi">
		                </div>
            		</div>
            		<div class="cell">
            			<label>Nama Berlian</label>
		                <div class="input-control text full-size" data-role="input">
		                    <input type="text" placeholder="Masukkan Nama Berlian" name="name" data-validate-func="required" data-validate-hint="Limit harus diisi">
		                </div>
		                
            		</div>
            	</div>
            	
            	<div class="row">
            		<div class="cell text-center">
            			<input type="Submit" name="submit" id="submit" class="button bg-primary btn-teal" value="Submit" disabled="disabled"> 
            		</div>
            	</div>
        	</div>
    	
    	</div>
    	<?php echo form_close()?>
    	<!--End Form-->
	    <div class="row">
	    	<div class="cell">
	    		<h3 style="margin-bottom: 20px;">Tipe Berlian</h3>
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
							<th data-hide="phone">Kode</th>
							<th data-type="numeric">Nama Berlian</th>
							<th data-hide="phone">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($diamond_type!=NULL): ?>
							<?php $i=1; ?>
							<?php foreach($diamond_type as $row): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $row->code ?></td>
								<td><?php echo $row->name ?></td>
								<td><a href="<?php echo base_url('configuration/edit_diamond_type/'.$row->id) ?>"><span class="mif mif-pencil"></span> Edit</a> - <a href="#" onclick="delete_diamond_type('<?php echo $row->id ?>')"><span class="mif mif-bin"></span> Hapus</a></td>
							</tr>
							<?php $i++; ?>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="4" class="text-center"><h3>Table kosong</h3></td>
							</tr>
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
        <?php if($this->session->flashdata('gold')): ?>
            <?php echo $this->session->flashdata('gold') ?>
        <?php endif; ?>
        $('#table_tray').footable();
    });

    $('#add_link').click(function(){
    	if($('#append_tray').hasClass('closed-add')){
    		$('#append_tray').show();
    		$('#plus').removeClass('fa-plus-circle');
    		$('#plus').addClass('fa-minus-circle');	
			$('#append_tray').removeClass('closed-add');
			$('#submit').removeAttr('disabled');
    	}
    	else{
    		$('#append_tray').hide();	
			$('#append_tray').addClass('closed-add');
    		$('#plus').removeClass('fa-minus-circle');
    		$('#plus').addClass('fa-plus-circle');		
			$('#submit').attr('disabled','disabled');
    	}
    	
    });

    function delete_diamond_type(id,name){
		alertify.confirm("Apakah anda yakin ingin menghapus Tipe Berlian ?",
		  function(){
		    window.location.assign("<?php echo base_url() ?>configuration/delete_diamond_type/"+id);
		  },
		  function(){
		    $.Notify({caption: 'Gagal !', content: 'Kadar gagal dihapus', type: 'alert'});
		  });
	}

    function notifyOnErrorInput(input){
        var message = input.data('validateHint');
        $.Notify({
            caption: 'Error',
            content: message,
            type: 'alert'
        });
    }
</script>