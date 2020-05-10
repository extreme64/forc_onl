<ul class="sf-menu hidden-xs hidden-sm">

                            <?php $menu_a = array(
                                array(0, "POCETNA", "", ""),
                                array(1, "USLUGE", "prikaz/usluge/", "",),
                                array(2, "NOVOSTI", "prikaz/kategorija/",  ""),
                                array(3, "OSTALO", "", "",),
                                    array(4, "Q & A", "strana/qa", "",),
                                    array(5, "TIM", "strana/tim", "",),
                                    array(6, "ARHIVA", "strana/arhiva", "",),
                                array(7, "KONTAKT", "kontakt/",     "")
                            ); ?>



                            <li class="active"><a href="<?php print $base_url.$menu_a[0][2] ?>"><?php print $menu_a[0][1] ?></a></li><!-- HOME -->

                            <li><a href="<?php print $base_url.$menu_a[1][2] ?>"><?php print $menu_a[1][1] ?></a></li><!-- USLUGE -->

                            <li><a href="<?php print $base_url.$menu_a[2][2] ?>"><?php print $menu_a[2][1] ?></a><!-- NOVOSTI -->

                            </li>




                            <li><a href="<?php print $base_url.$menu_a[3][2] ?>"><?php print $menu_a[3][1] ?></a><!-- OSTALO-->
                                <ul>
                                    <li><a href="<?php print $base_url.$menu_a[4][2] ?>"><?php print $menu_a[4][1] ?></a></li>
                                    <li><a href="<?php print $base_url.$menu_a[5][2] ?>"><?php print $menu_a[5][1] ?></a></li>
                                    <li><a href="<?php print $base_url.$menu_a[6][2] ?>"><?php print $menu_a[6][1] ?></a></li>
                                </ul>
                            </li>


                            <li><a href="<?php print $base_url.$menu_a[7][2] ?>"><?php print $menu_a[7][1] ?></a></li><!-- KONTAKT -->





                        </ul>