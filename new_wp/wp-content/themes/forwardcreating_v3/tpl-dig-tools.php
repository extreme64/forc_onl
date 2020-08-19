<?php
/**
* Template Name: Dig. Tools
*
* @package ForwardCreating_v3
*/
namespace v3;
$theme = wp_get_theme();
$themeName =  $theme->get( 'TextDomain' );
try {
	// include get_theme_root() . '/' . $themeName . '/classes/ContributeView.class.php';
	// include get_theme_root() . '/' . $themeName . '/classes/MailListView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/OssToolsView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="main" class="site-main main-dig-tools nodes-bg">


      <?php
      /* OSS Tools */
      $ossToolsView = new OssToolsView(View::VIEW_TYPE_FULL_INFO);
      print $ossToolsView->render();
      ?>

      <style media="screen">
        .border-box-1 {
          width: 150px;
          height: 150px;
          display: inline-block;
          padding: 15px;
          text-align: center;
          font-size: 42px;
          color: #d7263d;
          background: #FFF;
          border: 4px dashed #d7263d70;
          border-radius: 12px;
          animation: 0.6s;
        }
        .border-box-1:hover {
          /* color: #d7263d;
          background: #FFF; */
          border: 4px solid #d7263d70;
          animation: 1.4s;
        }
        .tool-info.tools-img-wrap {
          width: 50%;
          margin: 50px auto;
          float: left;
          text-align: center;
        }
        .info-text {
          display: block;
          min-height: 250px;
          padding: 0px 25px;
          font-size: 20px;
          line-height: 26px;
        }
      </style>
      <section class="tools-listing container margin-top-a">
        <div class="row">
          <div class="col-md-12">
            <div class="tools-wrap">
              <div class="tool-info tools-img-wrap">
                <span class="border-box-1" aria-hidden="true">
                  <img src="<?php print get_template_directory_uri() . "/imgs" . "/gimp_photo_editor.jpg" ?>" alt="gimp photo editor">
                </span>
                <h4 class="margin-top-0">GIMP</h4>
                <h5>Raster Graphics Editor</h5>
                <h6>GNU Public License v3+</h6>
                <span class="info-text">
                  GIMP is a free and open-source raster graphics editor used for image retouching and editing, free-form drawing, converting
                  between different image formats, and more specialized tasks
                </span>
                <span>
                  <i class="fas fa-link"></i> |
                  <i class="fas fa-hand-holding"></i>
                  <i class="fas fa-hand-holding-heart"></i>
                  <i class="fas fa-hand-holding-usd"></i>
                </span>
              </div>
              <div class="tool-info tools-img-wrap">
                <span class="border-box-1" aria-hidden="true">
                  <img src="<?php print get_template_directory_uri() . "/imgs" . "/firefox_browser.jpg" ?>" alt="firefox browser">
                </span>
                <h4 class="margin-top-0">Firefox</h4>
                <h5>Web Browser</h5>
                <h6>MPL 2.0, Apache 2.0, Other</h6>
                <span class="info-text">
                  Mozilla Firefox, or simply Firefox, is a free and open-source web browser developed by the Mozilla Foundation and its subsidiary,
                  Mozilla Corporation. Firefox uses the Gecko layout engine to render web pages, which implements current and anticipated web standards.
                </span>
                <span>
                  <i class="fas fa-link"></i> |
                  <i class="fas fa-hand-holding"></i>
                  <i class="fas fa-hand-holding-heart"></i>
                  <i class="fas fa-hand-holding-usd"></i>
                </span>
              </div>
              <div class="tool-info tools-img-wrap">
                <span class="border-box-1" aria-hidden="true">
                  <img src="<?php print get_template_directory_uri() . "/imgs" . "/gnu_solfege_.jpg" ?>" alt="gnu solfege">
                </span>
                <h4 class="margin-top-0">GNU Solfege</h4>
                <h5>Ear and Rhythm Training</h5>
                <h6>GNU Public License v3</h6>
                <span class="info-text">
                  When you study music on high school, college, music conservatory, you usually have to do ear training. Some of the exercises,
                  like sight singing, is easy to do alone. But often you have to be at least two people, one making questions, the other answering.
                  You get really good results if you practise a little almost every day. GNU Solfege tries to help out with this. With Solfege you
                  can practise the more simple and mechanical exercises without the need to get others to help you.
                </span>
                <span>
                  <i class="fas fa-link"></i> |
                  <i class="fas fa-hand-holding"></i>
                  <i class="fas fa-hand-holding-heart"></i>
                  <i class="fas fa-hand-holding-usd"></i>
                </span>
              </div>
              <div class="tool-info tools-img-wrap">
                <span class="border-box-1" aria-hidden="true">
                  <img src="<?php print get_template_directory_uri() . "/imgs" . "/ardour_audio_producton.jpg" ?>" alt="ardour audio producton">
                </span>
                <h4 class="margin-top-0">Ardour</h4>
                <h5>Record, Edit, Mix and Produce Audio</h5>
                <h6>GNU Public License v2</h6>
                <span class="info-text">
                  Ardour is an open source, collaborative effort of a worldwide team including musicians, programmers, and professional
                  recording engineers. Development is transparent — anyone can watch our work as it happens. Like a good piece of vintage
                  hardware, you can open the box and look inside. Of course, you don't have to … but one day the fact that anybody can
                  will be useful.
                </span>
                <span>
                  <i class="fas fa-link"></i> |
                  <i class="fas fa-hand-holding"></i>
                  <i class="fas fa-hand-holding-heart"></i>
                  <i class="fas fa-hand-holding-usd"></i>
                </span>
              </div>
              <div class="tool-info tools-img-wrap">
                <span class="border-box-1" aria-hidden="true">
                 <img src="<?php print get_template_directory_uri() . "/imgs" . "/unix-logo.jpg" ?>" alt="/unix logo">
                </span>
                <h4 class="margin-top-0">Linux</h4>
                <h5>Operating Systems</h5>
                <h6>GNU Public License v2</h6>
                <span class="info-text">
                  Linux is a family of open source Unix-like operating systems based on the Linux kernel, an operating system kernel
                  first released in 1991, by Linus Torvalds. Linux is typically packaged in a Linux distribution. Many distributions
                  use the word Linux in their name, but the Free Software Foundation uses the name GNU/Linux to emphasize the importance
                  of GNU software. Popular Linux distributions include Debian, Fedora, and Ubuntu, Arch.
                </span>
                <span>
                  <i class="fas fa-link"></i> |
                  <i class="fas fa-hand-holding"></i>
                  <i class="fas fa-hand-holding-heart"></i>
                  <i class="fas fa-hand-holding-usd"></i>
                </span>
              </div>
              <div class="tool-info tools-img-wrap">
                <span class="border-box-1" aria-hidden="true">
                  <img src="<?php print get_template_directory_uri() . "/imgs" . "/duckduckgo_search_engine.jpg" ?>" alt="duckduckgo search engine">
                </span>
                <h4 class="margin-top-0">DuckDuckGo</h4>
                <h5>Internet Search Engine</h5>
                <h6>GNU Public License v2</h6>
                <span class="info-text">
                  DuckDuckGo is an internet search engine that emphasizes protecting searchers privacy and avoiding the filter
                  bubble of personalized search results. DuckDuckGo distinguishes itself from other search engines by not profiling
                  its users and by showing all users the same search results for a given search term
                </span>
                <span>
                  <i class="fas fa-link"></i> |
                  <i class="fas fa-hand-holding"></i>
                  <i class="fas fa-hand-holding-heart"></i>
                  <i class="fas fa-hand-holding-usd"></i>
                </span>
              </div>
              <div class="tool-info tools-img-wrap">
                <span class="border-box-1" aria-hidden="true">
                  <img src="<?php print get_template_directory_uri() . "/imgs" . "/godot_game_engine.jpg" ?>" alt="godot game engine">
                </span>
                <h4 class="margin-top-0">Godot</h4>
                <h5>Game Engine, 2D/3D Visualisation</h5>
                <h6>GNU Public License v2</h6>
                <span class="info-text">
                  Godot is a 2D and 3D, cross-platform, free and open-source game engine released under the MIT license. It was
                  initially developed for several companies in Latin America prior to its public release. The development environment
                  runs on multiple operating systems including Linux, macOS, and Windows. Godot can create games targeting the PC,
                  macOS, Linux, mobile and web platforms.
                </span>
                <span>
                  <i class="fas fa-link"></i> |
                  <i class="fas fa-hand-holding"></i>
                  <i class="fas fa-hand-holding-heart"></i>
                  <i class="fas fa-hand-holding-usd"></i>
                </span>
              </div>
              <div class="tool-info tools-img-wrap">
                <span class="border-box-1" aria-hidden="true">
                  <img src="<?php print get_template_directory_uri() . "/imgs" . "/Blender_logo_3d_2d_modelind.jpg" ?>" alt="Blender logo 3d 2d modelind">
                </span>
                <h4 class="margin-top-0">Blender</h4>
                <h5>3D modeling, animation, video editing</h5>
                <h6><i class="fas fa-clone"></i> GNU Public License v2</h6>
                <span class="info-text">
                  Blender is the free and open source 3D creation suite. It supports the entirety of the 3D pipeline—modeling,
                  rigging, animation, simulation, rendering, compositing and motion tracking, video editing and 2D animation pipeline.
                </span>
                <span>
                  <i class="fas fa-link"></i> |
                  <i class="fas fa-hand-holding"></i>
                  <i class="fas fa-hand-holding-heart"></i>
                  <i class="fas fa-hand-holding-usd"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="sec-main-focus-and-news container-fluid padding-top-0 padding-bottom-a1">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h2 class="margin-top-0">Why OSS Digital Tools?</h2>
            <h3 class="margin-top-0 margin-bot-0 color-0 text-bg-1">
              Here are a several reasons to support and switch to OSS digital solutions:
            </h3>

            <div class="row">
              <div class="col-md-6">
                <span class="i-h4-wrap margin-top-0a">
                  <i class="fas fa-user-friends" aria-hidden="true"></i>
                  <h5 class="margin-top-0">
                    CROWD-SOURCED: Low-cost, flexibility, freedom, security, and accountability – that are unsurpassed by proprietary solutions.
                  </h5>
                </span>
              </div>
              <div class="col-md-6">
                <span class="i-h4-wrap margin-top-0a">
                  <i class="fas fa-people-carry" aria-hidden="true"></i>
                  <h5 class="margin-top-0">
                    SUPPORTED BY A COMMUNITY: Constantly reviewing code, thousands of independent developers,
                    vast peer review process that ensures security and accountability.
                  </h5>
                </span>
              </div>
            <div class="row">
            </div>
              <div class="col-md-6">
                <span class="i-h4-wrap margin-top-0a">
                  <!-- <i class="far fa-handshake" aria-hidden="true"></i> -->
                  <i class="fas fa-ribbon" aria-hidden="true"></i>
                  <h5 class="margin-top-0">
                    STRONG VALUES: More often than not, OSS developers hold similar values. In all aspects of life,
                    they are advocates for more community participation, collaboration, and volunteerism.
                    They believe in working together to build free, high quality products that are accessible to
                    for-profit and nonprofit organizations alike.
                  </h5>
                </span>
              </div>
              <div class="col-md-6">
                <span class="i-h4-wrap margin-top-0a">
                  <i class="fas fa-map-signs" aria-hidden="true"></i>
                  <h5 class="margin-top-0">
                    PARADIGM SHIFT: Technologies and architectures sometimes grow stagnant, and open source projects
                    with fresh thinking can drive change. Because technologies are released as open source, the entire
                    ecosystem is able to move forward together, rather than just ‘near by’ domain and its users.
                  </h5>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>


    </main><!-- #main -->
  </div><!-- #primary -->
<?php
get_footer();
