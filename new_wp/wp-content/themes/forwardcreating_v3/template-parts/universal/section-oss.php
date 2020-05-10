<?php
/**
 * Template part for displaying page section in page templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */
 function ossTools_element($element_type=1) {
   switch ($element_type) {
     case 1: ?>
     <!-- HP version -->
      <section class="sec-tool container-fluid padding-top-a padding-bottom-a bg-color-5 box-shadow1">
        <div class="row">
          <div class="col-md-12">
            <h3>SOFTWARE</h3>
            <h4>The proliferation of future ideas requires better tools</h4>
            <h5>Open source / Public Domain / Free / Etical</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tools-img-wrap">
              <img src="https://4.bp.blogspot.com/-Io7nVVVudEw/WbDF_IV6GZI/AAAAAAAAE0w/gS7hKU4MQU80EmWb34MrTNfl_adQWYHxgCLcBGAs/s320/Blender_logo_no_text.svg.png" alt="">
            </div>
            <div class="tools-img-wrap">
              <img src="https://raw.githubusercontent.com/github/explore/5c564e0ba18e2808c3bb5389d3d61caf52fd7992/topics/godot/godot.png" alt="">
            </div>
            <div class="tools-img-wrap">
              <img src="https://laurellaceyval.files.wordpress.com/2016/02/duckduckgo_logo-svg.png" alt="">
            </div>
            <div class="tools-img-wrap">
              <img src="https://images.vexels.com/media/users/3/141382/isolated/lists/c7a747215c71c95b99cc87db1c211d04-unix-logo.png" alt="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tools-img-wrap">
              <img src="https://cdn.iconscout.com/icon/free/png-256/gimp-555552.png" alt="">
            </div>
            <div class="tools-img-wrap">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Firefox_Logo%2C_2017.svg/480px-Firefox_Logo%2C_2017.svg.png" alt="">
            </div>
            <div class="tools-img-wrap">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/GNU_Solfege_Logo.svg/220px-GNU_Solfege_Logo.svg.png" alt="">
            </div>
            <div class="tools-img-wrap">
              <img src="https://img.linuxfr.org/img/687474703a2f2f7069782e746f696c652d6c696272652e6f72672f75706c6f61642f6f726967696e616c2f313336333034313139342e706e67/1363041194.png" alt="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4>
              <a href="<?php print get_site_url() ?>/new_wp/open-source-tools/">Why Open Source Tools?</a>
              <ul class="oss-drop-info">
                <li>
                  CROWD-SOURCED: Low-cost, flexibility, freedom, security, and accountability – that are unsurpassed by proprietary solutions.
                </li>
                <li>
                  SUPPORTED BY A COMMUNITY: Constantly reviewing code, thousands of independent developers,
                  vast peer review process that ensures security and accountability.
                </li>
                <li>
                  STRONG VALUES: More often than not, OSS developers hold similar values. In all aspects of life,
                  they are advocates for more community participation, collaboration, and volunteerism.
                  They believe in working together to build free, high quality products that are accessible to
                  for-profit and nonprofit organizations alike.
                </li>
                <li>
                  PARADIGM SHIFT: Technologies and architectures sometimes grow stagnant, and open source projects
                  with fresh thinking can drive change. Because technologies are released as open source, the entire
                  ecosystem is able to move forward together, rather than just ‘near by’ domain and its users.
                </li>
              </ul>
              <i class="fas fa-caret-down ui-open-down" aria-hidden="true"></i>
            </h4>
          </div>
        </div>
      </section>

      <script type="text/javascript">
        jQuery().ready(function($){
          $(".sec-tool .oss-drop-info").hide()
          $(".sec-tool .ui-open-down").click(function(e){
            var toShow = $(this).prev(".oss-drop-info")
            var uiOpenDown = $(this)
            if($(toShow).css("display") === "block") {
              $(toShow).fadeOut(200)
              $(uiOpenDown).removeClass("fa-caret-up")
              $(uiOpenDown).addClass("fa-caret-down")
            }else{
              $(toShow).fadeIn(350)
              $(uiOpenDown).removeClass("fa-caret-down")
              $(uiOpenDown).addClass("fa-caret-up")
            }
          })
        })
      </script>
    <?php
    break;
    case 2 : ?>
    <!-- Slim inner pages version -->
    <section class="sec-tool oss-tool-inner container-fluid padding-top-a padding-bottom-a bg-color-5 box-shadow1">
      <div class="row">
        <div class="col-md-12">
          <h3>SOFTWARE</h3>
          <h4>Future ideas requires better tools: Open source / Public Domain / Free / Etical</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tools-img-wrap">
            <img src="https://4.bp.blogspot.com/-Io7nVVVudEw/WbDF_IV6GZI/AAAAAAAAE0w/gS7hKU4MQU80EmWb34MrTNfl_adQWYHxgCLcBGAs/s320/Blender_logo_no_text.svg.png" alt="">
          </div>
          <div class="tools-img-wrap">
            <img src="https://raw.githubusercontent.com/github/explore/5c564e0ba18e2808c3bb5389d3d61caf52fd7992/topics/godot/godot.png" alt="">
          </div>
          <div class="tools-img-wrap">
            <img src="https://laurellaceyval.files.wordpress.com/2016/02/duckduckgo_logo-svg.png" alt="">
          </div>
          <div class="tools-img-wrap">
            <img src="https://images.vexels.com/media/users/3/141382/isolated/lists/c7a747215c71c95b99cc87db1c211d04-unix-logo.png" alt="">
          </div>
          <div class="tools-img-wrap">
            <img src="https://cdn.iconscout.com/icon/free/png-256/gimp-555552.png" alt="">
          </div>
          <div class="tools-img-wrap">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Firefox_Logo%2C_2017.svg/480px-Firefox_Logo%2C_2017.svg.png" alt="">
          </div>
          <div class="tools-img-wrap">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/GNU_Solfege_Logo.svg/220px-GNU_Solfege_Logo.svg.png" alt="">
          </div>
          <div class="tools-img-wrap">
            <img src="https://img.linuxfr.org/img/687474703a2f2f7069782e746f696c652d6c696272652e6f72672f75706c6f61642f6f726967696e616c2f313336333034313139342e706e67/1363041194.png" alt="">
          </div>
        </div>
      </div>
      <div class="row">
        <h4 class="margin-h-a">
          <a href="<?php print get_site_url() ?>/new_wp/open-source-tools/">Why Open Source?</a>
        </h4>
      </div>
    </section>
    <?php
    break;
    case 3 : ?>
    <!-- HP version -->
     <section class="sec-tool container-fluid padding-top-a padding-bottom-a bg-color-5 box-shadow1">
       <div class="row">
         <div class="col-md-12">
           <h1>OSS DIGITAL TOOLS AND SOLUTIONS</h1>
           <h3 class="padding-top-0">The proliferation of future ideas requires better tools</h3>
           <h4>Open source / Public Domain / Accessible / Etical</h4>
         </div>
       </div>
     </section>
    <?php
    break;

    default:
    // print "No view to display!";
    break;
  }
}
?>
