<!DOCTYPE html>
<html>
<head>
	<title>Ultra Chemical Parfum Laundry</title>
	<link href="<?php echo base_url() ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url() ?>css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/nivo-slider.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url() ?>js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="<?php echo base_url() ?>css/style-front.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 	<meta name="keywords" content="Food shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" /> -->
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script type="text/javascript" src="<?php echo base_url() ?>js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>

</head>
<body>
	<!--header-->
	<div class="header-in">
		<div class="container">
			<div class="logo">
				<h1><a href="<?php echo base_url() ?>index.html"><img src="<?php echo base_url() ?>images/logo.png"> </a></h1>
				<h5 style:"color:white"><center><p>unggul dalam formulasi, terdepan berinovasi</p></center></h5>
			</div>
			<!---->
			<div class="header-bottom">
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						<li <?php echo ($this->uri->segment(1) == 'home' || is_null($this->uri->segment(1))) ? 'class="active"' : ''; ?>><a href="<?php echo base_url() ?>home">Home  </a><label>- </label> </li>
						<li <?php echo $this->uri->segment(1) == 'produk' ? 'class="active"' : ''; ?>><a href="<?php echo base_url() ?>produk">Produk </a><label>- </label></li>
						<li class="<?php echo ($this->uri->segment(1) == 'galeri_foto' || $this->uri->segment(1) == 'video') ? 'active' : ''; ?>  dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url() ?>galeri_foto">Foto</a></li><br>
								<li><a href="<?php echo base_url() ?>video">Video</a></li>
							</ul>
							<label>- </label>
						</li>
						<li <?php echo $this->uri->segment(1) == 'berita' ? 'class="active"' : ''; ?>><a href="<?php echo base_url() ?>berita"> Berita </a><label>- </label></li>
						<li <?php echo $this->uri->segment(1) == 'kontak' ? 'class="active"' : ''; ?>><a href="<?php echo base_url() ?>kontak"> Kontak </a></li>
					</ul>
					<!--script-->
					<script>
						$("span.menu").click(function(){
							$(".top-nav ul").slideToggle(500, function(){
							});
						});
					</script>
				</div>
				<div class="search">
					<form action="<?php echo base_url() ?>berita/cari" method="POST">
						<input type="text" name="keyword" value="Cari Berita ..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>		

			<?php if ($page_content == 'home') {
				$this->load->view('web/banner_home');
			} ?>

		</div>
	</div>
	<!---->

	<?php $this->load->view('web/'.$page_content); ?>

	<div class="footer">
		<div class="container">
			<div class="col-md-8 footer-bottom ">
				<h4>Find Us on Facebook</h4>
				<?php 
					$this->db->select('link_fb_kontak'); 
					$this->db->from('kontak');
					$query = $this->db->get()->row();
				?>
				<a target="_blank" href="<?php echo $query->link_fb_kontak ?>"><img style ="padding-top:1em;" src ="<?php echo base_url() ?>images/facebook.png"></a>
				<p class="footer-grid">Copyright &copy; 2015 Ultra Chemical Parfum Laundry, All Rights Reserved.</p>

			</div>
			<div class="clearfix"> </div>
		</div>	
	</div>
	
	<script src="<?php echo base_url() ?>js/jquery-1.11.3.min.js"></script>
	<script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

	<script src="<?php echo base_url() ?>js/jquery.nivo.slider.js"></script>
	<script src="<?php echo base_url() ?>js/jquery.nivo.slider.pack.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('#slider').nivoSlider({
				effect: 'slideInLeft',
				pauseTime: 3000
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
					 		*/

					 		$().UItoTop({ easingType: 'easeOutQuart' });

					 	});
	</script>
	<script>
		$( "#accordion" ).accordion();
				// Hover states on the static widgets
				$( "#dialog-link, #icons li" ).hover(
					function() {
						$( this ).addClass( "ui-state-hover" );
					},
					function() {
						$( this ).removeClass( "ui-state-hover" );
					}
					);
			</script>

							<!---->
				<script src="<?php echo base_url() ?>js/jquery.wmuSlider.js"></script> 
				<script>
					$('.example1').wmuSlider({
						pagination : false,
					});         
				</script> 	
				<!---->

			<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

		</body>
		</html>