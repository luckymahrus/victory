<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url('configuration/diamond_type/') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Tipe Berlian</a></small></h3>
	        </div>
	    </div>
	</div>
	<div class="grid">
		<!--Form Add Tray-->
		<?php echo form_open('configuration/edit_gold_amount/'.$gold_amount->id,array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false'))?>
		<div class="row">
			<h3 style="margin-bottom: 20px;">Tambah Kadar Baru</h3>
            <hr class="bg-primary">	
        	<div class="grid">
            	<div class="row cells2">
            		<div class="cell">
            			<label for="">Tipe</label>
		            	<div class="input-control select full-size" data-role="input">
							<select name="type" id="type" onchange="get_data_new_product()" data-validate-func="required" data-validate-hint="Baki harus dipilih">
								<option value="">--Pilih Tipe--</option>
								<option value="K" <?php echo ($gold_amount->type == 'K')? 'selected' : '' ?>>Emas Kuning</option>
								<option value="P" <?php echo ($gold_amount->type == 'P')? 'selected' : '' ?>>Emas Putih</option>
							</select>
						</div>
            		</div>
            		<div class="cell">
            			<label>Limit Jual</label>
		                <div class="input-control text full-size" data-role="input">
		                    <input type="text" placeholder="Masukkan Limit Jual" name="limit" value="<?php echo $gold_amount->amount_limit ?>" data-validate-func="required" data-validate-hint="Limit harus diisi">
		                    <span class="button">%</span>
		                </div>
		                
            		</div>
            	</div>
            	<div class="row cells2">
            		<div class="cell">
            			<label>Kadar Emas</label>
		                <div class="input-control text full-size" data-role="input">
		                    <input type="text" placeholder="Masukkan kadar emas" name="original" value="<?php echo $gold_amount->original ?>" data-validate-func="required" data-validate-hint="Kadar emas harus diisi">
		                    <span class="button">%</span>
		                </div>
            		</div>
            		<div class="cell">
            			<label>Kadar Emas (Markup)</label>
		                <div class="input-control text full-size" data-role="input">
		                    <input type="text" placeholder="Masukkan markup kadar emas" name="marked_up" value="<?php echo $gold_amount->marked_up ?>" data-validate-func="required" data-validate-hint="Markup harus diisi">
		                    <span class="button">%</span>
		                </div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="cell text-center">
            			<input type="Submit" name="submit" id="submit" class="button bg-primary btn-teal" value="Submit"> 
            		</div>
            	</div>
        	</div>
    	
    	</div>
    	<?php echo form_close()?>
    	<!--End Form-->
	    
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

    
    function notifyOnErrorInput(input){
        var message = input.data('validateHint');
        $.Notify({
            caption: 'Error',
            content: message,
            type: 'alert'
        });
    }
</script>