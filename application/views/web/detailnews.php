
<!---->
<div class="container">
	<div class="single">
		<div class="col-md-9  single-top">
			<div class="text-in">					
				<div class="single-men">
					<img class="img-responsive" src="<?php echo base_url();?>foto/berita/<?php echo $hasil->foto_berita ;?>" alt="" />
					<h1><?php echo $hasil->judul_berita ;?></h1>
					<h6><i>Posted on <?php echo date("d M Y, H:i:s", strtotime($hasil->tgl_post_berita)) ?></i></h6>
					<p><?php echo $hasil->isi_berita; ?></p>
					</div>
				</div>
				
				
			</div>
			<div class="col-md-3 single-bottom">
				<div class="store-right">
					<h6><a href ="<?php echo base_url();?>berita">Arsip Berita</a></h6>
					<ul class="store-men">
						<?php foreach ($list_arsip->result() as $row) { ?>
							<li><a href="<?php echo base_url() ?>berita/lihat/<?php echo $row->id_berita ?>"><span> </span><?php echo $row->judul_berita ;?> </a></li>
						<?php } ?>
					</ul>
				</div>		
				<div class="store-right">
					<h6>Produk</h6>
					<div class="product">
					<?php foreach ($list_produk->result() as $row) { ?>
						<img class="img-responsive fashion" src="<?php echo base_url() ?>foto/produk/<?php echo $row->foto_produk ?>" alt=""/>
						<div class="grid-product">
							<a href="<?php echo base_url() ?>produk/lihat/<?php echo $row->id_produk ?>" class="elit"><?php echo $row->nama_produk ?></a>
						</div>
						<div class="clearfix"> </div>
					<?php } ?>
					</div>
				</div>	
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!---->