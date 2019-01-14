        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2>CMS</h2>
                        <span>Panel za edit sadržaja</span>
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="row">
                    <style>

                        .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}


                    </style>
                    <div class="col-md-12" style="width: 100%; background-color: #fff">
                        <p>
                            Dodatni info admin panel |
                            <a target="_blank" href="<?php print $base_url."" ?>">Naslovna strana<i class="green"></i></a>
                        </p>

                        <div class="box-content box-zasebni-poc-admin" >
                            <?php print $sub_menu; ?>
                        </div>
                        <div class="box-content box-zasebni-poc-admin" >    

                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-flag-checkered"></i> LOG DUMP | <!--<a><span class="fa fa-bars"></span></a> | <a><span class="fa fa-plus"></span></a>--></h3>
                                <ul class="archive-list">
                                    <?php
                                    $action_date = new DateTime();

                                    foreach($arr_log as $entry):
                                        $action_date->setTimestamp($entry["date"]); ?>

                                    <li style="font-size: 9px"> <a href="<?php print base_url(); ?>nalog/korisnik/<?php print $entry["uid"] ?>" data.uid="<?php print $entry["uid"] ?>"><?php print $entry["user"] ?></a><span>
                                        <?php print $entry["action"] ."  @ " . $action_date->format('d.m.Y H:i:s'); ?></span> </li>

                                    <?php endforeach ?>
                                </ul>
                            </div> <!-- /.archive-box -->

                        </div> <!-- /.box-content -->



                        <div class="box-content box-zasebni-poc-admin" >
                            <!--
                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-file-code-o"></i> FILTERI | <a><span class="fa fa-bars"></span></a> | <a><span class="fa fa-plus"></span></a></h3>
                                <ul class="archive-list">
                                    <label for="ddl_korisnici_filter">Korisnici</label>
                                    <li>
                                        <select DISABLED id="ddl_korisnici_filter" >
                                            <option>Svi...</option>
                                            <option>Admin</option>
                                            <option>Nekoc</option>
                                            <option>Dalic</option>
                                        </select>
                                    </li>
                                    <label for="ddl_vreme_filter">Vremenski opseg</label>
                                    <li>
                                        <select DISABLED id="ddl_vreme_filter" >
                                            <option>Danas</option>
                                            <option>7 dana</option>
                                            <option>Mesec</option>
                                            <option>2015.</option>
                                            <option>2014.</option>
                                            <option>2013.</option>
                                            <option>2010-2012.</option>
                                            <option>2005-2009.</option>
                                            <option>Od nastanka</option>
                                        </select>
                                    </li>
                                    <label for="ddl_uloge_filter">Uloge</label>
                                    <li>
                                        <select DISABLED id="ddl_uloge_filter" >
                                            <option>Svi...</option>
                                            <optgroup label="Registrovani">
                                            <option>Administrator</option>
                                            <option>Urednik</option>
                                            <option>Saradnik</option>
                                            <option>Član</option>
                                            </optgroup>

                                            <optgroup label="Neregistrovani">
                                            <option>Gost</option>
                                            <option>Gost Annon</option>
                                            </optgroup>
                                        </select>
                                    </li>
                                </ul>
                            </div> <!-- /.archive-box -->



                        <!--</div> -->


                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->