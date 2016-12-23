<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<?php echo form_open_multipart('product/received',array('id'=>'form_mutation','data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>

<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Barang dari Pengiriman <?php echo $receives[0]->mutation_code ?></h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<div class="input-control text full-size">
                    <input type="text" onblur="get_product(this)" placeholder="Scan barcode atau masukkan kode barang untuk terima barang" >
                </div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell table-responsive toggle-circle-filled">
				<table class="table hovered border bordered table-condensed" id="incoming" data-page-size="10">
					<thead>
						<tr>
							<th data-type="numeric">No.</th>
							<th >Kode Barang</th>
							<th data-hide="phone">Foto</th>
							<th data-hide="phone">Nama Barang</th>
							<th data-hide="phone">Berat Real</th>
							<th data-hide="phone">Penyesuaian</th>
							<th data-hide="phone">Status</th>
							<th>Baki</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php if($receives !=NULL): ?>
							<?php $i = 1; ?>
							<?php foreach($receives as $row): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row->product_code ?>
										<input type="hidden" value="<?php echo $row->product_code ?>" name="missing_code[]" id="code_<?php echo $row->product_code ?>">
									</td>
									<td><a class="photobox" href="<?php echo base_url().$row->photo ?>"><img width="20" src="<?php echo base_url().$row->photo ?>" alt=""/></a></td>
									<td><?php echo $row->name ?></td>
									<td><?php echo $row->real_weight ?></td>
									<td><?php echo $row->rounded_weight ?></td>
									<td><?php echo $row->status ?></td>
									<td id="tray_<?php echo $row->product_code ?>"></td>
									<td id="<?php echo $row->product_code ?>"></td>
								</tr>		
								<?php $i++; ?>
							<?php endforeach; ?>
						<?php else:?>
							<tr>
								<td colspan="7" class="text-center"><h3>Table kosong</h3></td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="cell text-center">
				<input type="hidden" name="mutation_code" value="<?php echo $receives[0]->mutation_code ?>">
        	   <input type="submit" name="submit" class="button bg-primary" value="Submit" >
            </div>
		</div>
	</div>
</div>
<?php echo form_close() ?>
<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<script src="<?php echo base_url() ?>js/alertify.min.js"></script>
<script src="<?php echo base_url() ?>js/footable.js"></script>
<script src="<?php echo base_url() ?>js/footable.filter.js"></script>
<script src="<?php echo base_url() ?>js/footable.paginate.js"></script>
<script src="<?php echo base_url() ?>js/footable.sort.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/fancybox/source/jquery.fancybox.js"></script>

<script>
	var product_code = [];
	var snd = new Audio('<?php echo base_url() ?>assets/barcode.wav');

	$(document).ready(function(){
		<?php if($this->session->flashdata('sent')): ?>

	       <?php echo $this->session->flashdata('sent') ?>

	    <?php endif; ?>

	    $('#table_sent').footable();
	    $('a.photobox').fancybox();

	});

	function get_product(el){
		if($(el).val() != ''){
			snd.play();
			$.ajax({
              url: "<?php echo base_url('product/get_product_from_mutation/')?>" + $(el).val() + '/<?php echo $receives[0]->mutation_code ?>',
              type: 'GET',
              cache : false,
              success: function(result){
              	if(result == 'not found'){
      		        $.Notify({
			            caption: 'Error',
			            content: 'Barang Tidak Ditemukan',
			            type: 'alert'
			        });
              	}else{
              		var data = JSON.parse(result);
				
					if(product_code.indexOf(data.product_code) > -1){
						$.Notify({
				            caption: 'Error',
				            content: 'Barang Sudah Terdaftar',
				            type: 'alert'
				        });
					}else{
						$('#'+data.product_code).append("<span class='mif-checkmark'></span>");
						$('#code_'+data.product_code).removeAttr('name');
						$('#code_'+data.product_code).attr('name','checked_code[]');
						$('#tray_'+data.product_code).append("<select name='tray[]' id=''><option value=''>Pilih Baki</option><?php foreach($trays as $tray): ?><option value='<?php echo $tray->id ?>'><?php echo $tray->code ?> <?php echo $tray->name ?></option><?php endforeach; ?></select>");
						
						
					}
						
              	}
              	$(el).val('');
				$(el).focus();	
               	
				
                
              }
            
            });
		}
	}
	
</script>
