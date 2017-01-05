<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<div class="container">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Terima Barang</h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Cari kode mutasi atau nama outlet" id="filter" >
                </div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell table-responsive toggle-circle-filled">
				<table class="table hovered bordered border table-condensed" id="table_receive" data-filter="#filter" data-page-size="10">
					<thead>
						<tr>
							<th data-type="numeric">No.</th>
							<th >Kode Mutasi</th>
							<th data-hide="phone">Tanggal</th>
							<th data-hide="phone">Jumlah Barang</th>
							<th data-hide="phone">Asal</th>
							<th data-hide="phone">Destinasi</th>
							<th data-hide="phone">Status</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php if($receives !=NULL): ?>
							<?php $i = 1; ?>
							<?php foreach($receives as $receive): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><a href="<?php echo base_url('product/mutation_item_detail/'.$receive->mutation_code) ?>"><?php echo $receive->mutation_code ?></a></td>
									<td><?php echo date('d M Y H:i',strtotime($receive->date)) ?></td>
									<td><?php echo $receive->product_qty ?></td>
									<td><?php echo $receive->from_outlet ?></td>
									<td><?php echo $receive->to_outlet ?></td>
									<td><?php echo $receive->status ?></td>
									<td><?php if ($receive->status == 'Pending'): ?>
										<a href="<?php echo base_url('product/receive_item/'.$receive->mutation_code) ?>">Terima</a>
									<?php endif ?></td>
								</tr>		
								<?php $i++; ?>
							<?php endforeach; ?>
						<?php else:?>
							<tr>
								<td colspan="7" class="text-center"><h3>Table kosong</h3></td>
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
		<?php if($this->session->flashdata('receive')): ?>

	       <?php echo $this->session->flashdata('receive') ?>

	    <?php endif; ?>

	    $('#table_receive').footable();
	    $('a.photobox').fancybox();

	});

	

	
</script>