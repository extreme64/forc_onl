 <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2>NALOG</h2>
                        <span>Pregled korisnika</span>
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-content">
                            <p>
                                <!-- Neki info opis korisnika.
                                <a href="<?php //print $base_url ?>">Neki link.<i class="green"></i></a>-->
                            </p>
                            <div class="archive-box">
                                <h2 class="archive-heading"><i class="btn-left fa fa-user"></i></h2>
                                <ul class="archive-list">
                                    <li>
                                        <h3><a href=""><?php print $user_info['name'] ?></a></h3>
                                    </li>
                                    <li>


                                        <p><?php print $user_info['mail'] ?></p>
                                        <?php if($this->session->userdata("id_user")==$user_info['id']): ?> // <i class="fa fa-hand-o-down "></i> samo za korisnika cije je ovo nalog
                                        <p>Registrovan pre <?php print  preKolikoCeoFormat($user_info['regtime'], false); //preKoliko($user_info['regtime'],  "nedelja") ?></p>

                                        <?php if($this->session->userdata("name")=="admin"): ?> // TODO: realizacja uloga, ispod <i class="fa fa-hand-o-down "></i>, samo za admina dostuno !

                                        <p><?php print formatDatum($user_info['lastlog']) ?></p>

                                        <p>Status <?php print ($user_info['status']==2) ? "<i class=\"fa fa-check \"></i>" : "<i class=\"fa fa-inbox \"></i>" ; ?></p>
                                        <?php endif ?>
                                        <?php endif ?>
                                        <p>Some p stuff here<a href="#">Some a tag</a></p>
                                    </li>

                                </ul>
                            </div> <!-- /.archive-box -->


                        </div> <!-- /.box-content -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->
