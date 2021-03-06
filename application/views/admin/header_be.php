<?php
        /* HELPER props >> prolaz_po_ulozi - poredi ulogu korisnika sa propusnicamam,
         * ako korisnik nije autorizovan zabraniti pristup
         */
        if (!prolaz_po_ulozi($this->session->userdata("uloga"), array(1, 2, 3), false))
                redirect($base_url . "err404", "refresh");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <head>
                <meta charset="utf-8">

                <title><?php print $title ?> - ADMIN - KOSUTNJAK BIKE PARK</title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width">

                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">
                <!--
                Artcore Template
                        http://www.templatemo.com/preview/templatemo_423_artcore
                -->
                <link rel="stylesheet" href="<?php print $base_url ?>css/bootstrap.css">

                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!--<link rel="stylesheet" href="<?php print $base_url ?>css/font-awesome.css">-->
                <link rel="stylesheet" href="<?php print $base_url ?>css/animate.css">
                <link rel="stylesheet" href="<?php print $base_url ?>css/templatemo-misc.css">
                <link rel="stylesheet" href="<?php print $base_url ?>css/templatemo-style.css">
                <script src="<?php print $base_url ?>js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>

                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                <!-- !!!!!!!!!!!!!!!! NEMA SVAKI SKIN css za notifikacije BUG  !!!!!!!!!!!!!!!!!!!!   1.12.2015. -->
                <link rel="stylesheet" href="<?php print $base_url ?>js/ckeditor/skins/notif.css">

<!-- <script src="<?php print $base_url ?>/js/vendor/ajaxupload-v1.2.js"></script>-->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->

        <!--<script src="<?php print $base_url ?>js/vendor/jquery-1.11.0.min.js"></script>-->


        </head>
        <body>
                <!--[if lt IE 7]>
                    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
                <![endif]-->


                <section id="pageloader">
                        <div class="loader-item fa fa-spin colored-border"></div>
                </section> <!-- /#pageloader -->

                <header class="site-header container-fluid">
                        <div class="top-header">
                                <div class="logo col-md-6 col-sm-6">
                                        <h1><a href="index.html"><em>CMS </em>Forward Creating</a></h1>
                                        <span>Optimal content management system</span>
                                </div> <!-- /.logo -->
                                <div class="social-top col-md-6 col-sm-6">
                                        <ul>
                                                <li><a href="#" class="fa fa-facebook"></a></li>
                                                <li><a href="#" class="fa fa-twitter"></a></li>
                                                <li><a href="#" class="fa fa-linkedin"></a></li>
                                                <li><a href="#" class="fa fa-google-plus"></a></li>
                                                <li><a href="#" class="fa fa-flickr"></a></li>
                                                <li><a href="#" class="fa fa-rss"></a></li>
                                        </ul>
                                </div> <!-- /.social-top -->
                        </div> <!-- /.top-header -->
                        <div class="main-header">
                                <div class="row">
                                        <div class="main-header-left col-md-3 col-sm-6 col-xs-8">
                                                <a id="search-icon" class="btn-left fa fa-search" href="#search-overlay"></a>
                                                <div id="search-overlay">
                                                        <a href="#search-overlay" class="close-search"><i class="fa fa-times-circle"></i></a>
                                                        <div class="search-form-holder">
                                                                <h2>Type keywords and hit enter</h2>
                                                                <form id="search-form" action="#">
                                                                        <input type="search" name="s" placeholder="" autocomplete="off" />
                                                                </form>
                                                        </div>
                                                </div><!-- #search-overlay -->
                                                <a href="#" class="btn-left arrow-left fa fa-angle-left"></a>
                                                <a href="#" class="btn-left arrow-right fa fa-angle-right"></a>
                                        </div> <!-- /.main-header-left -->
                                        <div class="menu-wrapper col-md-9 col-sm-6 col-xs-4">
                                                <a href="#" class="toggle-menu visible-sm visible-xs"><i class="fa fa-bars"></i></a>




                                                <ul class="sf-menu hidden-xs hidden-sm">
                                                        <?php foreach ($stavke_menija_rasporedjene as $stavka) : ?>

                                                                        <?php if ($stavka['deca'] !== null && count($stavka['deca']) > 0) : ?>
                                                                                <li><a href="<?php print $base_url . $stavka['url'] ?>" title="<?php print $stavka['desc'] ?>" ><?php print $stavka['name'] ?></a><!-- OSTALO-->
                                                                                        <ul>
                                                                                                <?php foreach ($stavka['deca'] as $podstavka) : ?>
                                                                                                        <li><a href="<?php print $base_url . $podstavka['url'] ?>" title="<?php print $podstavka['desc'] ?>"><?php print $podstavka['name'] ?></a></li>
                                                                                                <?php endforeach ?>
                                                                                        </ul>
                                                                                <?php else : ?>
                                                                                <li><a href="<?php print $base_url . $stavka['url'] ?>" title="<?php print $stavka['desc'] ?>"><?php print $stavka['name'] ?></a></li>
                                                                        <?php endif ?>
                                                                <?php endforeach ?>
                                                </ul>


                                        </div> <!-- /.menu-wrapper -->
                                </div> <!-- /.row -->
                        </div> <!-- /.main-header -->
                        <div id="responsive-menu">
                                <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="#">Projects</a>
                                                <ul>
                                                        <li><a href="projects-2.html">Two Columns</a></li>
                                                        <li><a href="projects-3.html">Three Columns</a></li>
                                                        <li><a href="project-details.html">Project Single</a></li>
                                                </ul>
                                        </li>
                                        <li><a href="#">Blog</a>
                                                <ul>
                                                        <li><a href="blog.html">Blog Masonry</a></li>
                                                        <li><a href="blog-single.html">Post Single</a></li>
                                                </ul>
                                        </li>
                                        <li><a href="#">Pages</a>
                                                <ul>
                                                        <li><a href="our-team.html">Our Team</a></li>
                                                        <li><a href="archives.html">Archives</a></li>
                                                        <li><a href="grids.html">Columns</a></li>
                                                        <li><a href="404.html">404 Page</a></li>
                                                </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                </ul>
                        </div>
                </header> <!-- /.site-header -->