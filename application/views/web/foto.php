
<div class="container">
	<div class="specials">
		<h2>Galeri Foto</h2>
		<?php $i = 1; foreach ($hasil->result() as $row) { 
			if ($i==1 || $i == 5) {
				echo '<div class="special-top">';
			}
			?>
			<div class="col-md-3 special-in">
				<img src="<?php echo base_url() ?>foto/galeri_foto/<?php echo $row->foto_galeri_foto ?>" height="200px" width="100%" alt="">
			</div>
			<?php if ($i==4 || $i == 8 || $i == 12 || $i == 16 || $i == $total_rows) {
				echo '<div class="clearfix"> </div>
			</div>';
		}
		$i++; } ?>
	</div>
	
	<nav> <center>
		<?php echo $this->pagination->create_links(); ?>
	</center></nav>
</div>