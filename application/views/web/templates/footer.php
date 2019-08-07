		<footer class="pt-5 pb-3">
          <div class="container position-relative">
            <div class="row justify-content-around">
              <div class="col-12 col-md-6">
        
                <div class="clearfix">
                  <h4 class="float-left text-light">Link Terkait</h4>
                  <div class="row">
                    <div class="float-right line-footer"></div>
                  </div>
                </div>
        
                <div class="row">
                  <ul class="col footer-link-terkait">
                    <li><a class="footer-link" href="#">Profile KPPBC</a></li>
                    <li><a class="footer-link" href="#">Struktur Organisasi</a></li>
                    <li><a class="footer-link" href="#">Visi Misi</a></li>
                  </ul>
                  <ul class="col footer-link-terkait">
                    <li><a class="footer-link" href="#">Wilayah Kerja</a></li>
                    <li><a class="footer-link" href="#">Target dan Realisasi</a></li>
                    <li><a class="footer-link" href="#">Impor &amp; Ekspor</a></li>
                  </ul>
                  <ul class="col footer-link-terkait">
                    <li><a class="footer-link" href="#">Beacukai</a></li>
                    <li><a class="footer-link" href="#">Peraturan</a></li>
                    <li><a class="footer-link" href="#">Layanan Informasi</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-md-5 text-center text-md-left mt-5 mt-md-0">
                <h1 class="footer-text-owner">
                  <span class="footer-text-owner-direktorat text-uppercase">Direktorat Jenderal Bea dan Cukai</span>
                  <span class="footer-text-owner-kantor text-uppercase">Kantor Wilayah Sulawesi Bagian Utara</span>
                  <span class="footer-text-owner-kppbc text-uppercase">Kantor Pengawasan dan Pelayanan Bea dan Cukai Tipe Madya Pabean C Luwuk</span>
                </h1>
        
                <div class="mt-4">
                  <span class="footer-findme">Find me : &nbsp;</span>
                  <a href="<?=$setting[0]['web_facebook']; ?>"><i class="footer-medsos fa fa-facebook-square"></i></a>
                  <a href="<?=$setting[0]['web_twitter']; ?>"><i class="footer-medsos fa fa-twitter-square"></i></a>
                  <a href="<?=$setting[0]['web_youtube']; ?>"><i class="footer-medsos fa fa-youtube-square"></i></a>
                </div>
              </div>
            </div>
          
          <hr class="footer-hr">
          <p class="text-center text-light">Copyright © <?=date('Y');?> <?=$setting[0]['footer']; ?>, Power by <a href="http://www.codekece.com" target="_blank">Codekece</a></p>
        
          <a href="#" id="scroll" class="d-none d-md-block" style="display: none;">
            <i class="footer-medsos fa fa-arrow-up"></i>
          </a>

		</footer>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
		<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
		<script src="<?=base_url();?>assets/js/main.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJJBYL9TG0SDs4eqWQ4R_GpwcxI9YMaVE&callback=initMap"></script>
    <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 9764035;
    (function() {
      var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
      lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    })();
    </script>
    <!-- End of LiveChat code -->
		
	</body>
</html>