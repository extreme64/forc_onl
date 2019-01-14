<div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2>STAZE</h2>
                        <span>KOSUTNJAK Bike Park / Cele staze i segmenti.</span>
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="projects-holder-3">
                    <div class="filter-categories">
                        <ul class="project-filter">
                            <?php $tipovi_a = array("DH", "FR", "AM", "END", "XC"); ?>
                            <?php foreach($tipovi_a as $t): ?>
                            <!--<li class="filter" data-filter="all"><span><?php //print $t ?></span></li>-->
                            <?php endforeach ?>
                            
                        </ul>
                    </div>
                    <div class="projects-holder">
                        <div class="row">
                            
                            
                            <?php $i=1; foreach($staze as $s): ?>
                            
                            <div class="col-md-4 project-item mix design">
                                <div class="project-thumb">
                                    <img title="<?php print $s->image_title ?>" src="<?php print $base_url ?>images/upload/<?php print $s->url ?>" alt="<?php print $s->alt ?>">
                                    <div class="overlay-b">
                                        <div class="overlay-inner">
                                            <a href="<?php //print $base_url ?>images/projects/project_<?php //print $i ?>.jpg" 
                                               class="fancybox fa fa-expand" title="<?php //print $staza[2] ?>"></a>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="box-content project-detail" style="min-height: 10em">
                                    <h2><a href="<?php print $base_url ?>prikaz/staza/<?php print $s->id_staza ?>">
                                            <?php print $s->title ?></a></h2>
                                    <p><?php print $s->type. " | Dužina: ".$s->lenght ?>m</p>
                                </div>
                            </div> <!-- /.project-item -->
                            
                            <?php $i++; endforeach ?>
                            
                        </div> <!-- /.row -->
                        <div class="load-more">
                            <!--<a href="javascript:void(0)" class="load-more">Učitaj još staza</a>-->
                        </div>
                    </div> <!-- /.projects-holder -->
                </div> <!-- /.projects-holder-2 -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->