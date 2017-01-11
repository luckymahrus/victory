<div class="container">
    <div class="grid">

        <div class="row">
            <div class="cell">
                <h3 style="display:inline-block"><small><a href="<?php echo base_url('category') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke daftar kategori</a></small></h3>
            </div>
        </div>

        <div class="row form-title" style="margin-bottom: 0">     
            <div class="cell">
                <h1 style="margin-bottom: 20px;">Edit Kategori <?php echo ucfirst($category->name) ?></h1>
                <hr class="bg-primary"> 
            </div>
        </div>

        <?php echo form_open('category/edit_category/'.$category->id,array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>

        <div class="row cells2">
            <div class="cell">
                <label>Nama Kategori</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan nama kategori" name="category_name" value="<?php echo $category->name ?>" data-validate-func="required" data-validate-hint="Nama kategori harus diisi">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <label>Kode Kategori</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan kode untuk kategori (1 Huruf/Angka)" name="category_code" value="<?php echo $category->code ?>" data-validate-func="required,maxlength" data-validate-arg=",1" data-validate-hint="Kode kategori harus diisi max 1 karakter">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>       
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <label for="">Tipe</label>
                <div class="input-control select full-size">
                    <select name="category_type" id="" data-validate-func="required" data-validate-hint="Jenis barang harus diisi">
                        <option value="">--Pilih Tipe--</option>
                        <option value="1" <?php echo ($category->type_id == 1) ? 'selected' : '' ?>>Emas</option>
                        <option value="2" <?php echo ($category->type_id == 2) ? 'selected' : '' ?>>Berlian</option>
                    </select>
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

    <?php if($this->session->flashdata('category')): ?>

       <?php echo $this->session->flashdata('category') ?>

    <?php endif; ?>
</script>