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
<!--             <div class="row well">
                <h4 >Form Pencarian</h4>
                 <form class="form-inline" role="form" method="post" action="<?php echo base_url() ?>foto_promo/cari">
                              <div class="form-group">
                                
                                <select class="form-control" name="tipe">
                                    <option value="semua">--Pencarian Menurut--</option>
                                    <option value="nama">Nama/Id foto_promo</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <input type="text" name="cari" class="form-control"  placeholder="Masukkan Parameter">
                              </div>
                              <button type="submit" class="btn btn-info">Cari</button>
                            </form>

                            
            </div> -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                           <h4 align="left"> <?php echo anchor('foto_promo/tambah_foto_promo', 'Tambah Foto Promo', 'class="btn btn-primary"'); ?></h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr >
                                            <th>#Id</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Tanggal Posting</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php foreach($hasil->result() as $row) : ?>
                                        <tr class="odd gradeX">
                                            <td align="center"><?php echo $row->id_foto_promo; ?></td>
                                            <td> <?php echo $row->nama_foto_promo; ?> </td>
                                            <td align="center"><?php echo $row->status_foto_promo=='tampil'?'Ditampilkan':'Tidak Ditampilkan'; ?> </td>
                                            <td align="center"><?php echo date("d-m-Y", strtotime($row->tgl_post_foto_promo)); ?></td>
                                            <td align="center">
                                                <?php if ($row->status_foto_promo=='tampil') { ?>
                                             
                                                <a href="<?php echo base_url() ?>foto_promo/edit_manajemen_foto_promo/<?php echo $row->id_foto_promo; ?>/tidak" class="btn btn-warning">Sembunyikan</a>

                                                 <?php } else { ?>

                                                    <a href="<?php echo base_url() ?>foto_promo/edit_manajemen_foto_promo/<?php echo $row->id_foto_promo; ?>/tampil" class="btn btn-warning">Tampilkan</a>

                                                  <?php } ?>
                                                  
                                                <a href="<?php echo base_url() ?>foto_promo/delete_manajemen_foto_promo/<?php echo $row->id_foto_promo; ?>/<?php echo $row->nama_foto_promo; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a> 
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
