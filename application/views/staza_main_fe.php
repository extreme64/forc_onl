

        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2><?php print $staza[0]['title'] ?></h2>
                        <span><?php print $staza[0]['title'] ?></span>
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="project-detail row">
                    <div class="project-slider col-md-12">
                        <img src="<?php print $base_url ?>images/upload/<?php print $staza[0]['url'] ?>" alt="Slide 1">
                        <img src="<?php print $base_url ?>images/upload/<?php print $staza[0]['url'] ?>" alt="Slide 2">
                        <img src="<?php print $base_url ?>images/upload/<?php print $staza[0]['url'] ?>" alt="Slide 3">
                        <!--<a href="#" class="slidesjs-previous slidesjs-navigation">&lt;</a> 
                        <a href="#" class="slidesjs-next slidesjs-navigation">&gt;</a>-->
                    </div> <!-- /.project-slider -->
                    <div class="project-infos col-md-12">
                        <div class="box-content">
                           
                            <h2 class="project-title"><?php print $staza[0]['title'] ?></h2>
                            
                            <span class="project-subtitle"><?php print $staza[0]['title'] ?></span>
                            
                            
                            <p>
                            <?php print $staza[0]['text'] ?>
                            
                            </p>
                            
                            <ul class="project-meta">
                                <li><i class="fa fa-folder-open"></i><?php print $staza[0]['type'] ?></li>
                                <li><i class="fa fa-calendar-o"></i><?php print $staza[0]['lenght'] ?>m</li>
                                <!--<li><i class="fa fa-envelope-o"></i><a href="mailto:info@company.com"><?php //print $staza[2] ?></a></li>-->
                            </ul>
                          
               
                              
                            <div class="filter-categories" style="margin-top:2em">
                                <ul class="project-filter" >
                                    <?php $tipovi_a = array("DH", "FR", "ED"); ?>
                                    <?php //foreach($tipovi_a as $t): ?>
                                    <li class="filter active" style="display: inline-block;"  data-filter="all"><span><?php print  $tipovi_a[$staza[0]['type']-1] ?></span></li>
                                    <?php //endforeach ?>
                                </ul>
                            </div>
                            <div class="">
                            <hr />
                            <!--KOMENTARI:-->
                            <br /><br />
                            </div>
                            
                            <!--
                            <div style="float: left;" >
                            <?php //foreach($komentari as $komentar): ?>
                            <div class="col-md-6 service-item service-right" style="width:100%">
                                <div class="box-content" style="max-width:550px">
                                    <div class="service-icon">
                                        <i class="li_bulb"></i>
                                    </div>
                                    <div class="service-content">
                                        <ul class="project-meta"> 
                                            <li><i class="fa fa-calendar-o"></i><?php //print $komentar[3] ?></li> 
                                            <li><i class="fa fa-envelope-o"></i><a href="mailto:info@company.com"><?php //print $komentar[2] ?></a></li>
                                        </ul>
                                        <p><?php //print $komentar[4] ?></p>
                                    </div>
                                </div> <!-- /.box-content -->
                            </div>
                            <?php //endforeach ?>
                            </div> 
                            <!--
                            <div class="col-md-6 service-item service-right" style="width:100%">
                                 <div class="box-content" style="max-width:550px">
                                        <div class="service-content">
                                             komentar forma 
                                            <textarea style="width:100%; min-height: 10em"></textarea>
                                            <input type="submit" />
                                        </div>
                                 </div>
                            </div>
                            -->
                            
                        </div> <!-- /.box-content -->
                    </div> <!-- /.project-infos -->
                </div> <!-- /.project-detail -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->