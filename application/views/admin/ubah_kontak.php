<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Ubah Kontak</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		<form action="<?php echo base_url() ?>kontak/edit_profil_kontak/" method="POST" data-toogle="validator" role="form">
		<div class="form-group">
			  <label for="Nama">Alamat Kantor</label>
			  	<div class="row">
		   		<div class="col-md-9">
		   			<textarea class="form-control" name="alamat_kontak" placeholder="Alamat Kantor" required><?php echo $hasil->alamat_kontak; ?></textarea>
                    <div class="help-block with-errors"></div>
		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Alamat Maps (Untuk Kebutuhan Embed Google Maps)</label>
			  	<div class="row">
		   		<div class="col-md-9">
		   			<textarea class="form-control" name="alamat_google_maps" placeholder="Alamat Maps " required><?php echo $hasil->alamat_google_maps; ?></textarea>
                    <div class="help-block with-errors"></div>
		   		</div>
		   	</div>
		 </div>

		<div class="form-group">
			  <label for="Nama">Nomor Telpon 1 & 2</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="text" class="form-control" name="telpon1_kontak" placeholder="Nomor Telpon 1" value="<?php echo "$hasil->telpon1_kontak";?>" maxlength="20" required>
		   		</div>
		   		<div class="col-md-6">
		   			<input type="text" class="form-control" name="telpon2_kontak" placeholder="Nomor Telpon 2" value="<?php echo "$hasil->telpon2_kontak";?>" maxlength="20" required>
		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">PIN BBM</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="text" class="form-control" name="pin_bb_kontak" placeholder="PIN BBM" value="<?php echo "$hasil->pin_bb_kontak";?>" maxlength="20" required>
		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Nama & Link Facebook</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="text" class="form-control" name="nama_fb_kontak" placeholder="Nama FB" value="<?php echo "$hasil->nama_fb_kontak";?>" maxlength="50" required>
                    <div class="help-block with-errors">Maksimal Karakter : 50</div>
		   		</div>

		   		<div class="col-md-6">
		   			<input type="text" class="form-control" name="link_fb_kontak" placeholder="Link FB" value="<?php echo "$hasil->link_fb_kontak";?>" maxlength="50" required>
                    <div class="help-block with-errors">Maksimal Karakter : 50</div>
		   		</div>
		   	</div>
		 </div>
		 
		 <div class="form-group">
			  <label for="Nama">Email</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="email" class="form-control" name="email_kontak" placeholder="Email" value="<?php echo "$hasil->email_kontak";?>" maxlength="50" required>
		   		</div>
		   	</div>
		 </div>
		 <input type="submit" class="btn btn-primary" name="tambah" value="Simpan Perubahan Kontak">
            <input type="reset" class="btn btn-danger" name="reset" value="Reset">
            <a href="<?php echo base_url()?>kontak/profil_kontak" class="btn btn-warning" name="reset">Batal</a>
		</form>
</div>
</div>

        <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url() ?>js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>js/sb-admin-2.js"></script>

    <!-- Validator JavaScript -->
    <script src="<?php echo base_url() ?>js/validator.min.js"></script>
</body>
</html>     