<div class="content-wrapper">
        <div class="inner-container container">
                <div class="row">
                        <div class="section-header col-md-12">
                                <h2><?php print $title . " - " . $usluga_info[0]->name ?></h2>
                                <span><?php print $usluga_info[0]->desc ?>
                                        <?php if ($usluga_info[0]->id_parent == 0) : ?>

                                                        <p>
                                                                <a href="<?php print $base_url . 'prikaz/usluge/' ?>"><i class="fa fa-hand-o-left" aria-hidden="true"></i> USLUGE</a>
                                                        </p>
                                                <?php else : ?>
                                                        <p>
                                                                <a href="<?php print $base_url . 'prikaz/usluge/' . $usluga_info[0]->id_parent . '/' . $usluga_info[0]->name ?>"><i class="fa fa-hand-o-left" aria-hidden="true"></i> USLUGE</a>
                                                        </p>
                                        <?php endif ?>
                                </span>
                        </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="row">

                        <?php
                                for ($i = 0; $i < count($usluge_sub); $i++):
                                        ?>
                                        <?php $sideDel = ($i % 2 == 0 ? "service-left" : "service-right") ?>


                                        <div class="col-md-6 service-item <?php print $sideDel ?>" style="height: 300px !important">
                                                <div class="box-content" style="min-height: 260px">
                                                        <div class="service-icon">
                                                                <i class="fa fa-cubes"></i>
                                                        </div>
                                                        <div class="service-content">
                                                                <?php if ($usluge_sub[$i]->has_child && $i != 0) : ?>
                                                                        <h4><a href="<?php print $base_url . 'prikaz/usluge/' . $usluge_sub[$i]->id_service . '/' . $usluge_sub[$i]->name ?>"><?php print $usluge_sub[$i]->name ?></a></h4>
                                                                <?php else : ?>
                                                                        <h4><?php print $usluge_sub[$i]->name ?></h4>
                                                                <?php endif ?>
                                                                <?php if (!$usluge_sub[$i]->has_child) : ?>
                                                                        <p>
                                                                                <?php print $usluge_sub[$i]->desc ?>
                                                                        </p>
                                                                <?php else : ?>
                                                                        <p>
                                                                                <!--<a href="<?php // print $base_url . 'prikaz/usluge/'                 ?>"><i class="fa fa-hand-o-left" aria-hidden="true"></i> USLUGE</a>-->
                                                                        </p>
                                                                <?php endif ?>
                                                        </div>
                                                </div> <!-- /.box-content -->
                                        </div> <!-- /.service-item -->


                                <?php endfor ?>


                </div> <!-- /.row -->
        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->