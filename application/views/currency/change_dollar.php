<div class="container">
    <?php echo form_open('currency/add_dollar', array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>
    <div class="grid">
        <div class="row">
            <div class="cell">
                <h3><small><a href="<?php echo base_url('outlets') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke riwayat nilai dollar</a></small></h3>
            </div>
        </div>

        <div class="row form-title">	 
            <div class="cell">
            	<h3 style="margin-bottom: 20px;">Nilai Dollar Baru</h3>
                <hr class="bg-primary">	
            </div>
        </div>
    	
    	<div class="row">
    		<div class="cell">
    			<label>Nilai Dollar Baru</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan Nilai Dollar Baru" name="new_dollar" data-validate-func="required" data-validate-hint="Nilai dollar harus diisi">
                </div>
    		</div>
    	</div>
        
    	<div class="row">
            <div class="cell text-center">
        	   <input type="Submit" name="submit" class="button bg-primary btn-teal" value="Submit">
            </div>
        </div>
        <div class="row form-title">     
            <div class="cell">
                <h3 style="margin-bottom: 20px;">Riwayat Nilai Dollar</h3>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>

<script>
    <?php if($this->session->flashdata('outlet')): ?>

       <?php echo $this->session->flashdata('outlet') ?>

    <?php endif; ?>
</script>
<script>

function check_username(el){
        if($(el).val() != ''){
            $.ajax({
              url: "<?php echo base_url('accounts/check_username/')?>" + $(el).val(),
              type: 'GET',
              cache : false,
              success: function(result){
                if(result == 'taken'){
                    $.Notify({
                        caption: 'Error !',
                        content: 'Username sudah terpakai',
                        type: 'alert'
                    });
                    $(el).val('');
                    $(el).parent().addClass('error');
                    setTimeout(function(){$(el).parent().removeClass('error')},3000);
                }else{
                    $(el).parent().addClass('success');
                }
               
                
              }
            
            });    
        }
        
    }

    function tk(el){
        alert($(el).val());
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