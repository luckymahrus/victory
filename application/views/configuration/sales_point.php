<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	            <h3 style="display:inline-block;float:right;"><small><a id="add_link" style="cursor: pointer;">Tambah target baru <span class="fa fa-plus-circle"></span></a></small></h3>
	        </div>
	    </div>
	</div>
	<div class="grid condensed">
		<!--Form Add Tray-->
		<?php echo form_open('configuration/sales_point')?>
		<div class="row closed-add" id="append_tray" style="display: none">
			<h3 style="margin-bottom: 20px;">Tambah target Baru</h3>
            <hr class="bg-primary">	
    		<div class="cell">
                <label>Nama Target</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan nama untuk target baru" name="name" data-validate-func="required" data-validate-hint="Kode tray harus diisi">
                </div>
                <label>Nilai Target</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Target" name="target" >
                </div>
                <label>Poin</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Point yang didapat" name="point" >
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
	    		<h3 style="margin-bottom: 20px;">Poin</h3>
				<hr class="bg-primary">	
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Cari..." id="filter" >
                </div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell">
				<div class="table-responsive toggle-circle-filled">
				<table class="table hovered border bordered table-condensed" id="table_point" data-page-size="10" data-filter="#filter">
					<thead>
						<tr>
							<th data-type="numeric">No</th>
							<th data-type="numeric">Nama Target</th>
							<th>Nilai Target</th>
							<th>Poin</th>
							<th data-hide="phone">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($sales_point!=NULL): ?>
							<?php $i=1; ?>
							<?php foreach($sales_point as $row): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $row->name ?></td>
								<td><?php echo $row->target ?></td>
								<td><?php echo $row->point ?></td>
								<td><a href="<?php echo base_url('configuration/edit_sales_point/'.$row->id) ?>"><span class="mif mif-pencil"></span> Edit</a> - <a href="#" onclick="delete_row('<?php echo $row->id ?>')"><span class="mif mif-bin"></span> Hapus</a></td>
							</tr>
							<?php $i++; ?>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="6" class="text-center"><h3>Tidak ada Data</h3></td>
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
        <?php if($this->session->flashdata('point')): ?>
            <?php echo $this->session->flashdata('point') ?>
        <?php endif; ?>
        $('#table_point').footable();
    });

    $('#add_link').click(function(){
    	if($('#append_tray').hasClass('closed-add')){
    		$('#append_tray').show();	
			$('#append_tray').removeClass('closed-add');
    	}
    	else{
    		$('#append_tray').hide();	
			$('#append_tray').addClass('closed-add');	
    	}
    	
    });
    
	function delete_tray(id,code){
		alertify.confirm("Apakah anda yakin ingin menghapus Baki "+code+"?",
		  function(){
		    window.location.assign("<?php echo base_url() ?>Tray/delete_tray/"+id);
		  },
		  function(){
		    $.Notify({caption: 'Gagal !', content: 'Customer gagal dihapus', type: 'alert'});
		  });
	}
</script>