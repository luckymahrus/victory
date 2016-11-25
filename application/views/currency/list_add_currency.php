<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<div class="container">
    <div class="grid">
        <div class="row">
            <div class="cell">
                <h3><small><a href="<?php echo base_url('outlets') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
            </div>
        </div>
        <div class="row form-title">	 
            <div class="cell">
            	<h3 style="margin-bottom: 20px;">Tambah Kurs Baru</h3>
                <hr class="bg-primary">	
            </div>
        </div>

    	<!--Field dollar insertion-->
        <?php echo form_open('currency/add_dollar', array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>
    	<div class="row cells2">
    		<div class="cell">
    			<label>Nama Kurs Baru</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan Nama Kurs Baru" name="currency_name" data-validate-func="required" data-validate-hint="Nilai dollar harus diisi">
                </div>
    		</div>
            <div class="cell">
               <label>Nilai Kurs (dalam Rupiah)</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Nilai dari kurs baru dalam rupiah" name="currency_name" data-validate-func="required" data-validate-hint="Nilai dollar harus diisi">
                </div>
            </div>
    	</div>
        <div class="row text-center">
            <input type="Submit" name="submit" class="button bg-primary btn-teal" value="Submit"> 
        </div>
        <?php echo form_close() ?>    
        <!--Form End-->

        <div class="row form-title">     
            <div class="cell">
                <h3 style="margin-bottom: 20px;">Daftar Nilai Kurs</h3>
                <div class="table-responsive toggle-circle-filled">
                    <table class="table table-condensed" data-page-size="10" id="table_dollar">
                        <thead>
                            <tr>
                                <th>Nama Kurs</th>
                                <th>Nilai</th>
                                <th>Update Terakhir</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">

<script src="<?php echo base_url() ?>js/footable.js"></script>
<script src="<?php echo base_url() ?>js/footable.filter.js"></script>
<script src="<?php echo base_url() ?>js/footable.paginate.js"></script>
<script src="<?php echo base_url() ?>js/footable.sort.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/alertify.min.js"></script>

<script>
    <?php if($this->session->flashdata('outlet')): ?>

       <?php echo $this->session->flashdata('outlet') ?>

    <?php endif; ?>
</script>
<script>
$('#table_dollar').footable();



function notifyOnErrorInput(input){
    var message = input.data('validateHint');
    $.Notify({
        caption: 'Error',
        content: message,
        type: 'alert'
    });
}

</script>