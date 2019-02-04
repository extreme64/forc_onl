<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <head>
                <meta charset="utf-8">
                <title><?php print $title ?> - FORWARD CREATING</title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width">
                <meta name="p:domain_verify" content="a08fe3bfd8f6473aa087ea139e364cf8" />


                <link href='https://fonts.googleapis.com/css?family=Exo+2|Raleway:400,500|Play&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

                <!--<link href='https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500|Ek+Mukta|Alegreya+Sans+SC|Exo+2|Raleway:400,500|Play&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
              <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">

                             Artcore Template
                                     http://www.templatemo.com/preview/templatemo_423_artcore
                -->
                <link rel="stylesheet" href="<?php print $base_url ?>css/bootstrap.css">

                  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
                <!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">-->

<!--<link rel="stylesheet" href="<?php print $base_url ?>css/font-awesome.css">-->
                <link rel="stylesheet" href="<?php print $base_url ?>css/animate.css">
                <link rel="stylesheet" href="<?php print $base_url ?>css/templatemo-misc.css">
                <link rel="stylesheet" href="<?php print $base_url ?>css/templatemo-style.css">
                <script src="<?php print $base_url ?>js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
                <script src="<?php print $base_url ?>js/vendor/jquery-1.11.0.min.js"></script>
        </head>


          <!-- Start Open Web Analytics Tracker -->
          <?php $ulogovan = $this->session->userdata('name'); ?>
          <?php if (!$ulogovan): ?>

            <script type="text/javascript">
            //<![CDATA[
            var owa_baseUrl = 'http://www.forwardcreating.com/owa/';
            var owa_cmds = owa_cmds || [];
            owa_cmds.push(['setSiteId', '900434bdfe9b1efa67e91afdc47e7e1e']);
            owa_cmds.push(['trackPageView']);
            owa_cmds.push(['trackClicks']);

            (function() {
            	var _owa = document.createElement('script'); _owa.type = 'text/javascript'; _owa.async = true;
            	owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl );
            	_owa.src = owa_baseUrl + 'modules/base/js/owa.tracker-combined-min.js';
            	var _owa_s = document.getElementsByTagName('script')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
            }());
            //]]>
            </script>
            <!-- End Open Web Analytics Code -->

          <?php endif ?>


        <body>
                <!--[if lt IE 7]>
                    <p class="chromeframe">Instalirajte no0viji pretrazivac</p>
                <![endif]-->


                <section id="pageloader">
                        <div class="loader-item fa fa-spin colored-border"></div>
                </section> <!-- /#pageloader -->

                <header class="site-header container-fluid">

                  <style>


                    .wrapper {
                        position: absolute;
                        top: 4px;
                        left: 4px;
                        right: 10px;
                        bottom: 10px;
                        background: #FFF;
                        border: none;
                    }

                    .badge {
                        height: 50px;
                        background: #2379bb;
                        width: 190px;
                        text-align: center;
                        font-size: 18px;
                        line-height: 50px;
                        font-family: sans-serif;
                        color: #FFF;
                        transform: rotate(-45deg);
                        position: relative;
                        top: -2px;
                        left: -70px;
                        box-shadow: inset 0px 0px 0px 4px rgba(193, 189, 189, 0.64);
                    }

                    .badge:after {
                    	position: absolute;
                    	content: '';
                    	display: block;
                    	height: 100px;
                    	width: 100px;
                    	background: #EDF1EE;
                    	top: -55px;
                    	left: 130px;
                     transform: rotate(-45deg);
                    	box-shadow: -115px -121px 0px 0px #EDF1EE;
                    }

                    .badge .left {
                    	position: absolute;
                    	content: '';
                    	display: block;
                    	top: 50px;
                    	left: 25px;
                    	height: 8px;
                    	width: 8px;
                    	background: linear-gradient(135deg, rgb(112, 155, 188) 50%,rgba(90, 146, 106, 0) 50.1%);
                    }
                    .badge .right {
                    	position: absolute;
                    	content: '';
                    	display: block;
                    	top: 52px;
                    	left: 157px;
                    	height: 8px;
                    	width: 8px;
                    	background: linear-gradient(135deg, rgb(112, 155, 188) 50%,rgba(90, 146, 106, 0) 50.1%);
                    	transform: rotate(90deg);
                    }


                  </style>
                  <div class="wrapper">
                  	<div class="badge">
                      	<i class="left"></i>
                      	<i class="right"></i>
                      	BETA
                  	</div>
                  </div>

                        <div class="top-header" >  <!--style="background-image: url(../../images/graph/fc2016_s.jpg)"-->
                                <div class="logo col-md-6 col-sm-6">
                                        <div style="">
                                                <img id="logo-img" style="display: inline" src="<?php print $base_url ?>images/graph/forwardcreatinglogo_png_360.png" alt="forward creating online" height="200"/>
                                        </div>
                                        <div >
                                                <h1><a href="index.html"><em>FORWARD </em> <em class="logo-theme-color-2"> CREATING</em></a></h1>
                                                <span class="hide-on-mob">Forward ideas. Create solutions. Crating fast forward path to new future.</span>
                                        </div>
                                </div> <!-- /.logo -->

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
                                                                        <?php //echo var_dump($stavka); ?>
                                                                        <?php if ($stavka['deca'] !== null && count($stavka['deca']) > 0) : ?>
                                                                                <li><a href="<?php @print $base_url . $stavka['url'] ?>" title="<?php @print $stavka['desc'] ?>" ><?php print $stavka['name'] ?></a><!-- OSTALO-->
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
                        <!-- //TODO: responsive menu-->
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
