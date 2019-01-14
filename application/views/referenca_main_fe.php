<script >




</script>


<div class="content-wrapper">
        <div class="inner-container container">
                <div class="row">
                        <div class="section-header col-md-12">
                                <h2><a href="<?php print $base_url ?>prikaz/reference/<?php print $referenca[0]['id_service'] ?>/"><i class="fa fa-chevron-left"></i></a>  <?php print $referenca[0]['name'] ?></h2>
                                <span><?php //print $tekst[0]['title']                                                                             ?></span>
                        </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="project-detail row">
                        <!--<div class="project-slider col-md-12">
                            <img src="<?php print $base_url ?>images/upload/<?php //print $tekst[0]['url']                                                                       ?>" alt="Slide 1">
                            <img src="<?php print $base_url ?>images/upload/<?php //print $tekst[0]['url']                                                                       ?>" alt="Slide 2">
                            <img src="<?php print $base_url ?>images/upload/<?php //print $tekst[0]['url']                                                                       ?>" alt="Slide 1">
                            <a href="#" class="slidesjs-previous slidesjs-navigation">&lt;</a>
                            <a href="#" class="slidesjs-next slidesjs-navigation">&gt;</a>
                        </div>--> <!-- /.project-slider -->
                        <div class="project-infos col-md-12">
                                <div class="box-content">

                                        <h2 class="project-title"> <?php print $referenca[0]['name'] ?></h2>

                                        <span class="project-subtitle"><?php $referenca[0]['name'] ?></span>


                                        <p>
                                                <?php print $referenca[0]['desc'] ?>
                                        </p>
                                        <p>
                                                <a href="http://<?php print $referenca[0]['url'] ?>"><?php print $referenca[0]['url'] ?></a>
                                        </p>
                                        <p>
                                                <img src="<?php print $base_url . "images/upload/" . $slika[0]['url'] ?>" alt="<?php print $slika[0]['title'] ?>" title="<?php print $slika[0]['title'] ?>" width="300"/>
                                        </p>

                                </div>
                                <div class="box-content2">

                                        <span style="width: 100% !important">
                                                <?php if (is_array($slike_galerije) > 0) : ?>
                                                                <?php foreach ($slike_galerije as $i) : ?>
                                                                        <img style="float: left; padding: 3px" src="<?php print $base_url . "images/upload/" . $i->url ?>" alt="<?php print $i->title ?>" title="<?php print $i->title ?>" width="100" height="100" />
                                                                <?php endforeach ?>
                                                        <?php endif ?>
                                        </span>
                                </div>

                                <div class="box-content2">
                                        <?php print $referenca[0]['video'] ?>
                                </div>
                                <div class="box-content2">
                                        <ul class="project-meta">
                                                <li><a href="http://www.forwardcreating.com/prikaz/usluge/<?php print $referenca[0]['id_service'] ?>/"><i class="fa fa-th-large"></i></a></li>
                                                <li><i class="fa fa-calendar-o"></i><?php print preKolikoCeoFormat($referenca[0]['time']) ?></li>
                                                <!-- <li><i class="fa fa-envelope-o"></i><a href="mailto:info@company.com"><?php //print $tekst[0]['autor']                                                                            ?></a></li> -->
                                        </ul>

                                </div>
                                <div class="box-content2">

                                        <!-- tagovi -->
                                        <div class="filter-categories" style="margin-top:2em">
                                                <ul class="project-filter" >
                                                        <li class="filter active" style="display: inline-block;"  data-filter="all"><span>tags</span></li>
                                                        <li class="filter active" style="display: inline-block;"  data-filter="all"><span>tags1</span></li>
                                                        <li class="filter active" style="display: inline-block;"  data-filter="all"><span>tags2</span></li>
                                                </ul>
                                        </div>


                                </div>

                        </div> <!-- /.project-infos -->
                </div> <!-- /.project-detail -->
        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->