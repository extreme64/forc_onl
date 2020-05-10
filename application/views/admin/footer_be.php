        <footer>
                <p> <a href="<?php echo $base_url ?>asas.pdf">dokumentacija</a> </p>
                <p> <a href="<?php echo $base_url ?>">Nazad u 'PUBLIC' deo sajta</a> </p>
        </footer>



        <!--<script src="<?php //print $base_url ?>js/vendor/jquery-1.11.0.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="<?php print $base_url ?>js/plugins.js"></script>
        <script src="<?php print $base_url ?>js/main.js"></script>


        <?php if(isset($gmaps_script) && $gmaps_script): ?>

        <!-- Google Map -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php print $base_url ?>js/vendor/jquery.gmap3.min.js"></script>

        <!-- Google Map Init-->
        <script type="text/javascript">
            jQuery(function($){
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
            });
        </script>
        <?php endif ?>


        <!-- Preloader -->
        <script type="text/javascript">
            //<![CDATA[
            $(window).load(function() { // makes sure the whole site is loaded
                $('.loader-item').fadeOut(); // will first fade out the loading animation
                    $('#pageloader').delay(250).fadeOut('slow'); // will fade out the white DIV that covers the website.
                $('body').delay(250).css({'overflow-y':'visible'});
            })
            //]]>
        </script>

    </body>
</html>
