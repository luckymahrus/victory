<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<div class="container-fluid">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url('tray') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Daftar Baki</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Barang dari Kode Baki <?php echo $this->uri->segment(3) ?></h1>
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
				<table class="table hovered border bordered table-condensed" id="table_tray" data-filter="#filter" data-page-size="10">
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
						<?php if($details !=NULL): ?>
							<?php $i = 1; ?>
							<?php foreach($details as $detail): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><a class="photobox" href="<?php echo base_url().$detail->photo ?>"><img width="20" src="<?php echo base_url().$detail->photo ?>" alt=""/></a></td>
									<td><?php echo $detail->product_code ?></td>
									<td><?php echo $detail->name ?></td>
									<td><?php echo $detail->tray ?></td>
									<td><?php echo $detail->type ?></td>
									<td><?php echo $detail->category ?></td>
									<td><?php echo $detail->real_weight ?></td>
									<td><?php echo $detail->rounded_weight ?></td>
									<td><?php echo $detail->selling_price ?></td>
									<td><?php echo $detail->amount_type.$detail->original.' -> '.$detail->marked_up ?></td>
									<td><?php echo $detail->outlet ?></td>
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

	    $('#table_tray').footable();
	    $('a.photobox').fancybox();

	});

	
</script>