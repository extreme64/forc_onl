<div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2>LOGOVANJE</h2>
                        <span>Prijava na sajt</span>
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-content">
                            <p>
                                Ako niste član, možete registrovati nalog ovde <a href="<?php print $base_url."registracija" ?>">registracija.<i class="plue"></i></a>
                            </p>
                            <div class="archive-box">
                                <h2 class="archive-heading"><i class="fa fa-users"></i></h2>
                                
                                <?php print form_open("logovanje", $form_login) ?>
                                <ul class="archive-list contact-form-inner" style="max-width: 50%">
                                    <li>
                                        <p><label><?php echo validation_errors(); ?></label></p>
                                    </li>
                                    <li>
                                        <p><label>Nalog:</label><?php print form_input($input_nalog) ?></p>
                                    </li>
                                    <li>
                                        <p><label>Šifra:</label><?php print form_password($input_sifra) ?></p>
                                    </li>
                                   <li>
                                        <p> <?php print form_submit($submit_login) ?></p>
                                    </li>
                                </ul>
                                <?php print form_close() ?>
                            </div> <!-- /.archive-box -->

                            
                        </div> <!-- /.box-content -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->