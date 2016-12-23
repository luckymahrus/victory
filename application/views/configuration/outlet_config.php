<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Limit Kadar Emas Toko</h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	   				<?php foreach($outlets as $outlet): ?>
                    	<label class="input-control radio small-check">
						    <input type="radio" value="<?php echo $outlet->id ?>" name="radio_outlet" <?php echo ($outlet->id == 1)? 'checked':'' ?> onclick="get_limit_from_outlet(this)">
						    <span class="check"></span>
						    <span class="caption"><?php echo $outlet->name ?></span>
						</label>
                	<?php endforeach; ?>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Cari barang" id="filter" >
                </div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell table-responsive toggle-circle-filled">
				<table class="table hovered bordered table-condensed" id="table_limit" data-filter="#filter" data-page-size="10">
					<thead>
						<tr>
							<th data-type="numeric">No</th>
							<th>Tipe Emas</th>
							<th data-type="numeric">Kadar Emas</th>
							<th data-type="numeric">Markup Kadar Emas</th>
							<th data-hide="phone">Limit</th>
							<th data-hide="phone">Toko</th>
						</tr>
					</thead>
					<tbody id="table_body">
						<?php if($amount_limit!=NULL): ?>
							<?php $i=1; ?>
							<?php foreach($amount_limit as $row): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo ($row->type == 'K')? 'Kuning' : 'Putih' ?></td>
								<td><?php echo $row->original ?>%</td>
								<td><?php echo $row->marked_up ?>%</td>
								<td><div class="input-control text full-size" data-role="input">
    			   						<input type="text" placeholder="Limit" onblur="change_limit(this,'<?php echo $row->limit_id ?>')" value="<?php echo $row->limit ?>">
    			   						<span class="button">%</span>
    								</div>
    							</td>
								<td><?php echo $row->outlet ?></td>
							</tr>
							<?php $i++; ?>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="3" class="text-center"><h3>Table kosong</h3></td>
							</tr>
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
<script src="<?php echo base_url() ?>js/footable.js"></script>
<script src="<?php echo base_url() ?>js/footable.filter.js"></script>
<script src="<?php echo base_url() ?>js/footable.paginate.js"></script>
<script src="<?php echo base_url() ?>js/footable.sort.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/fancybox/source/jquery.fancybox.js"></script>

<script>
	

	$(document).ready(function(){
		<?php if($this->session->flashdata('outlet')): ?>

	       <?php echo $this->session->flashdata('outlet') ?>

	    <?php endif; ?>

	    $('#table_limit').footable();
	    $('a.photobox').fancybox();

	});

	function change_limit(el,id){
		$.ajax({
              url: "<?php echo base_url('configuration/change_limit/')?>" + $(el).val() + "/" + id,
              type: 'GET',
              cache : false,
              success: function(result){
               	if(result == 'failed'){
      		        $.Notify({
			            caption: 'Error',
			            content: 'Limit Gagal Diubah',
			            type: 'alert'
			        });
              	}else{
              		$.Notify({
			            caption: 'Berhasil',
			            content: 'Limit Berhasil Diubah',
			            type: 'success'
			        });
              	}

              }
            });
	}

	function get_limit_from_outlet(el){
		var no=1;
		$.ajax({
              url: "<?php echo base_url('configuration/get_limit_by_outlet/')?>" + $(el).val(),
              type: 'GET',
              cache : false,
              success: function(result){
               	if(result == 'not found'){
      		        $.Notify({
			            caption: 'Error',
			            content: 'Limit Tidak Ditemukan',
			            type: 'alert'
			        });
              	}else{
              		var data = JSON.parse(result);
              		$('#table_body').empty();
              		$.each(data, function( index, value ) {
              		  if(value.type == 'K'){
              		  	var type = 'Kuning';
              		  }else{
              		  	var type = 'Putih';
              		  }
					  $('#table_body').append("<tr><td>"+no+"</td><td>"+type+"</td><td>"+value.original+"%</td><td>"+value.marked_up+"%</td><td><div class='input-control text full-size' data-role='input'><input type='text' placeholder='Limit' onblur='change_limit(this,"+value.limit_id+")' value='"+value.limit+"'><span class='button'>%</span></div><td>"+value.outlet+"</td></tr>");	
					  no++;
					});
					$('#table_limit').trigger('footable_initialize');
              	}

              }
            });
	}
</script>