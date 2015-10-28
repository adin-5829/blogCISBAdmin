
<div class="container">
	<div class="specials">
		<h2>Galeri Video</h2>
		<?php foreach ($hasil->result() as $row) { ?>
		<div class="row">
			<div class="col-md-5" style="margin-top:2em;">
				<iframe width="550" height="270" src="<?php echo $row->link_youtube ?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="col-md-offset-1 col-md-6" style="margin-top:2em;">
				<div class="capt-video">
					<h1><?php echo $row->nama_video ?></h1>
					<h5><i><?php echo date("d M, Y H:i:s", strtotime($row->tgl_post_video)) ?></i></h5>
					<p style="padding-top:1em;"><?php echo $row->detail_video ?></p>
					</div>  
				</div>
			</div>
		<?php } ?>
		</div> <!--div special-->

		<nav> <center>
			<?php echo $this->pagination->create_links(); ?>
		</center></nav>

	</div>