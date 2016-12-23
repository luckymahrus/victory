<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<?php echo form_open_multipart('product/send_item',array('id'=>'form_mutation','data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url('product/sent_item') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Kirim Barang</h1>
	            <hr class="bg-primary">    
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
					<select name="to_outlet" id="outlet" data-validate-func="required" data-validate-hint="Nama toko harus diisi">
						<option value="">--Pilih Toko--</option>
						<?php foreach($outlets as $outlet): ?>
							<option value="<?php echo $outlet->id ?>"><?php echo $outlet->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<div id="wait">Please Wait</div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell table-responsive toggle-circle-filled">
				<table class="table hovered border bordered table-condensed" id="table_product" data-page-size="10">
					<thead>
						<tr>
							<th data-type="numeric">No.</th>
							<th data-hide="phone">Foto</th>
							<th data-hide="phone">Kode Barang</th>
							<th >Nama</th>
							<th data-hide="phone">Baki</th>
							<th data-hide="phone">Tipe</th>
							<th data-hide="phone">Kategori</th>
							<th data-hide="phone">Berat Real</th>
							<th data-hide="phone">Penyesuaian</th>
							<th data-hide="phone">Harga Jual</th>
							<th data-hide="phone">Kadar</th>
							<th data-hide="phone">Lokasi</th>
						</tr>
					</thead>
					<tbody id="table_body">
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="cell text-center">
        	   <input type="submit" name="submit" class="button bg-primary" value="Submit" >
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
	    $(document).ajaxStart(function(){
        	$("#wait").css("display", "block");
	    });
	    $(document).ajaxComplete(function(){
	        $("#wait").css("display", "none");
	    });
	});

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
              		var data = JSON.parse(result);
				
					if(product_code.indexOf(data.product_code) > -1){
						$.Notify({
				            caption: 'Error',
				            content: 'Barang Sudah Terdaftar',
				            type: 'alert'
				        });
					}else{
						$('#table_body').append("<tr><td>"+no+"</td><td><a class='photobox' href='<?php echo base_url() ?>"+data.photo+"'><img width='20' src='<?php echo base_url() ?>"+data.photo+"' alt=''/></a></td><td>"+data.product_code+"</td><td>"+data.name+"</td><td>"+data.tray+"</td><td>"+data.type+"</td><td>"+data.category+"</td><td>"+data.real_weight+"</td><td>"+data.rounded_weight+"</td><td>"+data.selling_price+"</td><td>"+data.amount_type+data.original+"->"+data.marked_up+"</td><td>"+data.outlet+"</td></tr>");

						$('#form_mutation').append("<input type='hidden' name='product_code[]' value='"+data.product_code+"'>");
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
	
	function notifyOnErrorInput(input){
        var message = input.data('validateHint');
        $.Notify({
            caption: 'Error',
            content: message,
            type: 'alert'
        });
    }
</script>