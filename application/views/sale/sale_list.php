<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<div class="container-fluid">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Penjualan </h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<?php foreach ($outlets as $outlet):?>
	    			<!-- Small Checkbox -->
					<label class="input-control checkbox small-check">
					    <input type="checkbox" name="<?php echo $outlet->code ?>">
					    <span class="check"></span>
					    <span class="caption"><?php echo $outlet->name ?></span>
					</label>
	    		<?php endforeach; ?>
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
				<table class="table hovered bordered table-condensed" id="table_sale" data-filter="#filter" data-page-size="10">
					<thead>
						<tr>
							<th data-type="numeric">No.</th>
							<th >Kode Penjualan</th>
							<th data-hide="phone">Jumlah Barang</th>
							<th data-hide="phone">Sales</th>
							<th data-hide="phone">Kasir</th>
							<th data-hide="phone">Customer</th>
							<th data-hide="phone">Total Harga</th>
							<th data-hide="phone">Toko</th>
							<th data-hide="phone">Tanggal</th>
							
						</tr>
					</thead>
					<tbody>
						<?php if($sale !=NULL): ?>
							<?php $i = 1; ?>
							<?php foreach($sale as $row): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><a href="<?php echo base_url('sale/detail/'.$row->sale_code) ?>"><?php echo $row->sale_code ?></a></td>
									<td><?php echo $row->qty ?></td>
									<td><?php echo $row->sales_name ?></td>
									<td><?php echo $row->cashier ?></td>
									<td><?php echo $row->customer ?></td>
									<td><?php echo $row->total_price ?></td>
									<td><?php echo $row->outlet_name ?></td>
									<td><?php echo date('d-M-Y H:i',strtotime($row->date)); ?></td>
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

	
</script>