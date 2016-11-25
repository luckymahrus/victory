<div class="container">
	<div class="grid">
		<div class="row">
			<div class="cell">
				<h3><small><a href=""><span class="fa fa-arrow-circle-o-left"></span>Kembali ke daftar barang</a></small></h3>
			</div>
		</div>

		<div class="row form-title">
			<div class="cell">
				<h1 style="margin-bottom: 20px">Tambah barang baru</h1>
				<hr class="bg-primary">
			</div>
		</div>

		<div class="row">
			<div class="cell">
				<label for="">Nama Barang</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Nama Barang" name="product_name" data-validate-func="required" data-validate-hint="Nama barang harus diisi">
				</div>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label for="">Kode Produk</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Kode Produk" name="product_code" value="<?php echo $code ?>" readonly="readonly">
				</div>
			</div>
			<div class="cell">
				<label for="">Kode Model</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Kode Model" name="product_model_code">
				</div>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label for="">Baki</label>
				<div class="input-control select full-size">
					<select name="product_tray" id="" data-validate-func="required" data-validate-hint="Baki harus dipilih">
						<option value="">--Pilih Tipe--</option>
					</select>
				</div>
			</div>
			<div class="cell">
				<label for="">Tipe</label>
				<div class="input-control select full-size">
					<select name="product_type" id="" data-validate-func="required" data-validate-hint="Jenis barang harus diisi">
						<option value="">--Pilih Tipe--</option>
						<option value="1">Emas</option>
						<option value="2">Berlian</option>
					</select>
				</div>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<!-- Category -->
				<label for="">Kategori</label>
				<div class="input-control select full-size">
					<select name="product_category" id="" data-validate-func="required" data-validate-hint="Kategori harus diisi">
						<option value="">--Pilih Kategori--</option>
					</select>
				</div>				
			</div>
			<div class="cell">
				<!-- Model -->
				<label for="">Model</label>
				<div class="input-control select full-size">
					<select name="product_model" id="" data-validate-func="required" data-validate-hint="Model harus diisi">
						<option value="">--Pilih Model--</option>
					</select>
				</div>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label for="">Harga Beli</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Harga Beli" name="product_purchase_price">
				</div>
			</div>
			<div class="cell">
				<label for="">Harga Jual</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Harga Jual" name="product_selling_price">
				</div>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label for="">Kadar</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Kadar" name="product_amount">
				</div>
			</div>
			<div class="cell">
				<br>
				<br>
				<label class="switch">
				    <input type="checkbox">
				    <span class="check"></span>
				    <span class="caption">Buyback</span>
				</label> 
			</div>
		</div>

		<div class="row">
            <div class="cell text-center">
        	   <input type="submit" name="submit" class="button bg-primary" value="Submit">
            </div>
        </div>

	</div>
</div>