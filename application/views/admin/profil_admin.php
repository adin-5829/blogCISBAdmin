        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $hasil->nama_admin ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <hr>
                <center>Data Admin</center>
                <hr>
                <table class="table table-striped">
                    <tr>
                        <td><b>Username</b></td>
                        <td><?php echo $hasil->username ?></td>
                    </tr>
                     <tr>
                        <td><b>Email</b></td>
                        <td><?php echo $hasil->email_admin ?></td>
                    </tr>
                </table>
                <a href="<?php echo base_url() ?>admin/edit_profil_admin" class="btn btn-warning">Ubah Profil</a>
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