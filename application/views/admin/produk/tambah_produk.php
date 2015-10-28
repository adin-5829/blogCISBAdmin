<div id="page-wrapper">
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Produk Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

         <div class="row">
                <div class="col-lg-12">
 
		<form action="<?php echo base_url() ?>produk/tambah_produk/" method="POST" enctype="multipart/form-data" data-toogle="validator" role="form">
		 <div class="form-group">
			  <label for="Nama">Kategori Produk</label>
			  	<div class="row">
		   		<div class="col-md-6">
					<select name="sub_kategori" class="form-control" required>
						<option value="">--Pilih Kategori--</option>
						<?php 
							$this->db->select('id_sub_kategori, nama_sub_kategori'); 
							$this->db->from('sub_kategori');
							$kategori = $this->db->get();
							foreach ($kategori->result() as $row) {
						?>
						
						<option value="<?php echo $row->id_sub_kategori ?>"><?php echo $row->nama_sub_kategori; ?></option>
							
						<?php }	?>
					</select>

		   		</div>
		   	</div>
		 </div>
		 <div class="form-group">
			  <label for="Nama">Nama Produk</label>
			  	<div class="row">
		   		<div class="col-md-6">
		   			<input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk"  maxlength="50" required>
                    <div class="help-block with-errors">Maksimal Karakter : 50</div>

		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Deskripsi Produk</label>
			  	<div class="row">
		   		<div class="col-md-9">
		   			<textarea class="form-control" name="detail_produk" placeholder="Apa yang perlu diketahui tentang Produk anda?" required></textarea>
                    <div class="help-block with-errors"></div>
		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Kemasan Produk</label>
			  	<div class="row">
		   		<div class="col-md-9">
		   		<input type="text" class="form-control" name="kemasan_produk" placeholder="Tipe kemasan Produk" required>
                    <div class="help-block with-errors">*Misal 5 liter</div>
		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Saran Pemakaian Produk</label>
			  	<div class="row">
		   		<div class="col-md-9">
		   			<textarea class="form-control" name="saran_produk" placeholder="Saran Pemakaian" required></textarea>
                    <div class="help-block with-errors"></div>
		   		</div>
		   	</div>
		 </div>

		 <div class="form-group">
			  <label for="Nama">Foto</label>
			  	<div class="row">
		   		<div class="col-md-8">
		   			<input type="file" name="userfile" required>
		   			<div class="help-block with-errors">Tipe : JPG, PNG, atau JPEG</div>
		   		</div>
		   	</div>
		 </div>

		 <input type="submit" class="btn btn-primary" name="tambah" value="Tambah Produk">
            <input type="reset" class="btn btn-danger" name="reset" value="Reset">
            <a href="<?php echo base_url()?>produk" class="btn btn-warning" name="reset">Batal</a>
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