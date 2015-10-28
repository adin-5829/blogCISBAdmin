<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Ubah Video</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		<form action="<?php echo base_url() ?>video/edit_manajemen_video/<?php echo "$hasil->id_video";?>" method="POST" enctype="multipart/form-data" data-toogle="validator" role="form">

		 <div class="form-group">
			  <label for="Nama">Judul</label>
			  	<div class="row">
		   		<div class="col-md-12">
		   			<input type="text" class="form-control" name="nama_video" value="<?php echo $hasil->nama_video; ?>" placeholder="Judul Video"  maxlength="50" required>
                    <div class="help-block with-errors">Maksimal Karakter : 50</div>

		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Link Embed Video Youtube</label>
			  	<div class="row">
		   		<div class="col-md-12">
		   			<input type="text" class="form-control" name="link_youtube" value="<?php echo $hasil->link_youtube; ?>" placeholder="Link Youtube Video"  maxlength="50" required>
                    <div class="help-block with-errors">Contoh : https://www.youtube.com/embed/dRLq2mc5IZk</div>

		   		</div>
		   	</div>
		 </div>

		<div class="form-group">
			  <label for="Nama">Deskripsi Video</label>
			  	<div class="row">
		   		<div class="col-md-9">
		   			<textarea class="form-control" name="detail_video" placeholder="Apa yang perlu diketahui tentang Video anda?" required><?php echo $hasil->detail_video; ?></textarea>
                    <div class="help-block with-errors"></div>
		   		</div>
		   	</div>
		 </div>


		 <input type="submit" class="btn btn-primary" name="tambah" value="Simpan Video">
            <input type="reset" class="btn btn-danger" name="reset" value="Reset">
            <a href="<?php echo base_url()?>video" class="btn btn-warning" name="reset">Batal</a>
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