<div class="row">	 
	<h1>Tambah Sales Baru</h1>
	<hr class="bg-teal">
</div>
<div class="row">

	<form>
		<div class="grid">
                <div class="row cells2">
                    <div class="cell">
                        <label>Nama</label>
						<div class="input-control text full-size" data-role="input">
						    <input type="text" placeholder="Nama Lengkap">
						    <button class="button helper-button clear"><span class="mif-cross"></span></button>
						</div>
                    </div>
                    <div class="cell">
                        <label>Photo</label>
                        <?php if ($is_mobile): ?>
                            <div class="input-control file full-size" data-role="input">
                                <input type="file" accept="image/*" id="capture" capture="camera">
                                <button class="button"><span class="mif-camera"></span></button>
                            </div>
                        <?php else: ?>    
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
                        <?php endif ?>
						
                    </div>
                </div>
                <div class="row cells">
                	<div class="cell">
                		<label>No. Telp</label>
                		<div class="input-control text full-size" data-role="input">
						    <input type="text" placeholder="Nomor Telephone Sales">
						    <button class="button helper-button clear"><span class="mif-cross"></span></button>
						</div>
                	</div>
                </div>
                <div class="row cells">
                	<div class="cell">
                		<label>Alamat</label>
                		<div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true">
						    <textarea></textarea>
						</div>
                	</div>
                </div>
                <div class="row cells2">
                    <div class="cell">
                        <label>Username</label>
						<div class="input-control text full-size" data-role="input">
						    <input type="text" placeholder="Username Sales">
						    <button class="button helper-button clear"><span class="mif-cross"></span></button>
						</div>
                    </div>
                    <div class="cell">
                        <label>Password</label>
						<div class="input-control password full-size" data-role="input">
						    <input type="password" placeholder="Password">
						    <button class="button helper-button reveal"><span class="mif-looks"></span></button>
						</div>
                	</div>
                </div>
                <div class="row cells">
                	<label>Tempat Bekerja</label>
                	<div class="input-control select full-size">
                		<select>
                			<option>--Pilih Outlet--</option>
                		</select>
                	</div>
                </div>
                <div class="row text-center">
                	<button class="button info bg-teal">Submit</button>
                </div>
                
        </div>
		
		
	</form>
</div>
