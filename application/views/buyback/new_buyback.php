<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<?php echo form_open_multipart('buyback/new_buyback',array('id'=>'form_buyback','data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Buyback</h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	   
		
	    
	    <div class="row">
	    	<div class="cell">
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Scan atau Ketik Kode Invoice" onblur="get_product(this)">
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
						</tr>
					</thead>
					<tbody id="table_body" style="font-size:12px">
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="row form-title">
	        <div class="cell">
	        	<input type="hidden" name="total_price" id="hidden_total">
	        	<input type="hidden" name="type" id="type">
	            <hr class="bg-primary">
				<p class="place-right"><strong>Total Berat : </strong><span id="total_weight">0</span> g</p>
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
	var type = '';
	var snd = new Audio('<?php echo base_url() ?>assets/barcode.wav');

	$(document).ready(function(){

	    $('#table_product').footable();
	    $('a.photobox').fancybox();
	    <?php if($this->session->flashdata('buyback')): ?>

	       <?php echo $this->session->flashdata('buyback') ?>

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
					$('#hidden_customer_code').val(data.hidden_customer_code);
					$('#hidden_customer_count').val(data.hidden_customer_count);
					
          		}
            
            });

		}else{
			$('#customer_code').removeAttr('readonly');
			$('#customer_code').val('');
			$('#customer_name').val('');
			$('#customer_phone').val('');
			$('#customer_email').val('');
			$('#customer_type').val('');
			$('#customer_type_hidden').val('');
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
					$('#customer_type_hidden').val('');
					$('#customer_address').val('');
              	}else{
              		var data = JSON.parse(result);
					
					
					$('#customer_name').val(data.name);
					$('#customer_phone').val(data.phone);
					$('#customer_email').val(data.email);
					$('#customer_type').val(data.type);
					$('#customer_type_hidden').val(data.type);
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
				
					if(product_code.indexOf(data.id) > -1){
						$.Notify({
				            caption: 'Error',
				            content: 'Barang Sudah Terdaftar',
				            type: 'alert'
				        });
					}else{
						if(type == ''){
							type = data.type;
							$('#type').val(data.type);
						}

						if(type != data.type){
							$.Notify({
					            caption: 'Error',
					            content: 'Barang tidak dapat didaftarkan',
					            type: 'alert'
					        });
						}else{
							$('#table_body').append("<tr id='row_"+data.id+"'><td><a onclick='remove_row("+data.id+")' style='cursor:pointer'>&times;</a>"+no+"</td><td><a class='photobox' href='<?php echo base_url() ?>"+data.photo+"'><img width='20' src='<?php echo base_url() ?>"+data.photo+"' alt=''/></a></td><td>"+data.product_code+"</td><td>"+data.name+"</td><td>"+data.rounded_weight+"</td><td>Rp. <span id='price_"+data.id+"'>"+data.selling_price+"</span></td><td>Rp. <span id='limit_"+data.id+"'>"+data.limit+"</span></td><td><input type='text' name='discount[]' value='' id='discount_"+data.id+"' onblur='calc_price("+data.id+")'></td><td>Rp. <span id='total_"+data.id+"'>"+data.selling_price+"</span></td><input type='hidden' name='product_code[]' value='"+data.product_code+"'><input type='hidden' name='product_price[]' value='"+data.selling_price+"'></tr>");

							

							var total = $('#total_price').html();
							var price = data.selling_price;
							price = price.replace(/\./g,'');
							total = total.replace('.','');
							total = +total + +price;
							$('#total_price').empty();
							$('#total_price').html(total);
							$('#hidden_total').val(total);
							product_code.push(data.id);
							no++;
						}

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
		var subtotal = $('#total_'+id).html();
		var total = $('#total_price').html();
		var limit = $('#limit_'+id).html();
		var discount = $('#discount_'+id).val();
		limit = limit.replace(/\./g, '');
		total = total.replace(/\./g, '');
		subtotal = subtotal.replace(/\./g, '');

		price = +price - +discount;
		total = +total - +subtotal;
		if(discount >= Number(limit)){
			if(discount >= 0){
				total = +total + +discount;
				$('#total_'+id).empty();
				$('#total_'+id).html(discount);
				$('#total_price').empty();
				$('#total_price').html(total);
				$('#hidden_total').val(total);
			}else{
				$('#discount_'+id).val('');
			}
		}else{
			$('#discount_'+id).val('');
		}


	}

	function remove_row(id){
		alertify.confirm("Apakah anda yakin ingin menghapus barang ini ? ",
			  function(){
			    var index = product_code.indexOf(id.toString());
				if(index > -1){
					product_code.splice(index,1);
				}
				var subtotal = $('#total_'+id).html();
				var total = $('#total_price').html();
				total = total.replace(/\./g, '');
				subtotal = subtotal.replace(/\./g, '');
				total = +total - +subtotal;
				$('#total_price').html(total);
				$('#hidden_total').val(total);
				$('#row_'+id).remove();
			  },
			  function(){
			    $.Notify({caption: 'Gagal !', content: 'Sales gagal dihapus', type: 'alert'});
			  });		
		
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