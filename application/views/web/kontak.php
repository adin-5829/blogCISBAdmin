	<div class="container">
		<div class="contact">
			<div class="contact-in">
				<h2>Kontak</h2>
				<div class="col-md-12 map">
					<!-- <iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=Jalan%20Kabupaten%20km%201%2C5%20Panggungan%20Lor%2C%20Yogyakarta&key=AIzaSyBpO70lavc9H4bIhKSYM74xcDXeczPQ97U" allowfullscreen></iframe>  -->

<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=<?php echo $hasil->alamat_google_maps	 ?>&key=AIzaSyBpO70lavc9H4bIhKSYM74xcDXeczPQ97U" allowfullscreen></iframe>
				</div>
				<div class="clearfix"></div>
			</div>

            <?php if($alert!=null) { ?>
            <div class="alert alert-success alert-dismissable">
                <span class="glyphicon glyphicon-warning-sign"></span>
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php  echo $alert; ?>
            </div>
             <?php } ?>

			<div class="contact-on">
				<div class=" col-md-9 contact-left">
					<h5>Hubungi Kami</h5>
					<form action="<?php echo base_url() ?>hubungi_kami/tambah_hubungi_kami" method="POST">
						<div>
							<span>Nama</span>
							<input name="nama_hubungi_kami" type="text" class="textbox">
						</div>
						<div>
							<span>E-Mail</span>
							<input name="email_hubungi_kami" type="text" class="textbox">
						</div>
						<div>
							<span>Subjek</span>
							<textarea name="subjek_hubungi_kami"> </textarea>
						</div>
						<div>
							<span><input type="submit" value="Kirim"></span>
						</div>
					</form>
				</div>

				<div class=" col-md-3 contact-right">
					<h5>Kantor Pemasaran</h5>
					<p><?php echo $hasil->alamat_kontak ?></p> <br/> <br/>
					<p>Phone: <?php echo $hasil->telpon1_kontak ?> atau  <?php echo $hasil->telpon2_kontak ?></p>
					<p>Pin BBM : <?php echo $hasil->pin_bb_kontak ?> </p>
					<p>Follow on Facebook: <a href="<?php echo $hasil->link_fb_kontak; ?>"><?php echo $hasil->	nama_fb_kontak	; ?></a>
					</div>
					
					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

