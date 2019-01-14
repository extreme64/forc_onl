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
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
        <head>
                <meta charset="utf-8">

                <title><?php print $title ?> - ADMIN - Forward Creating</title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width">

                <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100"> -->
                <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900"> -->

                <!-- BUG old needs to be updated <link rel="stylesheet" href="<?php print $base_url ?>css/font-awesome.css">-->
                <!-- <link rel="stylesheet" href="<?php print $base_url ?>css/animate.css"> -->
                <!-- <script src="<?php print $base_url ?>js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script> -->

                

                <!-- BUG  NEMA SVAKI SKIN css za notifikacije 1.12.2015. -->
                <link rel="stylesheet" href="<?php print $base_url ?>js/ckeditor/skins/notif.css">

                <!-- <script src="<?php print $base_url ?>/js/vendor/ajaxupload-v1.2.js"></script>-->
                <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->


                <!-- NEW THEME STUFF -->
                <!-- 20.11.2018. -->
                <!-- Mobile Specific Metas -->
                <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
                <!-- Boostrap style -->
                <!-- <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.min.css"> -->
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" type="text/css" href="<?php print $base_url ?>css/one_cms_incs/bootstrap4-alpha3.min.css">
                <!-- FONTS-->
                <link rel="stylesheet" href="<?php print $base_url ?>css/one_cms_incs/icon">
                <!-- Theme style -->
                <link rel="stylesheet" type="text/css" href="<?php print $base_url ?>css/one_cms_incs/style.css">
                <!-- Calendar -->
                <link href="<?php print $base_url ?>css/one_cms_incs/fullcalendar.min.css" rel="stylesheet">
                <link href="<?php print $base_url ?>css/one_cms_incs/fullcalendar.print.min.css" rel="stylesheet" media="print">
                <!-- Responsive -->
                <link rel="stylesheet" type="text/css" href="<?php print $base_url ?>css/one_cms_incs/responsive.css">




        </head>
