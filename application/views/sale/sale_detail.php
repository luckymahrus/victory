<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<div class="container-fluid">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url('sale') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Daftar Penjualan</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Penjualan dari Kode Penjualan <?php echo $details[0]->sale_code ?></h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Cari.." id="filter" >
                </div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell table-responsive toggle-circle-filled">
				<table class="table hovered border table-condensed" id="table_sale" data-filter="#filter" data-page-size="10">
					<thead>
						<tr>
							<th data-type="numeric">No.</th>
							<th data-hide="phone">Foto</th>
							<th >Nama Barang</th>
							<th data-hide="phone">Kode Barang</th>
							<th data-hide="phone">Berat Real</th>
							<th data-hide="phone">Penyesuaian</th>
							<th data-hide="phone">Harga Jual</th>
							<th data-hide="phone">Discount</th>
							<th data-hide="phone">Total Harga</th>
							
						</tr>
					</thead>
					<tbody>
						<?php if($details !=NULL): ?>
							<?php $i = 1; ?>
							<?php foreach($details as $row): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><a class="photobox" href="<?php echo base_url().$row->photo ?>"><img width="20" src="<?php echo base_url().$row->photo ?>" alt=""/></a></td>
									<td><?php echo $row->name ?></td>
									<td><a href="#" onclick="showDialog('<?php echo $row->product_code ?>')"><?php echo $row->product_code ?></a></td>
									<td><?php echo $row->real_weight ?></td>
									<td><?php echo $row->rounded_weight ?></td>
									<td><?php echo $row->selling_price ?></td>
									<td><?php echo $row->discount ?></td>
									<td><?php echo $row->total_price ?></td>
								</tr>		
								<?php $i++; ?>
							<?php endforeach; ?>
						<?php else:?>
							<tr>
								<td colspan="12" class="text-center"><h3>Table kosong</h3></td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<script src="<?php echo base_url() ?>js/alertify.min.js"></script>
<script src="<?php echo base_url() ?>js/footable.js"></script>
<script src="<?php echo base_url() ?>js/footable.filter.js"></script>
<script src="<?php echo base_url() ?>js/footable.paginate.js"></script>
<script src="<?php echo base_url() ?>js/footable.sort.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/fancybox/source/jquery.fancybox.js"></script>

<script>
	

	$(document).ready(function(){
		<?php if($this->session->flashdata('sale')): ?>

	       <?php echo $this->session->flashdata('sale') ?>

	    <?php endif; ?>

	    $('#table_sale').footable();
	    $('a.photobox').fancybox();

	});

	function showDialog(code){
	  	$.ajax({
	            url: "<?php echo base_url('product/get_product_detail/')?>" + code,
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
	            		metroDialog.create({
			            title: "Detil Barang",
			            content: "<div class='grid'><div class='row cells3 bg-grayLighter' style='padding: 20px;'><div class='cell'><div class='grid'><div class='row'><div class='cell'><img src='<?php echo base_url()?>"+data.photo+"' alt=''></div></div></div></div><div class='cell colspan2'><div class='grid'><div class='row'><div class='cell'><h3 style='margin-top:0'>"+data.name+" - "+data.product_code+"</h3></div></div><div class='row cells4'><div class='cell'><h4>Tipe</h4><h4>Kategori</h4><h4>Berat</h4><h4>Harga Beli</h4><h4>Harga Jual</h4><h4>Buyback</h4><h4>Jumlah Emas</h4><h4>Baki</h4><h4>Status</h4><h4>Outlet</h4></div><div class='cell colspan3'><h4>: "+data.type+"</h4><h4>: "+data.category+"</h4><h4>: "+data.real_weight+" ~ "+data.rounded_weight+"</h4><h4>: "+data.purchase_price+"</h4><h4>: "+data.selling_price+"</h4><h4>: "+data.buyback+"</h4><h4>: "+data.gold_amount+"</h4><h4>: "+data.tray+"</h4><h4>: "+data.status+"</h4><h4>: "+data.outlet+"</h4></div></div></div></div></div></div>",
			            actions: [
			                {
			                    title: "OK",
			                    onclick: function(el){
			                        //console.log(el);
			                        $(el).data('dialog').close();
			                    }
			                },
			            ],
			            options: {
			            }
			        });
	            	}
	        }
	  	});
	}
	
</script>