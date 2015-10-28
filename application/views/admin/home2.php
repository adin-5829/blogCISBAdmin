<div id="page-wrapper" style="min-height: 213px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-rss fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $banyak_berita==null?0:$banyak_berita;?></div>
                                    <div>Berita</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>berita">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Semua</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dropbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $banyak_produk==null?0:$banyak_produk;?></div>
                                    <div>Produk</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>produk">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Semua</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $banyak_pesan==null?0:number_format($banyak_pesan, 0, ',', '.');?></div>
                                    <div>Pesan</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>hubungi_kami">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Semua</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $banyak_komentar==null?0:number_format($banyak_komentar, 0, ',', '.');?></div>
                                    <div>Komentar</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>komentar">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Semua</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->                  
                </div>
                <!-- /.col-lg-8 -->
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

</body>
</html>