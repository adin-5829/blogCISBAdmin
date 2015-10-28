				<!---->
				<div class="banner" style="margin-bottom:20px">
					<!-- Slider -->
					<div class="slider-wrapper theme-default">
						<div id="slider" class="nivoSlider slider">
							<?php foreach ($list_foto_promo->result() as $row) { ?>
								<img src="<?php echo base_url() ?>foto/foto_promo/<?php echo $row->foto_foto_promo ?>" alt="" />
							<?php } ?>
						</div>
					</div>
					
					<!-- End Of Slider-->
				</div>
