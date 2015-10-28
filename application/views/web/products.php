
<div class="container">
	
	<div class="filter"><center>
		
		<h4><p style="padding-top:1em;padding-bottom:1.5em;font-family: 'Roboto Condensed', sans-serif;">Cari berdasar kategori</p></h4>
		<div class="row">
			<div class="btn-group" role="group" aria-label="" style="font-family: 'Roboto Condensed', sans-serif;">
			<?php foreach ($kategori->result() as $row2) { ?>
				<a href ="<?php echo base_url() ?>produk/kategori/<?php echo $row2->id_sub_kategori; ?>"><button type="button" class="btn btn-default"><?php echo $row2->nama_sub_kategori; ?></button></a>
			<?php } ?>
			</div>	
		</div>
	</div>
</center>
</div>

<div class="specials">
	<h2>Produk
	<?php if ($this->uri->segment(2) == 'kategori') {
		echo " <small> > $nama_sub_kategori </small>";
	} elseif ($this->uri->segment(2) == 'cari') {
		echo " <small> > Nama : <i>$keyword</i> </small>";
	} ?>
	</h2>
	<?php $i = 1; foreach ($hasil->result() as $row) { 
		if ($i==1 || $i == 5) {
			echo '<div class="special-top">';
		}
	?>
		<div class="col-md-3 special-in">
			<a href="<?php echo base_url() ?>produk/lihat/<?php echo $row->id_produk ?>" ><img src="<?php echo base_url() ?>foto/produk/<?php echo $row->foto_produk ?>" height="200px" width="100%" alt="">
			</a>
			<h5><a href="<?php echo base_url() ?>produk/lihat/<?php echo $row->id_produk ?>"><?php echo $row->nama_produk ?></a></h5>
			<p><?php echo substr($row->detail_produk, 0,150) ?>...</p>
		</div>
	<?php if ($i==4 || $i == 8 || $i == $total_rows) {
		echo '<div class="clearfix"> </div>
				</div>';
		}
	$i++; } ?>

	<center>
		<?php echo $this->pagination->create_links(); ?>
	</center>

	
	
	<!---->
	<div class="img-download">
		<center><a href ="<?php echo base_url()?>produk/donwload_pricelist"><img src="<?php echo base_url() ?>images/download.png"></a><center>
		</div>
		<!---->
	</div>
</div>