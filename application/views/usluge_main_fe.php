<div class="content-wrapper">
        <div class="inner-container container">
                <div class="row">
                        <div class="section-header col-md-12">
                                <h2><?php print $title ?></h2>
                                <span>Usluga info</span>
                        </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="row">


                        <?php for ($i = 0; $i < count($usluge_top); $i++): ?>
                                        <?php $sideDel = ($i % 2 == 0 ? "service-left" : "service-right") ?>


                                        <div class="col-md-6 service-item <?php print $sideDel ?>" style="height: 300px !important">
                                                <div class="box-content" style="min-height: 260px">
                                                        <div class="service-icon">
                                                                <i class="fa fa-cubes"></i>
                                                        </div>
                                                        <div class="service-content">
                                                                <?php if ($usluge_top[$i]->has_child) : ?>
                                                                        <h4><a href="<?php print $base_url . 'prikaz/usluge/' . $usluge_top[$i]->id_service . '/' . $usluge_top[$i]->name ?>"><?php print $usluge_top[$i]->name ?></a></h4>
                                                                <?php else : ?>
                                                                        <h4><?php print $usluge_top[$i]->name ?></h4>
                                                                <?php endif ?>
                                                                <p>
                                                                        <?php print $usluge_top[$i]->desc ?>
                                                                </p>
                                                        </div>
                                                </div> <!-- /.box-content -->
                                        </div> <!-- /.service-item -->


                                <?php endfor ?>


                </div> <!-- /.row -->
        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->