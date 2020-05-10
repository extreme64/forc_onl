

                                            <!--<div>obicna s </div> -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                




                <?php foreach( $arr_ids as $a ): ?>


                <div class="swiper-slide" >
                    <div class="overlay-s"></div>
                    <div class="slider-caption">
                        <div class="inner-content">

                            <h2><?php print $a->title ?></h2>

                            <p><?php print $a->title ?></p>
                            <a href="<?php echo $base_url ?>prikaz/tekst/<?php echo $a->post_id ?>" class="main-btn white">Detaljnije</a>



                        </div> <!-- /.inner-content -->
                    </div> <!-- /.slider-caption -->
                </div> <!-- /.swier-slide -->


                <?php endforeach ?>

               <!-- 
                <div class="swiper-slide" style="background-image: url(<?php print $base_url ?>/images/slide2.jpg);">
                    <div class="overlay-s"></div>
                    <div class="slider-caption">
                        <div class="inner-content">
                            <h2>Hotel and Residence Concept in Montenegro</h2>
                            <p>We come with new fresh and unique ideas.</p>
                            <a href="#" class="main-btn white">View Projects</a>
                        </div> <!-- /.inner-content -->
                    </div> <!-- /.slider-caption -->
                </div> <!-- /.swier-slide -->
<!--
                <div class="swiper-slide" style="background-image: url(<?php print $base_url ?>/images/slide3.jpg);">
                    <div class="overlay-s"></div>
                    <div class="slider-caption">
                        <div class="inner-content">
                            <h2>Natural 3d Architecture Design</h2>
                            <p>Natural concrete is a material which is calm and clean.</p>
                            <a href="#" class="main-btn white">View Projects</a>
                        </div> <!-- /.inner-content -->
                    </div> <!-- /.slider-caption -->
                </div> <!-- /.swier-slide -->

            </div> <!-- /.swiper-wrapper -->
        </div> <!-- /.swiper-container -->