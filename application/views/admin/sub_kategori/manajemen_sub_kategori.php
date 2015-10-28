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
                           <h4 align="left"> <?php echo anchor('sub_kategori/tambah_sub_kategori', 'Tambah Sub Kategori', 'class="btn btn-primary"'); ?></h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr >
                                            <th>#Id</th>
                                           
                                            <th>Sub Kategori</th>
                                             <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php foreach($hasil->result() as $row) : ?>
                                        <tr class="odd gradeX">
                                            <td align="center"><?php echo $row->id_sub_kategori; ?></td>
                                            
                                            <td align="center"><?php echo $row->nama_sub_kategori; ?></td>
                                            <td align="center"><?php echo $row->nama_kategori; ?></td>
                                            <td align="center">
                                                <a href="<?php echo base_url() ?>sub_kategori/edit_manajemen_sub_kategori/<?php echo $row->id_kategori; ?>/<?php echo $row->nama_kategori; ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?php echo base_url() ?>sub_kategori/delete_manajemen_sub_kategori/<?php echo $row->id_kategori; ?>/<?php echo $row->nama_kategori; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a> 
                                            </td>
                                        </tr> 
                                    
                                    <?php  
                                        endforeach;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                             <?php
                        echo $this->pagination->create_links();
                    ?>
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
