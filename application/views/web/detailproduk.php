<!---->
<div class="container">
	<div class="single">
		<div class="col-md-3 single-bottom">
			<div class="store-right">
				<h6><a href="<?php echo base_url() ?>produk/"> Kategori </a></h6>
				<ul class="store-men">
				<?php foreach ($kategori->result() as $row2) { ?>
					<li><a href="<?php echo base_url() ?>produk/kategori/<?php echo $row2->id_sub_kategori; ?>"><span> </span><?php echo $row2->nama_sub_kategori; ?> </a></li>
				<?php } ?>
				</ul>
			</div>	
			<div class="store-right">
				<h6>Produk Terbaru</h6>
				<?php foreach ($produk_terbaru->result() as $row3) { ?>
				<div class="product">
					<img class="img-responsive fashion" src="<?php echo base_url() ?>foto/produk/<?php echo $row3->foto_produk ?>" alt=""/>
					<div class="grid-product">
						<a href="<?php echo base_url() ?>produk/lihat/<?php echo $row3->id_produk ?>" class="elit"><?php echo $row3->nama_produk ?></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<?php } ?>
			</div>	
		</div>
		<div class="col-md-9  single-top">
			<div class="text-in">					
				<div class="single-men">
					<center><img class="img-responsive gambar-utama" src="<?php echo base_url() ?>foto/produk/<?php echo $hasil->foto_produk ?>" alt="" /></center>
					<h1><?php echo $hasil->nama_produk ?></h1>
					<p><?php echo $hasil->detail_produk ?></p>
						<h5>Kemasan : </h5> <p> <?php echo $hasil->kemasan_produk ?> </p>
						<h5>Saran pemakaian : </h5>
						<p><?php echo $hasil->saran_produk ?></p>
						</div>
						
						
						<div class="comments-area" style="margin-top:3em;">
							<h3>Tambahkan komentar</h3>
							<form action="<?php echo base_url() ?>komentar/tambah_komentar" method="POST">
								<p>
									<label>Nama</label>
									<input type="hidden" name="id_produk" value="<?php echo $hasil->id_produk ?>">
									<input name="nama_komentar" type="text" value="">
								</p>
								<p>
									<label>Email</label>
									
									<input name="email_komentar" type="text" value="">
								</p>
								<p>
									<label>Website</label>
									<input name="website_komentar" type="text" value="">
								</p>
								<p>
									<label>Subjek</label>
									
									<textarea name="isi_komentar"></textarea>
								</p>
								<div class="sub-in">
									<input type="submit" value="Kirim">
								</div>
							</form>
						</div>

						<ul class="comment-list">
							<h1>Komentar</h1><br>

							<?php foreach($list_komentar->result() as $row_komen) { ?>
							<h5 class="post-author_head"><a href="#" title="Posts by admin" rel="author"><?php echo $row_komen->nama_komentar ?></a> say:</h5>
							<li><img src="<?php echo base_url() ?>images/avatar.png" class="img-responsive" alt="">
								<div class="desc">
									<a href="#"><p><?php echo date("d-m-Y, H:i:s", strtotime($row_komen->tgl_post_komentar)) ?></p></a><br>
									<p><?php echo $row_komen->isi_komentar ?></p>
								</div> 
								<div class="clearfix"></div>
							</li><br>
							<?php } ?>
						</ul>

					</div>
					
					
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	<!---->