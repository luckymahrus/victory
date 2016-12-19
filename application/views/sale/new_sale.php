<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<?php echo form_open_multipart('sale/new_sale',array('id'=>'form_sale','data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url('product/sent_item') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Penjualan</h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    <div class="row cells5">
	    	<div class="cell colspan2">
	    		<div class="input-control text full-size">
                    <input type="text" name="sale_code" value="<?php echo $sale_code ?>" readonly="readonly">
                    <input type="hidden" name="hidden_code" value="<?php echo $hidden_code ?>">
                    <input type="hidden" name="hidden_count" value="<?php echo $hidden_count ?>">
                </div>
	    	</div>
	    	<div class="cell colspan2">
	    		<div class="input-control text full-size">
                    <input type="text" name="customer_code" placeholder="Scan atau masukkan kode pelanggan" id="customer_code" onblur="get_customer(this)">
                </div>
	    	</div>
	    	<div class="cell">
	    		<label class="input-control checkbox small-check">
				    <input type="checkbox" name="new_customer" onchange="data_new_customer(this)">
				    <span class="check"></span>
				    <span class="caption">Customer Baru</span>
				</label>
	    	</div>
	    </div>
		<div id="customer_area">
		    <div class="row cells2">
		    	<div class="cell">
	    			<div class="input-control text full-size" data-role="input">
	    			    <input type="text" placeholder="Nama Customer" id="customer_name" data-validate-func="required" data-validate-hint="Nama customer harus diisi" class="customer" name="customer_name" readonly="readonly">
	    			</div>
	    		</div>
	    		<div class="cell">
	    			<div class="input-control text full-size" data-role="input">
	    			    <input type="text" placeholder="No. Telp." id="customer_phone" data-validate-func="required" data-validate-hint="No. Telp. customer harus diisi" class="customer" name="customer_phone" readonly="readonly">
	    			</div>
	    		</div>
		    </div>
		    <div class="row cells2">
	            <div class="cell">
	                <div class="input-control text full-size">
	                    <input type="email" placeholder="E-mail Customer" id="customer_email" readonly="readonly" name="customer_email">
	                    
	                </div>
	            </div>
	            <div class="cell">
	                <div class="input-control select full-size">
	                    <select name="customer_type" data-validate-func="required" id="customer_type" data-validate-hint="Jenis customer harus diisi">
	                    	<option value="" selected="true">Jenis Customer</option>
	                        <option value="Regular" disabled="disabled">Customer Biasa</option>
	                        <option value="Member" disabled="disabled">Member</option>
	                    </select>
	                </div>         
	            </div>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true">
                    <textarea placeholder="Alamat Customer" readonly="readonly" id="customer_address" name="customer_address"></textarea>
                </div>
	    	</div>
	    </div>
	    <div class="row cells2">
	    	<div class="cell">
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Scan atau Ketik Kode Product" onblur="get_product(this)">
                </div>
	    	</div>
	    	<div class="cell">
	    		<div class="input-control select full-size">
					<select name="sales_id" id="sales" data-validate-func="required" data-validate-hint="Sales harus dipilih">
						<option value="">--Pilih Sales--</option>
						<?php foreach($sales as $row): ?>
							<option value="<?php echo $row->id ?>"><?php echo $row->name.'('.$row->code.')' ?></option>
						<?php endforeach; ?>
					</select>
				</div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell table-responsive toggle-circle-filled">
				<table class="table hovered border table-condensed" id="table_product" data-page-size="10">
					<thead>
						<tr>
							<th data-type="numeric">No.</th>
							<th data-hide="phone">Foto</th>
							<th data-hide="phone">Kode Barang</th>
							<th >Nama</th>
							<th data-hide="phone">Berat</th>
							<th data-hide="phone">Harga Jual</th>
							<th data-hide="phone">Discount</th>
							<th data-hide="phone">Subtotal</th>
						</tr>
					</thead>
					<tbody id="table_body">
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="row form-title">
	        <div class="cell">
	        	<input type="hidden" name="total_price" id="hidden_total">
	            <hr class="bg-primary">
				<p class="place-right"><strong>Total : </strong><span id="total_price">0</span></p>
	        </div>
	    </div>
		<div class="row">
			<div class="cell text-center">
        	   <input type="submit" name="submit" class="button bg-primary" id="submit_btn" disabled="disabled" value="Submit" >
            </div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<script src="<?php echo base_url() ?>js/alertify.min.js"></script>
<script src="<?php echo base_url() ?>js/footable.js"></script>
<script src="<?php echo base_url() ?>js/footable.filter.js"></script>
<script src="<?php echo base_url() ?>js/footable.paginate.js"></script>
<script src="<?php echo base_url() ?>js/footable.sort.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/fancybox/source/jquery.fancybox.js"></script>

<script>
	var no = 1;
	var product_code = [];
	var snd = new Audio('<?php echo base_url() ?>assets/barcode.wav');

	$(document).ready(function(){

	    $('#table_product').footable();
	    $('a.photobox').fancybox();
	    <?php if($this->session->flashdata('sale')): ?>

	       <?php echo $this->session->flashdata('sale') ?>

	    <?php endif; ?>

	});

	function data_new_customer(el){
		if($(el).is(":checked") ){
			$('#customer_code').attr('readonly','readonly');
			$('#customer_name').val('');
			$('#customer_phone').val('');
			$('#customer_email').val('');
			$('#customer_type').val('');
			$('#customer_address').val('');
			$('#customer_type option').removeAttr('disabled');
			$('#customer_name').removeAttr('readonly');
			$('#customer_phone').removeAttr('readonly');
			$('#customer_email').removeAttr('readonly');

			$.ajax({
              url: "<?php echo base_url('sale/get_new_customer_code/')?>" + $(el).val(),
              type: 'GET',
              cache : false,
              success: function(result){
              	
	          		var data = JSON.parse(result);
					
					
					$('#customer_code').val(data.customer_code);
					
					
          		}
            
            });

		}else{
			$('#customer_code').removeAttr('readonly');
			$('#customer_code').val('');
			$('#customer_name').val('');
			$('#customer_phone').val('');
			$('#customer_email').val('');
			$('#customer_type').val('');
			$('#customer_address').val('');
			$('#customer_type option').attr('disabled','disabled');
			$('#customer_name').attr('readonly','readonly');
			$('#customer_phone').attr('readonly','readonly');
			$('#customer_email').attr('readonly','readonly');
			$('#customer_address').attr('readonly','readonly');
		}

	}

	function get_customer(el){
		if($(el).val() != ''){
			snd.play();
			$.ajax({
              url: "<?php echo base_url('sale/get_customer/')?>" + $(el).val(),
              type: 'GET',
              cache : false,
              success: function(result){
              	if(result == 'not found'){
      		        $.Notify({
			            caption: 'Error',
			            content: 'Customer Tidak Ditemukan',
			            type: 'alert'
			        });
			        $('#customer_code').val('');
					$('#customer_name').val('');
					$('#customer_phone').val('');
					$('#customer_email').val('');
					$('#customer_type').val('');
					$('#customer_address').val('');
              	}else{
              		var data = JSON.parse(result);
					
					
					$('#customer_name').val(data.name);
					$('#customer_phone').val(data.phone);
					$('#customer_email').val(data.email);
					$('#customer_type').val(data.type);
					$('#customer_address').val(data.address);	
              	}	
               		
				
                
              }
            
            });
		}
	}

	function get_product(el){
		if($(el).val() != ''){
			snd.play();
			$.ajax({
              url: "<?php echo base_url('product/get_product_by_code/')?>" + $(el).val(),
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
              		$('#submit_btn').removeAttr('disabled');
              		var data = JSON.parse(result);
				
					if(product_code.indexOf(data.product_code) > -1){
						$.Notify({
				            caption: 'Error',
				            content: 'Barang Sudah Terdaftar',
				            type: 'alert'
				        });
					}else{
						$('#table_body').append("<tr><td>"+no+"</td><td><a class='photobox' href='<?php echo base_url() ?>"+data.photo+"'><img width='20' src='<?php echo base_url() ?>"+data.photo+"' alt=''/></a></td><td>"+data.product_code+"</td><td>"+data.name+"</td><td>"+data.rounded_weight+"</td><td id='price_"+data.id+"'>"+data.selling_price+"</td><td><input type='text' name='discount[]' value='0' id='discount_"+data.id+"' onblur='calc_price("+data.id+")'></td><td id='total_"+data.id+"'>"+data.selling_price+"</td><input type='hidden' name='product_code[]' value='"+data.product_code+"'><input type='hidden' name='product_price[]' value='"+data.selling_price+"'></tr>");

							var total = $('#total_price').html();
							total = +total + +data.selling_price;
							$('#total_price').empty();
							$('#total_price').html(total);
							$('#hidden_total').val(total);
							product_code.push(data.product_code);
							no++;
						
					}
						
              	}
              	$(el).val('');
				$(el).focus();	
               	
				
                
              }
            
            });
		}
	}
	
	function calc_price(id){
		var price = $('#price_'+id).html();
		price = +price - $('#discount_'+id).val();
		var subtotal = $('#total_'+id).html();
		var total = $('#total_price').html();
		total = +total - +subtotal;
		if(price >= 0){
			total = +total + +price;
			$('#total_'+id).empty();
			$('#total_'+id).html(price);
			$('#total_price').empty();
			$('#total_price').html(total);
			$('#hidden_total').val(total);
		}else{
			$('#discount_'+id).val('');
		}


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