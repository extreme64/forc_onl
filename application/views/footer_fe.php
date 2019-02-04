<footer>
        <div class="footer-add" >

            <div class="site-header container-fluid">
                        <div class="footer-add" >
                                <div class="col-md-6 col-sm-6">

                                </div> <!-- /.logo -->
                                <div class="social-top col-md-6 col-sm-6">
                                        <ul>
                                                <li><a href="#" class="fab fa-twitter"></a></li>
                                                <li><a href="#" class="fab fa-reddit"></a></li>
                                                <li><a href="#" class="fab fa-patreon"></a></li>
                                                <li><a href="#" class="fab fa-flickr"></a></li>
                                                <li><a href="#" class="fas fa-rss"></a></li>
                                        </ul>
                                </div> <!-- /.social-top -->
                        </div> <!-- /.top-header -->
                        <div class="footer-mod">
                                <div class="row">
                                        <div class="main-header-left col-md-3 col-sm-6 col-xs-8">

                                                <?php $ulogovan = $this->session->userdata('name'); ?>

                                                <?php if (!$ulogovan): ?>
                                                                <a href="<?php print $base_url ?>registracija" class="btn-left  fa fa-user-plus"        title="Registruj nalog"></a><!-- registracija dugme -->
                                                                <a href="<?php print $base_url ?>logovanje/" class="btn-left fa fa-toggle-off"  title="Uloguj se"></a><!-- logovanje dugme -->
                                                        <?php else: ?>
                                                                <!-- FIXME: link ka profilu ispraviti, ili realizovati profil-->
                                                                <a href="<?php print $base_url ?>nalog/korisnik/<?php print $this->session->userdata('id_user'); ?>" class="btn-left fa fa-user"  title="Moj profil"></a><!-- profil dugme -->
                                                                <a href="<?php print $base_url ?>logovanje/izlaz" class="btn-left fa fa-toggle-on" title="Izloguj se"></a><!-- logovanje dugme -->
                                                <?php endif ?>
                                                                  <a href="<?php echo $base_url ?>admin/pocetna/index">CMS</a>
                                        </div> <!-- /.main-header-left -->
                                </div> <!-- /.row -->
                        </div> <!-- /.main-header -->
                        <!-- //TODO: responsive menu-->

                </div> <!-- /.site-header -->
        </div>
</footer>


        <!--<script src="<?php //print $base_url  ?>js/vendor/jquery-1.11.0.min.js"></script>-->
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="<?php print $base_url ?>js/plugins.js"></script>
<script src="<?php print $base_url ?>js/main.js"></script>


<?php if (isset($gmaps_script) && $gmaps_script): ?>

                <!-- Google Map -->
                <!--<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                <script src="<?php print $base_url ?>js/vendor/jquery.gmap3.min.js"></script>-->

                <!-- Google Map Init-->
                <script type="text/javascript">
                        /* jQuery(function($){
                         $('#map_canvas').gmap3({
                         marker:{
                         address: '44.7650009,20.4378198'
                         },
                         map:{
                         options:{
                         zoom: 13,
                         scrollwheel: false,
                         streetViewControl : true
                         }
                         }
                         });
                         });*/
                </script>
        <?php endif ?>


<!-- Preloader -->
<script type="text/javascript">
        //<![CDATA[
        $(window).load(function () { // makes sure the whole site is loaded
                $('.loader-item').fadeOut(); // will first fade out the loading animation
                $('#pageloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
                $('body').delay(350).css({'overflow-y': 'visible'});
        })
        //]]>
</script>

</body>
</html>
