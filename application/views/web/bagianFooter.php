	
	</div>
	<div class="gallery-line">
		<div class="container">
			<div class="row">
				<div class="col-md-9 hidden-sm hidden-xs">
					<p><?=$setting['0']['web_title']?></p>
				</div>
				<div class="col-md-3">
					<a href="<?=base_url()?>gallery" class="btn btn-default btn-lg btn-block">GALLERY</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-5 col-md-4 col-sm-6">
					<div class="logo-area">
	    				<div class="logo">
	    					<img class="logo" src="<?php echo base_url(); ?>com/web/images/logo.png" width="80px" />
	    				</div>
	    				<div class="title">
	    					<p>DINAS PEMBERDAYAAN<br/>PEREMPUAN DAN PERLINDUNGAN ANAK <br/> <span>KABUPATEN MUARASAMU</span></p>
	    				</div>
	    			</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="contact">
						<ul>
							<li class="addresses"><?php echo $setting[0]['web_alamat']; ?></li>
							<li class="phone"><?php echo $setting[0]['web_telfone']; ?></li>
							<li class="email"><?php echo $setting[0]['web_email']; ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="copyright">
		<p><?=date('Y');?> <?php echo $setting[0]['footer']; ?>, Mp - Codekece.com
		</p>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url(); ?>com/web/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>com/web/js/componen.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>com/web/plugin/slick/slick.min.js"></script>
	<script src="<?php echo base_url(); ?>com/web/js/main.js"></script>
	<script src="<?php echo base_url(); ?>com/web/plugin/responsivevideogallery/js/jquery.fancybox.min.js"></script>
	<script src="<?php echo base_url(); ?>com/web/plugin/responsivevideogallery/js/global.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.slick-agenda').slick({
				autoplay: true,
				autoplaySpeed: 2000,
				slidesToShow: 1,
				adaptiveHeight: true,
				arrows : false
			});
			$("a#single_image").fancybox();
		});
	</script>
  </body>
</html>
