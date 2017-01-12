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
		<?php echo form_open('configuration/edit_diamond_type/'.$diamond_type->id,array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false'))?>
		<div class="row">
			<h3 style="margin-bottom: 20px;"><?php echo $title?></h3>
            <hr class="bg-primary">	
        	<div class="grid">
            	<div class="row cells2">
                    <div class="cell">
                        <label>Kode Berlian</label>
                        <div class="input-control text full-size" data-role="input">
                            <input type="text" placeholder="Masukkan Kode Berlian (cth: Rd)" value="<?php echo $diamond_type->code ?>" name="type" data-validate-func="required" data-validate-hint="Limit harus diisi">
                        </div>
                    </div>
                    <div class="cell">
                        <label>Nama Berlian</label>
                        <div class="input-control text full-size" data-role="input">
                            <input type="text" placeholder="Masukkan Nama Berlian" name="name" value="<?php echo $diamond_type->name ?>" data-validate-func="required" data-validate-hint="Limit harus diisi">
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
        <?php if($this->session->flashdata('diamond')): ?>
            <?php echo $this->session->flashdata('diamond') ?>
        <?php endif; ?>
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