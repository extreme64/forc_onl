
<script>
        $(document).ready(function () {

                $("#submit").click(function (event) {
                        event.stopPropagation();
                        event.preventDefault();

                        var formData = new FormData($(this).parents('form')[0]);

                        //formData.append("nov", "0");

                        $.ajax({
                                url: '<?php print $base_url ?>kontakt/prosledi_kontakt',
                                type: 'POST',
                                xhr: function () {
                                        var myXhr = $.ajaxSettings.xhr();
                                        return myXhr;
                                },
                                success: function (data) {
                                        //alert(data);
                                        if (data == "OK")
                                        {
                                                alert('Poslato sačuvane!');
                                                $("message").text(data);
                                        } else
                                        {
                                                $("message").text(data);
                                                alert(data);
                                        }

                                },
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false
                        });

                });

        });

</script>



<div class="content-wrapper">
        <div class="inner-container container">
                <div class="row">
                        <div class="section-header col-md-12">
                                <h2><?php print $title ?></h2>
                                <span>    </span>
                        </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="contact-form">
                        <div class="box-content col-md-12">
                                <div class="row">
                                        <div class="col-md-7">
                                                <p>Any questions? Reply will be send as soon as possible!</p>
                                                <h3 class="contact-title">***</h3>
                                                <div class="contact-form-inner">
                                                        <?php
                                                        ?>
                                                        <?php print form_open('', array('method' => "post", 'name' => "contactform", 'id' => "contactform")); ?>
                                                        <!--<form method="post" action="#" name="contactform" id="contactform">-->
                                                        <p>
                                                                <label for="name">Name </label>
                                                                <?php print form_input(array('name' => "name", 'type' => "text", 'id' => "name", 'placeholder' => "Name here")); ?>
                                                                                                                                <!--<input name="name" type="text" id="name">-->
                                                        </p>
                                                        <p>
                                                                <label for="email">E-Mail</label>
                                                                <?php print form_input(array('name' => "email", 'type' => "text", 'id' => "email", 'placeholder' => "adress@mail.com")); ?>
                                                                <!--<input name="email" type="text" id="email"> -->
                                                        </p>
                                                        <p>
                                                                <label for="phone">Phone </label>
                                                                <?php print form_input(array('name' => "phone", 'type' => "text", 'id' => "phone", 'placeholder' => "+123 44 555 66 77")); ?>
                                                                <!--<input name="phone" type="text" id="phone">  -->
                                                        </p>
                                                        <p>
                                                                <label for="comments">Text </label>
                                                                <?php print form_textarea(array('name' => "comments", 'id' => "comments", 'placeholder' => "Short message")); ?>
                                                                <!--<textarea name="comments" id="comments"></textarea>    -->
                                                        </p>

                                                        <?php print form_submit(array('type' => "submit", 'name' => "comments", 'id' => "submit", 'class' => "mainBtn", 'value' => "SEND")); ?>
                                                                    <!--<input type="submit" class="mainBtn" id="submit" value="POŠALJi" />-->
                                                        <?php //print form_close(); ?>
                                                        <!--</form>-->


                                                </div> <!-- /.contact-form-inner -->
                                                <div id="message"></div>

                                        </div> <!-- /.col-md-7 -->

                                        <div class="col-md-5">
                                          <!--<style>
                                               #map-canvas {
                                                float: left;
                                                width: 36%;
                                                height: 400px;
                                                margin: 0px;
                                                padding: 5px
                                              }
                                              #panel {
                                                top: 5px; margin-left: 0px; z-index: 5;
                                                background-color: #fff; padding: 5px;
                                                border: 1px solid #999;
                                                width: 36% !important;
                                                height: 100px;
                                              }
                                            </style>

                                            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
                                            <script>
                                                    var directionsDisplay;
                                                    var directionsService = new google.maps.DirectionsService();
                                                    var map;

                                                    function initialize() {
                                                      directionsDisplay = new google.maps.DirectionsRenderer();
                                                      var belgrade = new google.maps.LatLng(44.7686982,20.4380978);
                                                      var mapOptions = {
                                                        zoom:15,
                                                        center: belgrade
                                                      };
                                                      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                                                      directionsDisplay.setMap(map);
                                                    }

                                                    function calcRoute() {
                                                      var start = document.getElementById('start').value;
                                                      var end = "Košutnjak, Belgrade"; //document.getElementById('end').value;
                                                      var request = {
                                                          origin:start,
                                                          destination:end,
                                                          travelMode: google.maps.TravelMode.WALKING
                                                      };
                                                      directionsService.route(request, function(response, status) {
                                                        if (status == google.maps.DirectionsStatus.OK) {
                                                          directionsDisplay.setDirections(response);
                                                        }
                                                      });
                                                    }

                                                    google.maps.event.addDomListener(window, 'load', initialize);

                                            </script>



                                        <script>

                                        (function($){
                                          $('.trigger').click(function(){
                                            $('#ajaxloader1, .outer, .inner, .barlittle, .pointcircle, .bar, #loadpulse div, #shadowloader span, .loadingtext span').toggleClass('stop');
                                          });
                                        })(jQuery);


                                        </script>

                                          <div class="container">
                                              <div class="row">
                                                <article class="span12">
                                                  <h3>Lokacija</h3>
                                                </article>
                                                <div class="" style="height: 400px;">

                                                    <div id="panel" class="span10">
                                                    <b>Nalazite se: </b>
                                                    <select id="start" onchange="calcRoute();">
                                                        <option value="belgrade, rs">Lokacija ? </option>
                                                        <option value="kneza milosa, belgrade, rs">Kneza Miloza ul. </option>
                                                        <option value="brankova, belgrade, rs">Brannkova ul</option>
                                                        <option value="airport nikola tesla, belgrade, rs">A.P. Nikola Tesla</option>
                                                        <option value="subotica, rs">Sub</option>
                                                        <option value="novi sad, rs">Novi sad</option>

                                                    </select>
                                                        <br />do #KOŠUTNJAK BIKE PARK-a

                                                    </div>

                                                    <div id="map-canvas">
                                                    </div>
                                                </div>


                                              </div>
                                            </div>



                                                <!--<div class="googlemap-wrapper">
                                                    <div id="map_canvas" class="map-canvas"></div>
                                                </div>

                                                -->
                                        </div> <!-- /.col-md-5 -->
                                </div> <!-- /.row -->
                        </div> <!-- /.box-content -->
                </div> <!-- /.contact-form -->
        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->


