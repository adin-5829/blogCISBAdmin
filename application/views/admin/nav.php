   <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>user"><b>Admin</b> Ultra Chemical</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo $this->session->userdata('nama') ?>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url() ?>admin/profil_admin"><i class="fa fa-user fa-fw"></i> Profil</a>
                        <li><a href="<?php echo base_url() ?>kontak/profil_kontak"><i class="fa fa-user fa-fw"></i> Info Kontak</a>
                        </li>
                        <li><a href="<?php echo base_url() ?>admin/ubah_password "><i class="fa fa-lock fa-fw"></i> Ubah Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url() ?>user/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a class="active" href="<?php echo base_url() ?>user"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Kategori<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>kategori">Kategori</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>sub_kategori">Sub Kategori</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Data Posting<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>produk">Produk</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>produk/upload_pricelist">Price List</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>berita">Berita</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>komentar">Komentar</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>hubungi_kami">Pesan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>foto_promo">Foto Promo</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Data Galeri<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>galeri_foto">Foto</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>video">Video</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>