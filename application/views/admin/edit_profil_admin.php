<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Ubah Profil Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		<form action="<?php echo base_url() ?>admin/edit_profil_admin/" method="POST" data-toogle="validator" role="form">
		<div class="form-group">
			  <label for="Nama">Username</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="text" class="form-control" name="username" placeholder="User Admin" value="<?php echo "$hasil->username";?>" maxlength="15" required>
		   		</div>
		   	</div>
		 </div>
		 <div class="form-group">
			  <label for="Nama">Nama</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="text" class="form-control" name="nama_admin" placeholder="Nama Admin" value="<?php echo "$hasil->nama_admin";?>" maxlength="50" required>
                    <div class="help-block with-errors">Maksimal Karakter : 50</div>
		   		</div>
		   	</div>
		 </div>
		 
		 <div class="form-group">
			  <label for="Nama">Email</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="email" class="form-control" name="email_admin" placeholder="Email Admin" value="<?php echo "$hasil->email_admin";?>" maxlength="50" required>
		   		</div>
		   	</div>
		 </div>
		 <input type="submit" class="btn btn-primary" name="tambah" value="Simpan Perubahan Admin">
            <input type="reset" class="btn btn-danger" name="reset" value="Reset">
            <a href="<?php echo base_url()?>admin/profil_admin" class="btn btn-warning" name="reset">Batal</a>
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