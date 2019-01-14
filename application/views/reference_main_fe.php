<div class="content-wrapper">
        <div class="inner-container container">
                <div class="row">
                        <div class="section-header col-md-12">
                                <h2><a href="<?php print $base_url . 'prikaz/reference/' ?>">REFERENCE</a></h2>
                                <span>:: Izdvajamo projekte</span>
                                <div class="filter-categories" style="margin-top:2em">
                                        <ul class="project-filter" >

                                                <li class="filter <?php echo ($sid == 0) ? 'active' : ''; ?>" style="display: inline-block;"  data-filter="all">
                                                        <a href="<?php print $base_url . 'prikaz/reference/' ?>" >
                                                                <span><i class="fa fa-th"></i></span>
                                                        </a>
                                                </li>
                                                <?php foreach ($usluge as $i): ?>
                                                                <?php ($i->id_service == $sid) ? $active = 'active' : $active = ''; ?>
                                                                <li class="filter <?php echo $active ?>" style="display: inline-block;"  data-filter="all"> <!--       class="filter active"-->
                                                                        <a href="<?php print $base_url . 'prikaz/reference/' . $i->id_service . '' ?>" >
                                                                                <span><?php print $i->name ?></span>
                                                                        </a>
                                                                </li>
                                                        <?php endforeach ?>
                                        </ul>
                                </div>
                        </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="row">
                        <div class="blog-masonry masonry-true">

                                <?php
                                        foreach ($reference as $ref):
                                                ?>

                                                <div class="post-masonry col-md-4 col-sm-6">
                                                        <div class="blog-thumb">
                                                            <!--<img src="<?php //print $base_url                                      ?>images/upload/<?php //print $tekst->url                                      ?>" alt="">-->
                                                                <div class="overlay-b">
                                                                        <div class="overlay-inner">
                                                                                <a href="<?php print $base_url . 'prikaz/referenca/' . $ref->id_reference; ?>" class="fa fa-link"></a>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="blog-body">
                                                                <div class="box-content">
                                                                        <h3 class="post-title"><a href="<?php print $base_url . 'prikaz/referenca/' . $ref->id_reference; ?>"><?php print $ref->name; ?></a></h3>
                                                                        <span class="blog-meta">Pre <?php print preKolikoCeoFormat($ref->time, true); ?></span>


                                                                </div>
                                                        </div>
                                                </div> <!-- /.post-masonry -->

                                                <?php
                                        endforeach
                                ?>

                        </div> <!-- /.blog-masonry -->
                </div> <!-- /.row -->

                <?php
                        /* $sql = "SELECT * FROM student";
                          $rs_result = mysql_query($sql); //run the query
                          $total_records = mysql_num_rows($rs_result);  //count number of records
                          $total_pages = ceil($total_records / $num_rec_per_page);

                          echo "<a href='pagination.php?page=1'>".'|<'."</a> "; // Goto 1st page

                          for ($i=1; $i<=$total_pages; $i++) {
                          echo "<a href='pagination.php?page=".$i."'>".$i."</a> ";
                          };
                          echo "<a href='pagination.php?page=$total_pages'>".'>|'."</a> "; // Goto last page */
                ?>

                <div class="row">
                        <div class="col-md-12">
                                <div class="pagination text-center">
                                        <ul>
                                                <?php
                                                        for ($b = 1; $b <= $broj_stranica; $b++) :
                                                                ?>
                                                                <li><a href="<?php print $base_url . 'prikaz/reference/' . $sid . '/' . $b ?>"><?php print $b ?></a></li>
                                                                <!--<li><a href="javascript:void(0)" class="active">2</a></li>      -->
                                                        <?php endfor ?>
                                        </ul>
                                </div> <!-- /.pagination -->
                        </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->