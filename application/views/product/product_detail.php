<div data-role="dialog" id="dialog">
    <h1>Simple dialog</h1>
    <p>
        Dialog :: Metro UI CSS - The front-end framework
        for developing projects on the web in Windows Metro Style.
    </p>
</div>
Manual from js
<button onclick="showdialog()">Show dialog</button>

<script>
	function showdialog(){
		metroDialog.open('#dialog');
	}
</script>

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