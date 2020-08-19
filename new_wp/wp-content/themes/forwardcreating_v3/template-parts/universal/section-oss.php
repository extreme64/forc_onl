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
              <img src="<?php print get_template_directory_uri() . "/imgs" . "/Blender_logo_3d_2d_modelind.jpg" ?>" alt="Blender logo 3d 2d modelind">
            </div>
            <div class="tools-img-wrap">
             
              <img src="<?php print get_template_directory_uri() . "/imgs" . "/godot_game_engine.jpg" ?>" alt="godot game engine">
            </div>
            <div class="tools-img-wrap">
              
              <img src="<?php print get_template_directory_uri() . "/imgs" . "/duckduckgo_search_engine.jpg" ?>" alt="duckduckgo search engine">
            </div>
            <div class="tools-img-wrap">
             
              <img src="<?php print get_template_directory_uri() . "/imgs" . "/unix-logo.jpg" ?>" alt="/unix logo">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tools-img-wrap">
             
              <img src="<?php print get_template_directory_uri() . "/imgs" . "/gimp_photo_editor.jpg" ?>" alt="gimp photo editor">
            </div>
            <div class="tools-img-wrap">
              
              <img src="<?php print get_template_directory_uri() . "/imgs" . "/firefox_browser.jpg" ?>" alt="firefox browser">
            </div>
            <div class="tools-img-wrap">
             
              <img src="<?php print get_template_directory_uri() . "/imgs" . "/gnu_solfege_.jpg" ?>" alt="gnu solfege">
            </div>
            <div class="tools-img-wrap">
            
              <img src="<?php print get_template_directory_uri() . "/imgs" . "/ardour_audio_producton.jpg" ?>" alt="ardour audio producton">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4>
              <!-- TODO: check where this should lead? -->
              <a href="<?php print get_site_url() ?>/open-source-tools/">Why Open Source Tools?</a>
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
                <img src="<?php print get_template_directory_uri() . "/imgs" . "/Blender_logo_3d_2d_modelind.jpg" ?>" alt="Blender logo 3d 2d modelind">
            </div>
            <div class="tools-img-wrap">
                
                <img src="<?php print get_template_directory_uri() . "/imgs" . "/godot_game_engine.jpg" ?>" alt="godot game engine">
            </div>
            <div class="tools-img-wrap">
                
                <img src="<?php print get_template_directory_uri() . "/imgs" . "/duckduckgo_search_engine.jpg" ?>" alt="duckduckgo search engine">
            </div>
            <div class="tools-img-wrap">
               
                <img src="<?php print get_template_directory_uri() . "/imgs" . "/unix-logo.jpg" ?>" alt="/unix logo">
            </div>
            <div class="tools-img-wrap">
               
                <img src="<?php print get_template_directory_uri() . "/imgs" . "/gimp_photo_editor.jpg" ?>" alt="gimp photo editor">
            </div>
            <div class="tools-img-wrap">
               
                <img src="<?php print get_template_directory_uri() . "/imgs" . "/firefox_browser.jpg" ?>" alt="firefox browser">
            </div>
            <div class="tools-img-wrap">
                
                <img src="<?php print get_template_directory_uri() . "/imgs" . "/gnu_solfege_.jpg" ?>" alt="gnu solfege">
            </div>
            <div class="tools-img-wrap">
                <img src="<?php print get_template_directory_uri() . "/imgs" . "/ardour_audio_producton.jpg" ?>" alt="ardour audio producton">
               
            </div>
            
        </div>
      </div>
      <div class="row">
        <h4 class="margin-h-a">
           <!-- TODO: check where this should lead? -->
          <a href="<?php print get_site_url() ?>/open-source-tools/">Why Open Source?</a>
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
