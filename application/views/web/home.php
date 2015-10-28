
<div class="content">
	<div class="container">
		<div class="content-grid">
			<div class="col-md-4 grid-food">
				<div id="accordion">
				<?php $no =1; foreach ($list_kategori->result() as $row) { ?>
					<h3><?php echo $row->nama_kategori ?></h3>
					<div>
						<ul>
						<?php foreach (${"list_sub_kategori_$no"}->result() as $row2) { ?>
							<li><a href="<?php echo base_url() ?>produk/kategori/<?php echo $row2->id_sub_kategori; ?>"><?php echo $row2->nama_sub_kategori ?></a></li>
						<?php } ?>
						</ul>
					</div>
				<?php $no++; } ?>
				</div>
				<div class="popular phone">
					<h3>Order online/phone</h3>
					<ul class="number">
						<li><span><i> </i><?php echo $kontak->telpon1_kontak ?></span> </li>
						<li><span><i> </i><?php echo $kontak->telpon2_kontak ?></span> </li>
						<li><span><a> </a><?php echo $kontak->pin_bb_kontak ?></span> </li>				
					</ul>
				</div>
			</div>
			<!---->
			<div class="col-md-8 food-grid">
				<div class="cup">
				<?php foreach ($list_produk->result() as $row) { ?>
			
					<div class="cup-in">
						<a href="<?php echo base_url() ?>produk/lihat/<?php echo $row->id_produk ?>"><img src="<?php echo base_url() ?>foto/produk/<?php echo $row->foto_produk ?>" height="150px" width="100%" alt=""></a>
						<h3 style="padding-top:5px;"><?php echo $row->nama_produk ?></h3>
						<p><?php echo substr($row->detail_produk, 0,48) ?>...</p>
						<div class="details-in">
							<a href="<?php echo base_url() ?>produk/lihat/<?php echo $row->id_produk ?>" class="details">Details</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				<?php } ?>
				<div class="clearfix"> </div>
				</div>
				<!---->
				<div class="browse">
				<form action="<?php echo base_url() ?>produk/cari" method="POST">
					<input class="vit" name="keyword" type="text" placeholder="Ketik nama produk disini ...">
					<button type="submit" href="<?php echo base_url() ?>produk/" class="more">Cari</button>
					<div class="clearfix"> </div>
					<div class="arrow">
						<a href="#"><img src="<?php echo base_url() ?>images/arrow.png" alt=""></a>
					</div>
				</form>
				</div>
				<!---->
				<div class="content-sit">
					<div class="col-md-6 amet">
						<h3><a href="<?php echo base_url() ?>berita/lihat/<?php echo  $headline_baru->id_berita ?>"><?php echo $headline_baru->judul_berita ?></a></h3>
						<p><i><?php echo date("d M Y", strtotime($headline_baru->tgl_post_berita)) ?></i></p>
						<div class="egg">
							<a href="<?php echo base_url() ?>berita/lihat/<?php echo  $headline_baru->id_berita ?>"><img src="<?php echo base_url() ?>/foto/berita/<?php echo $headline_baru->foto_berita ?>" class="img-responsive" alt=""></a>
						</div>
						<p class="para-in"><?php echo substr($headline_baru->isi_berita, 1, 120) ?>...</p>
					</div>
					<div class="col-md-6 amet-in">
						<h3>Recent News</h3>
						<a href = "<?php echo base_url() ?>berita"><h6><p style="text-align:right;padding-top:5px;">lihat arsip berita<p></h6></a>

						<div class="amet-grid">
						<ol>
							<?php foreach ($list_berita->result() as $row) { ?>
								<li class="sed"><a href="<?php echo base_url() ?>berita/lihat/<?php echo  $row->id_berita ?>"><span><?php echo $row->judul_berita ?></span></a></li>
							<?php } ?>
						</ol>
							<div class="clearfix"> </div>
						</div>

					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!---->