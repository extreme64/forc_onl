
<div class="content-wrapper" style="background-color: #262626">
        <div class="inner-container container" >
                <h1 class="" style="color:  #2379BB ; padding: 1%">Pretraga <i>'<?php echo $upit ?>'</i></h1>
                <?php $do = (count($search_posts) > 0) ? true : false; ?>
                <?php if ($do): ?>
                                <div class="row">
                                        <div class="col-md-12" style="float: left">
                                                <h2 class="" style="color:  #2379BB ; padding: 3%">Blog</h2>

                                                <?php foreach ($search_posts as $item): ?>
                                                        <div class="box-content2 " style=";margin: 0.5%; width: 32.33%; float: left">
                                                                <a href="<?php echo $base_url ?>prikaz/tekst/<?php echo $item->id ?>" class="main-btn white">
                                                                        <h2><?php print character_limiter($item->name, 15, '...') ?></h2>
                                                                        <!-- za sada izbeci, mora zasebno desc polje koje nema u sebi html tagove ili ih stripovati-->
                                                                        <?php
                                                                        $str = $item->desc;
                                                                        $clear = strip_tags($str);
                                                                        ?>

                                                                        <p style="color:   #737373"><?php print (isset($item->desc)) ? character_limiter($clear, 65, '...') : ""  ?></p>
                                                                </a>


                                                        </div>
                                                <?php endforeach ?>
                                        </div>
                                </div>
                        <?php endif ?>

                <?php $do = (count($search_references) > 0) ? true : false; ?>
                <?php if ($do): ?>
                                <div class="row">
                                        <div class="col-md-12" style="float: left">
                                                <h2 class="" style="color:  #2379BB ; padding: 3%">Reference</h2>


                                                <?php foreach ($search_references as $item): ?>
                                                        <div class="box-content2 " style=";margin: 0.5%; width: 32.33%; float: left">
                                                                <a href="<?php echo $base_url ?>prikaz/referenca/<?php echo $item->id ?>" class="main-btn white"><h2><?php print character_limiter($item->name, 15, '...') ?></h2></a>
                                                                <p><?php print (isset($item->desc)) ? character_limiter($item->desc, 15, '...') : ""  ?></p>
                                                        </div> <!-- /.inner-content -->
                                                <?php endforeach ?>
                                        </div>
                                </div> <!-- /.row -->
                        <?php endif ?>

                <?php $do = (count($search_services) > 0) ? true : false; ?>
                <?php if ($do): ?>
                                <div class="row">
                                        <div class="col-md-12" style="float: left">
                                                <h2 class="" style="color:  #2379BB ; padding: 3%">Usluge</i></h2>

                                                <?php foreach ($search_services as $item): ?>
                                                        <div class="box-content2 " style=";margin: 0.5%; width: 32.33%; float: left">
                                                                <a href="<?php echo $base_url ?>prikaz/usluge/<?php echo $item->id ?>" class="main-btn white"><h2><?php print character_limiter($item->name, 15, '...') ?></h2></a>
                                                                <p><?php print (isset($item->desc)) ? character_limiter($item->desc, 15, '...') : ""  ?></p>
                                                        </div> <!-- /.inner-content -->
                                                <?php endforeach ?>
                                        </div>
                                </div> <!-- /.row -->
                        <?php endif ?>

                <?php $do = (count($search_pages) > 0) ? true : false; ?>
                <?php if ($do): ?>
                                <div class="row">
                                        <div class="col-md-12" style="float: left">
                                                <h2 class="" style="color:  #2379BB ; padding: 3%">Stranice</h2>

                                                <?php foreach ($search_pages as $item): ?>
                                                        <div class="box-content2 " style=";margin: 0.5%; width: 32.33%; float: left">
                                                                <a href="<?php echo $base_url ?><?php echo $item->url ?>" class="main-btn white"><h2><?php print character_limiter($item->name, 15, '...') ?></h2></a>
                                                                <p><?php print (isset($item->desc)) ? character_limiter($item->desc, 15, '...') : ""  ?></p>
                                                        </div> <!-- /.inner-content -->
                                                <?php endforeach ?>
                                        </div>
                                </div> <!-- /.row -->
                        <?php endif ?>

                <?php $do = (count($search_tags) > 0) ? true : false; ?>
                <?php if ($do): ?>
                                <div class="row">
                                        <div class="col-md-12" style="float: left">
                                                <h2 class="" style="color:  #2379BB ; padding: 3%">Tagovi'</i></h2>

                                                <?php foreach ($search_tags as $item): ?>
                                                        <div class="box-content2 " style=";margin: 0.5%; width: 32.33%; float: left">
                                                                <a href="<?php echo $base_url ?>prikaz/tekst/<?php echo $item->id ?>" class="main-btn white"><h2><?php print character_limiter($item->name, 15, '...') ?></h2></a>
                                                                <p><?php print (isset($item->desc)) ? character_limiter($item->desc, 15, '...') : ""  ?></p>

                                                        </div> <!-- /.inner-content -->
                                                <?php endforeach ?>
                                        </div>
                                </div> <!-- /.row -->
                        <?php endif ?>

        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->

