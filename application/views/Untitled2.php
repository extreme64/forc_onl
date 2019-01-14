 <?php for($i=1; $i<=3; $i++): ?>


                <div class="swiper-slide" style="background-image: url(<?php print $base_url ?>/images/slide<?php print $i ?>.jpg);">
                    <div class="overlay-s"></div>
                    <div class="slider-caption">
                        <div class="inner-content">

                            <h2><?php print $slajder["kat1"][$i-1][3] ?></h2>

                            <p><?php print $slajder["kat1"][$i-1][5] ?></p>
                            <a href="#" class="main-btn white">View Projects</a>



                        </div> <!-- /.inner-content -->
                    </div> <!-- /.slider-caption -->
                </div> <!-- /.swier-slide -->


                <?php endfor ?>





                 <?php for($i=0; $i<6; $i++): ?>
                    <?php $sideDel = ($i%2==0? "service-left" : "service-right") ?>


                    <div class="col-md-6 service-item <?php print $sideDel ?>" >
                        <div class="box-content" style="min-height: 260px">
                            <div class="service-icon">
                                <i class="<?php print $usluge[$i][1] ?>"></i>
                            </div>
                            <div class="service-content">
                                <h4><?php print $usluge[$i][2] ?></h4>
                                <p><?php print $usluge[$i][3] ?> Credit goes to <a rel="nofollow" href="http://unsplash.com">Unsplash</a>
                                    for photos used in this template. You can use this layout for your personal or commercial websites.
                                </p>
                            </div>
                        </div> <!-- /.box-content -->
                    </div> <!-- /.service-item -->


                   <?php endfor ?> 