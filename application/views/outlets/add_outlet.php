<div class="container">
	<div class="grid">
		<div class="row">
			<div class="cell">
				<h4>Tambah Outlet Baru</h4>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label>Nama Toko</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Nama Toko">
                </div>
			</div>
			<div class="cell">
				<label>Kode Toko</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Masukkan Kode Toko">

                </div>
			</div>
		</div>
		<div class="row">
			<div class="cell">
				<div class="input-control file" data-role="input" accept="image/*" id="capture" capture="camera">
				    <input type="file">
				    <button class="button"><span class="mif-camera"></span></button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cell">
				
<div id="my_camera" style="width:320px; height:240px;"></div>
<div id="my_result"></div>
<script language="JavaScript">
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
<a href="javascript:void(take_snapshot())">Take Snapshot</a>
			</div>
		</div>
	</div>
</div>