<script >

        $(document).ready(function () {

                $('#btn_komentar').click(function () {
                        if ($('[data-tid]').attr('data-tid') == '' || $('#ta_komentar').val() == '') {
                                alert('Niste popunili oba polja');
                                return false
                        } else {
                                forma_polja = {
                                        tid: $('[data-tid]').attr('data-tid'),
                                        tekst: $('#ta_komentar').val()
                                }

                                $.ajax({
                                        type: "POST",
                                        dataType: 'text json',
                                        url: "<?php echo $base_url ?>komentari_tekst/dodaj/",
                                        data: forma_polja,
                                        error: function (event, request, settings) {
                                                alert(request + " " + settings)
                                                var app = '<div class="col-md-6 service-item service-right" style="width:100%"><div class="box-content" style="max-width:550px"><div class="service-icon">'
                                                        + '<i class="fa fa-comment-o"></i></div> <div class="service-content"> <ul class="project-meta">'
                                                        + '<li><i class="fa fa-calendar-o"></i>       </li>'
                                                        + '<li><i class="fa fa-clock-o"></i>' + '<?php print date('d.m.Y H:i', time()); ?>' + '</li>'
                                                        + '<li><i class="fa fa-envelope-o"></i><a href="mailto:info@company.com">        </a></li>'
                                                        + '</ul><p>' + $('#ta_komentar').val() + '</p></div></div></div>'


                                                $('#komentari-box').append(app);
                                        },
                                        success: function (e) {

                                                var json = JSON.stringify(e);
                                                var obj = JSON.parse(json)

                                                alert(obj[0].feed);
                                                if (obj[0].feed == 'true' || obj[0].feed == '1') {

                                                        alert('KOMENTAR OK!')


                                                        var app = '<div class="col-md-6 service-item service-right" style="width:100%"><div class="box-content" style="max-width:550px"><div class="service-icon">'
                                                                + '<i class="fa fa-comment-o"></i></div> <div class="service-content"> <ul class="project-meta">'
                                                                + '<li><i class="fa fa-calendar-o"></i>     </li>'
                                                                + '<li><i class="fa fa-clock-o"></i>' + '<?php print date('d.m.Y H:i', time()); ?>' + '</li>'
                                                                + '<li><i class="fa fa-envelope-o"></i><a href="mailto:info@company.com">      </a></li>'
                                                                + '</ul><p>' + $('#ta_komentar').val() + '</p></div></div></div>'


                                                        $('#komentari-box').append(app);
                                                }
                                        }

                                });
                        }

                });

        })



</script>


<div class="content-wrapper">
        <div class="inner-container container">
                <div class="row">
                        <div class="section-header col-md-12">
                                <h2><?php print $tekst[0]['title'] ?></h2>
                                <span><?php //print $tekst[0]['title']       ?></span>
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

                                        <h2 class="project-title"><?php print $tekst[0]['title'] ?></h2>

                                        <span class="project-subtitle"><?php $tekst[0]['title'] ?></span>


                                        <p>
                                                <?php print $tekst[0]['text'] ?>

                                        </p>

                                        <ul class="project-meta">
                                                <li><i class="fa fa-folder-open"><a href="http://www.forwardcreating.com/prikaz/kategorija/<?php print $tekst[0]['id_kategorija'] ?>/"><?php print $tekst[0]['kategorija'] ?></a></i></li>
                                                <li><i class="fa fa-calendar-o"></i><?php print preKolikoCeoFormat($tekst[0]['time']) ?></li>
                                                <!-- <li><i class="fa fa-envelope-o"></i><a href="mailto:info@company.com"><?php //print $tekst[0]['autor']      ?></a></li> -->
                                        </ul>



                                        <!--<div class="filter-categories" style="margin-top:2em">
                                            <ul class="project-filter" >
                                        <?php //$tipovi_a = array("DH", "FR", "AM", "END", "XC"); ?>
                                        <?php //foreach($tipovi_a as $t): ?>
                                                <li class="filter active" style="display: inline-block;"  data-filter="all"><span><?php //print $t       ?></span></li>
                                        <?php //endforeach ?>
                                            </ul>
                                        </div>-->
                                        <div class="">
                                                <hr />
                                                KOMENTARI:
                                                <br /><br />
                                        </div>

                                        <div style="float: left;" id="komentari-box">

                                                <?php foreach ($komentari as $komentar): ?>
                                                                <div class="col-md-6 service-item service-right" style="width:100%">
                                                                        <div class="box-content" style="max-width:550px">
                                                                                <div class="service-icon">
                                                                                        <i class="fa fa-comment-o"></i>
                                                                                </div>
                                                                                <div class="service-content">
                                                                                        <ul class="project-meta">
                                                                                                <li><i class="fa fa-calendar-o"></i><?php print $komentar->autor ?></li>
                                                                                                <li><i class="fa fa-clock-o"></i><?php print date('d.m.Y H:i', $komentar->time); ?></li>
                                                                                                <li><i class="fa fa-envelope-o"></i><a href="<?php print $komentar->mail ?>">mail</a></li>
                                                                                        </ul>
                                                                                        <p><?php print $komentar->text ?></p>
                                                                                </div>
                                                                        </div> <!-- /.box-content -->
                                                                </div>
                                                        <?php endforeach ?>
                                        </div>

                                        <?php if ($this->session->userdata('id_user') != ''): ?>
                                                        <div class="col-md-6 service-item service-right" style="width:100%">

                                                                <div class="box-content" style="max-width:550px">
                                                                        <div class="service-content">
                                                                                <!-- komentar forma -->
                                                                                <textarea required="true" id="ta_komentar" style="width:100%; min-height: 10em"></textarea>
                                                                                <input data-tid='<?php echo $tid ?>' id="btn_komentar" type="button" value="Dodaj"/>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                <?php else : ?>
                                                        <div class="col-md-6 service-item service-right" style="width:100%">
                                                                Samo ulogovani mogu postaviti komentar <i class="fa fa-users"></i> <a href="http://localhost/forcreating/logovanje/" >Logovanje</a>
                                                                | <a href="http://localhost/forcreating/registracija" >Nemate nalog?</a>
                                                        </div>
                                        <?php endif ?>

                                </div> <!-- /.box-content -->
                        </div> <!-- /.project-infos -->
                </div> <!-- /.project-detail -->
        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->