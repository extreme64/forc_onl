
        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2>REGISTRACIJA</h2>
                        <span>Napravite nalog na nasem sajtu</span>
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="project-detail row">
                    <!--<div class="project-slider col-md-12">
                        <img src="<?php print $base_url ?>images/upload/<?php print $tekst[0]['url'] ?>" alt="Slide 1">
                        <img src="<?php print $base_url ?>images/upload/<?php print $tekst[0]['url'] ?>" alt="Slide 2">
                        <img src="<?php print $base_url ?>images/upload/<?php print $tekst[0]['url'] ?>" alt="Slide 1">
                        <a href="#" class="slidesjs-previous slidesjs-navigation">&lt;</a>
                        <a href="#" class="slidesjs-next slidesjs-navigation">&gt;</a>
                    </div>--> <!-- /.project-slider -->
                    <div class="project-infos col-md-12">
                        <div class="box-content">

                            <h2 class="project-title"><?php  ?></h2>

                            <span class="project-subtitle"><?php  ?></span>


                            <p>

                              <?php if(true): ?>

                                <?php echo $mejlslanjestatus; ?>
                                
                                <h3>Popunite polja</h3>
                                <h4>Sva polja obavezna, nakon slanja zahteva stici ce vam menjl za potvrdu</h4>

                                <?php
                                $fattr = array('class' => '');
                                echo form_open($base_url.'registracija/registruj', $fattr); ?>
                                <div class="form-group">
                                  <?php echo form_input(array('name'=>'nalog', 'id'=> 'nalog', 'placeholder'=>'Ime naloga', 'class'=>'', 'value' => set_value('nalog'))); ?>
                                  <?php echo form_error('nalog');?>
                                </div>
                                <div class="form-group">
                                  <?php echo form_input(array('type'=>'password','name'=>'lozinka', 'id'=> 'lozinka', 'placeholder'=>'Lozinka', 'class'=>'', 'value'=> set_value('lozinka'))); ?>
                                  <?php echo form_error('lozinka');?>
                                </div>
                                <div class="form-group">
                                  <?php echo form_input(array('name'=>'mejl', 'id'=> 'mejl', 'placeholder'=>'Mejl', 'class'=>'', 'value'=> set_value('mejl'))); ?>
                                  <?php echo form_error('mejl');?>
                                </div>
                                <?php echo form_submit(array('value'=>'Prijavi se', 'class'=>'btn btn-lg btn-primary btn-block')); ?>

                                <?php echo validation_errors('<div class="error">', '</div>'); ?>

                                <?php echo form_close(); ?>


                                <?php endif ?>

                            </p>



                        </div> <!-- /.box-content -->
                    </div> <!-- /.project-infos -->
                </div> <!-- /.project-detail -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->




