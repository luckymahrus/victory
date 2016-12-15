<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	            <h3 style="display:inline-block;float:right;"><small><a href="<?php echo base_url('product/add_product') ?>">Tambah product <span class="fa fa-arrow-circle-o-right"></span></a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Produk</h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Cari product" id="filter" >
                </div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell table-responsive toggle-circle-filled">
				<table class="table hovered border table-condensed" id="table_product" data-filter="#filter" data-page-size="10">
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
					<tbody>
						<?php if($products !=NULL): ?>
							<?php $i = 1; ?>
							<?php foreach($products as $product): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><a class="photobox" href="<?php echo base_url().$product->photo ?>"><img width="20" src="<?php echo base_url().$product->photo ?>" alt=""/></a></td>
									<td><?php echo $product->product_code ?></td>
									<td><?php echo $product->name ?></td>
									<td><?php echo $product->tray ?></td>
									<td><?php echo $product->type ?></td>
									<td><?php echo $product->category ?></td>
									<td><?php echo $product->real_weight ?></td>
									<td><?php echo $product->rounded_weight ?></td>
									<td><?php echo $product->selling_price ?></td>
									<td><?php echo $product->amount_type.$product->original.' -> '.$product->marked_up ?></td>
									<td><?php echo $product->outlet ?></td>
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
		<?php if($this->session->flashdata('product')): ?>

	       <?php echo $this->session->flashdata('product') ?>

	    <?php endif; ?>

	    $('#table_product').footable();
	    $('a.photobox').fancybox();

	});

	
</script>