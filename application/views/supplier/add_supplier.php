<div class="container">
    <div class="grid">

        <div class="row">
            <div class="cell">
                <h3><small><a href=""><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Daftar Supplier</a></small></h3>
            </div>
        </div>
        <div class="row form-title">
            <div class="cell">
                <h1 style="margin-bottom: 20px;">Tambah Supplier Baru</h1>
                <hr class="bg-teal">    
            </div>
        </div>
        <?php echo form_open('supplier/add_supplier',array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false'));?>
        <div class="row">
            <div class="cell">
                <label>Nama Supplier</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Nama Supplier" data-validate-func="required" data-validate-hint="Nama supplier harus diisi" name="supplier_name">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
            </div>
        </div>

        <div class="row cells2">
            <div class="cell">
                <label>No. Telp</label>
                <div class="input-control text full-size" data-role="input">
                    <input type="text" placeholder="Nomor Telephone Supplier" name="supplier_phone">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
            </div>
            <div class="cell">
                <label>E-mail</label>
                <div class="input-control text full-size" data-role="input">
                    <input type="email" placeholder="Email Supplier" name="supplier_email">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="cell">
                <label>Alamat</label>
                <div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true">
                    <textarea name="supplier_address"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="cell">
                <label>Keterangan</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Keterangan Supplier" name="supplier_desc">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="cell text-center">
                <input type="Submit" class="button info bg-teal btn-teal" value="Submit" name="submit">
            </div>
        </div>

        <?php echo form_close()?>
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
</script>