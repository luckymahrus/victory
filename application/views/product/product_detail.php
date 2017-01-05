<div class="container-fluid">
	<div class="grid">
		<div class="row">
			<div class="cell">
				<pre>
					<?php print_r($details) ?>
				</pre>
			</div>
		</div>
		<div class="row cells3 bg-grayLighter" style="padding: 20px;">
			<div class="cell">
				<div class="grid">
					<div class="row">
						<div class="cell">
							<img src="<?php echo base_url().$details->photo ?>" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="cell colspan2">
				<div class="grid">
					<div class="row">
						<div class="cell">
							<h4><?php echo $details->name ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>