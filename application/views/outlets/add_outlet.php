<div class="container">
    <?php echo form_open('outlets/add_outlet', array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>
    <div class="grid">
        <div class="row">
            <div class="cell">
                <h3><small><a href=""><span class="fa fa-arrow-circle-o-left"></span> Kembali ke daftar outlet</a></small></h3>
            </div>
        </div>

        <div class="row form-title">	 
            <div class="cell">
            	<h1 style="margin-bottom: 20px;">Tambah Outlet Baru</h1>
                <hr class="bg-teal">	
            </div>
        </div>
    	
    	<div class="row cells2">
    		<div class="cell">
    			<label>Nama Toko</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Nama Toko" name="outlet_name">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
    		</div>
    		<div class="cell">
    			<label>Kode Toko</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan Kode Toko (2 Karakter)" title="Contoh : KM" pattern="[a-zA-Z0-9]{2}" required="1" name="outlet_code">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
    		</div>
    	</div>

    	<div class="row">
        	<div class="cell">
        		<label>Nama Store Manager</label>
        		<div class="input-control text full-size" data-role="input">
    			    <input type="text" placeholder="Nama Lengkap Store Manager" name="outlet_manager">
    			    <button class="button helper-button clear"><span class="mif-cross"></span></button>
    			</div>
        	</div>
        </div>

    	<div class="row">
        	<div class="cell">
        		<label>No. Telp</label>
        		<div class="input-control text full-size" data-role="input">
    			    <input type="text" placeholder="Nomor Telephone Outlet" name="outlet_phone">
    			    <button class="button helper-button clear"><span class="mif-cross"></span></button>
    			</div>
        	</div>
        </div>

        <div class="row">
        	<div class="cell">
        		<label>Alamat</label>
        		<div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true">
    			    <textarea name="outlet_address" placeholder="Alamat Toko"></textarea>
    			</div>
        	</div>
        </div>

        <div class="row cells2">
            <div class="cell">
                <label>Username</label>
    			<div class="input-control text full-size" data-role="input">
    			    <input type="text" placeholder="Username Outlet" name="outlet_username">
    			    <button class="button helper-button clear"><span class="mif-cross"></span></button>
    			</div>
            </div>
            <div class="cell">
                <label>Password</label>
    			<div class="input-control password full-size" data-role="input">
    			    <input type="password" placeholder="Password" name="outlet_password">
    			    <button class="button helper-button reveal"><span class="mif-looks"></span></button>
    			</div>
        	</div>
        </div>

        <div class="row cells2">
        	<div class="cell">
        		<label>Margin Toko</label>
    			<div class="input-control text full-size" data-role="input">
    			    <input type="number" placeholder="Perbedaan Dasar Harga dengan Toko Utama" min="0" max="100" required="1" name="outlet_margin">
    			    <button class="button" style="border-color: rgba(127, 140, 141,1.0); cursor: default;"><span class="fa fa-percent" aria-hidden="true"></span></button>  
    			</div>
        	</div>
        </div>

    	<div class="row">
            <div class="cell text-center">
        	   <input type="Submit" name="submit" class="button info bg-teal btn-teal" value="Submit">
            </div>
        </div>    
    </div>
    <?php echo form_close() ?>
</div>

<script>
    <?php if($this->session->userdata('outlet')): ?>

       <?php echo $this->session->userdata('outlet') ?>

    <?php endif; ?>
</script>