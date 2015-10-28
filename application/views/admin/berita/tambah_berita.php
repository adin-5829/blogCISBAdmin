<div id="page-wrapper">
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Berita Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

         <div class="row">
                <div class="col-lg-12">
 
		<form action="<?php echo base_url() ?>berita/tambah_berita/" method="POST" enctype="multipart/form-data" data-toogle="validator" role="form">

		 <div class="form-group">
			  <label for="Nama">Judul Berita</label>
			  	<div class="row">
		   		<div class="col-md-12">
		   			<input type="text" class="form-control" name="judul_berita" placeholder="Judul Berita"  maxlength="100" required>
                    <div class="help-block with-errors">Maksimal Karakter : 100</div>

		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Isi Berita</label>
			  	<div class="row">
		   		<div class="col-md-9">
		   			<textarea class="form-control" name="isi_berita" placeholder="Isi Berita" required></textarea>
                    <div class="help-block with-errors"></div>
		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Foto Header</label>
			  	<div class="row">
		   		<div class="col-md-8">
		   			<input type="file" name="userfile" required>
		   			<div class="help-block with-errors">Tipe : JPG, PNG, atau JPEG</div>
		   		</div>
		   	</div>
		 </div>

		 <input type="submit" class="btn btn-primary" name="tambah" value="Tambah Berita">
            <input type="reset" class="btn btn-danger" name="reset" value="Reset">
            <a href="<?php echo base_url()?>berita" class="btn btn-warning" name="reset">Batal</a>
		</form>
			     </div>
            </div>  
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