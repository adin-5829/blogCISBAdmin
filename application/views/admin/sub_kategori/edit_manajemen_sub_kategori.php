<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Ubah Sub Kategori</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		<form action="<?php echo base_url() ?>sub_kategori/edit_manajemen_sub_kategori/<?php echo "$hasil->id_sub_kategori";?>" method="POST" enctype="multipart/form-data" data-toogle="validator" role="form">
        <div class="form-group">
              <label for="Nama">Nama Sub Kategori</label>
                <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nama_sub_kategori" placeholder="Nama Kategori"  maxlength="30" value="<?php echo $hasil->nama_sub_kategori ?>" required>
                    <div class="help-block with-errors">Maksimal Karakter : 30</div>

                </div>
            </div>
         </div>
         <div class="form-group">
              <label for="Nama">Kategori</label>
                <div class="row">
                <div class="col-md-6">
                    <select name="id_kategori" class="form-control">
                        <option value="">-- Pilih Kategori --</option>

                        <?php foreach ($list_kategori->result() as $row) { ?>
                           <option value="<?php echo $row->id_kategori ?>" <?php echo $hasil->id_kategori==$row->id_kategori?'selected':''; ?>><?php echo $row->nama_kategori ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>
         </div>
	
		 <input type="submit" class="btn btn-primary" name="tambah" value="Simpan Perubahan Sub Kategori">
            <input type="reset" class="btn btn-danger" name="reset" value="Reset">
            <a href="<?php echo base_url()?>sub_kategori" class="btn btn-warning" name="reset">Batal</a>
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