<div class="container">
    <div class="grid">
        <div class="row">
            <div class="cell">
                <h3 style="display:inline-block"><small><a href="<?php echo base_url('configuration/sales_point') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke daftar poin</a></small></h3>
            </div>
        </div>

        <div class="row form-title" style="margin-bottom: 0">     
            <div class="cell">
                <h1 style="margin-bottom: 20px;">Edit Poin <?php echo ucfirst($sales_point->name) ?></h1>
                <hr class="bg-primary"> 
            </div>
        </div>

        <?php echo form_open('configuration/edit_sales_point/'.$sales_point->id,array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>

        <div class="row">
            <div class="cell">
            	<label>Nama Target</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan nama untuk target baru" name="name" data-validate-func="required" data-validate-hint="Kode tray harus diisi">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
            </div>
        </div>
        <div class="row"></div>
            <div class="cell">
                <label>Nilai Target</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Target" name="target" >
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>      
            </div>
        </div>

        <div class="row">
            <div class="cell">
                <label>Poin</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Point yang didapat" name="point" >
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="cell text-center">
                <input type="submit" class="button bg-primary" name="submit" value="Submit">
            </div>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>

<script>
    function notifyOnErrorInput(input){
        var message = input.data('validateHint');
        $.Notify({
            caption: 'Error',
            content: message,
            type: 'alert'
        });
    }

    <?php if($this->session->flashdata('point')): ?>

       <?php echo $this->session->flashdata('point') ?>

    <?php endif; ?>
</script>