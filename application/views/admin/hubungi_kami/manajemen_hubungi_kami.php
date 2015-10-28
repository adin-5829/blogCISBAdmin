        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$judul?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if($alert!=null) { ?>
            <div class="alert alert-success alert-dismissable">
                <span class="glyphicon glyphicon-warning-sign"></span>
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php  echo $alert; ?>
            </div>
             <?php } ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                        Daftar Pesan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr >
                                            <th>#Id</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Pesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php foreach($hasil->result() as $row) : ?>
                                        <tr class="odd gradeX">
                                            <td align="center"><?php echo $row->id_hubungi_kami; ?></td>
                                            <td align="center"><?php echo $row->nama_hubungi_kami; ?></td>
                                            <td align="center"><?php echo date("d-m-Y", strtotime($row->tgl_post_hubungi_kami)); ?></td>
                                            <td align="center"><?php echo substr($row->subjek_hubungi_kami  , 0, 50); ?>...</td>
                                            <td align="center">
                                            <a href="<?php echo base_url() ?>hubungi_kami/lihat/<?php echo $row->id_hubungi_kami; ?>" class="btn btn-primary"  target="_blank">Detail</a>

                                                <a href="<?php echo base_url() ?>hubungi_kami/delete_manajemen_hubungi_kami/<?php echo $row->id_hubungi_kami; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a> 
                                            </td>
                                        </tr> 
                                    
                                    <?php  
                                        endforeach;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <center>
                                <?php
                                    echo $this->pagination->create_links();
                                ?>
                            </center>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
                </div>
                 <!-- /.lg -->
            </div>
             <!-- /.row -->
        </div>
         <!-- /.page -->
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
    
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ?>js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables').dataTable();
    });
    </script>
</body>
</html>
