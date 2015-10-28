<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Ubah Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		<h4><b><?php echo "$error";?></b></h4>
		<hr>
		<form class="span12" id="postForm" action="<?php echo base_url() ?>admin/ubah_password/" method="POST" enctype="multipart/form-data">
			  	<div class="row">
			  		<div class="col-md-6">
		   			Username anda : <b><?php echo "$hasil->username";?></b>
		   		</div>
		   		</div>
		   		<hr>
		 <div class="form-group">
			  <label for="Nama">Password Baru</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="password" class="form-control" name="password_baru" required placeholder="Password Baru">
		   		</div>
		   		<div class="col-md-6">
		   			<input type="password" class="form-control" name="password_baru_konf" required placeholder="Konfirmasi Password Baru">
		   		</div>
		   	</div>
		 </div>
		<div class="form-group">
			  <label for="Nama">Password Lama</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="password" class="form-control" name="password_lama" required placeholder="Password Lama">
		   		</div>
		   	</div>
		 </div>
		 <input type="submit" class="btn btn-primary" name="tambah" value="Simpan Perubahan">
		</form>
			

			
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