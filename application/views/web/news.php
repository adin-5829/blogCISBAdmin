<div class="container">
	<div class="specials">
		<h2>Berita
		<?php if ($this->uri->segment(2) == 'cari') {
				echo " <small> > Judul : <i>$keyword</i> </small>";
			} ?>
		</h2>
		<?php foreach ($hasil->result() as $row) { ?>

		<div class="special-top">
			<div class="col-md-6 special-in">
				<a href="<?php echo base_url() ?>berita/lihat/<?php echo $row->id_berita ?>" ><img src="<?php echo base_url() ?>foto/berita/<?php echo $row->foto_berita ?>" class="img-responsive" alt=""></a>
			</div>
			<div class="col-md-8 special-capt">
				<h1><a href="<?php echo base_url() ?>berita/lihat/<?php echo  $row->id_berita ?>"><?php echo $row->judul_berita ?></a></h1>
				<h5><i> Posted on <?php echo date("d M Y H:i:s", strtotime($row->tgl_post_berita)) ?> </i></h5>
				<p><?php echo substr($row->isi_berita, 0, 320) ?> ...</p>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php } ?>
		<nav> <center>
			<?php echo $this->pagination->create_links(); ?>
		</center></nav>
	</div>
</div>
<!----><!-- 
<center>
	<div class="special-top">
		<div class="bottom-news">
			<div class="col-md-3 special-in">
				<a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>" ><img src="images/pi2.jpg" class="img-responsive" alt="">

				</a>
				<h5><a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>">judul berita gitu</a></h5>
			</div>
			<div class="col-md-3 special-in">
				<a href="<?php echo base_url() ?>single.html" ><img src="images/pi.jpg" class="img-responsive" alt="">

				</a>
				<h5><a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>">Berita lagi</a></h5>
			</div>
			<div class="col-md-3 special-in">
				<a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>" ><img src="images/pi1.jpg" class="img-responsive" alt="">

				</a>
				<h5><a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>">Apaan gitu lah judulnya</a></h5>
			</div>
			<div class="col-md-3 special-in">
				<a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>" ><img src="images/pi4.jpg" class="img-responsive" alt="">

				</a>
				<h5><a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>">Sak senengmu nulis opoh</a></h5>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="special-top">
			<div class="bottom-news">
				<div class="col-md-3 special-in">
					<a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>" ><img src="images/pi3.jpg" class="img-responsive" alt="">

					</a>
					<h5><a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>">Uyeeeaahhh</a></h5>
				</div>
				<div class="col-md-3 special-in">
					<a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>" ><img src="images/pi7.jpg" class="img-responsive" alt="">

					</a>
					<h5><a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>">Hmmmm opo yoh mbuh</a></h5>
				</div>
				<div class="col-md-3 special-in">
					<a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>" ><img src="images/pi6.jpg" class="img-responsive" alt="">

					</a>
					<h5><a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>">judul berita lagi gigi</a></h5>
				</div>
				<div class="col-md-3 special-in">
					<a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>" ><img src="images/pi5.jpg" class="img-responsive" alt="">

					</a>
					<h5><a href="<?php echo base_url() ?>berita/lihat/<?php $row->id_berita ?>">Judul berita ta ta tat ata</a></h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</center> -->