        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Kontak</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <hr>
                <center>Data Kontak</center>
                <hr>
                <table class="table table-striped">
                    <tr>
                        <td><b>Alamat</b></td>
                        <td><?php echo $hasil->alamat_kontak ?></td>
                    </tr>
                     <tr>
                        <td><b>Alamat (Google Maps)</b></td>
                        <td><?php echo $hasil->alamat_google_maps ?></td>
                    </tr>
                     <tr>
                        <td><b>Email</b></td>
                        <td><?php echo $hasil->email_kontak ?></td>
                    </tr>
                    <tr>
                        <td><b>Telepon</b></td>
                        <td><?php echo $hasil->telpon1_kontak ?> & <?php echo $hasil->telpon2_kontak ?></td>
                    </tr>
                     <tr>
                        <td><b>PIN BBM</b></td>
                        <td><?php echo $hasil->pin_bb_kontak ?></td>
                    </tr>
                    <tr>
                        <td><b>Facebook</b></td>
                        <td><?php echo $hasil->nama_fb_kontak ?> : <?php echo $hasil->link_fb_kontak ?></td>
                    </tr>
                </table>
                <a href="<?php echo base_url() ?>kontak/edit_profil_kontak" class="btn btn-warning">Ubah Profil</a>
            </div>    
</div>
        <!-- /.row -->

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