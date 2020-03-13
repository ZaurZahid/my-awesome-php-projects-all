

  
    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding">
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-3">
                            <div class="single-widget-home mb-5 mb-lg-0">
                                <h3 class="mb-4">Hakkinda</h3>
                                <p><?=setting('footer_about')?></p>
                            </div>
                        </div>
                        <div class="col-xl-5 offset-xl-1 col-lg-6">
                            <div class="single-widget-home mb-5 mb-lg-0">
                                <h3 class="mb-4">newsletter</h3>
                                <p class="mb-4">You can trust us. we only send promo offers, not a single.</p>  
                                <form action="#">
                                    <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" required>
                                    <button type="submit" class="template-btn">subscribe now</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-1 col-lg-3">
                            <div class="single-widge-home">
                                <h1>Sosial Media</h1>

                                <?php foreach(menu(7) as $key=>$menu):?>  
                                            <a href="<?=$menu['url']?>"><?=htmlspecialchars_decode($menu['title'])?></a>    <br><br>
                               <?php endforeach ?>
                            
                            </div><br>
                           <!--  <p>Bunu instagram,youtube falan ucunde ede bilerik.</p> -->
                        </div>
                    </div>
                </div>
            </div>
             
        </footer>
        <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="<?=public_url('js/vendor/jquery-2.2.4.min.js')?>"></script>
	<script src="<?=public_url('js/vendor/bootstrap-4.1.3.min.js')?>"></script>
    <script src="<?=public_url('js/vendor/wow.min.js')?>"></script>
    <script src="<?=public_url('js/vendor/owl-carousel.min.js')?>"></script>
    <script src="<?=public_url('js/vendor/jquery.nice-select.min.js')?>"></script>
    <script src="<?=public_url('js/vendor/ion.rangeSlider.js')?>"></script>
    <script src="<?=public_url('js/main.js')?>"></script>
</body>
</html>
