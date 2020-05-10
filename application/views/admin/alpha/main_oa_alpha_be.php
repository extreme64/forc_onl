<body data-gr-c-s-loaded="true">

    <!-- Loader -->
    <div class="loader" style="display: none;">
        <div class="inner one"></div>
        <div class="inner two"></div>
        <div class="inner three"></div>
    </div>
    <!-- old from frontend <section id="pageloader">
            <div class="loader-item fa fa-spin colored-border"></div>
    </section>  -->

    <header id="header" class="header fixed">

      <style media="screen">
        .top-header {
          width: 100%;
          overflow: hidden; 
          background-color: #202226 !important;
        }
        .top-header .logo {
            padding: 34px 0 34px 60px;
        }
        .top-header .logo h1 {
          display: inline-block;
          font-size: 2em;
          text-transform: uppercase;
          font-weight: 700;
        }
        .top-header .logo h1 em {
            font-style: normal;
            color: #C0E416;
        }
        .top-header a {
            color: #cFcFcF!important;
        }
        .logofc{
          width: calc(4%) !important;
          padding: 1px;
          margin-right: 1vw;
        }
      </style>
      <div class="top-header">
        <div class="logo">
          <a href="<?php print $base_url ?>admin/pocetna/" >
            <img class="logofc" src="<?php print $base_url ?>images/graph/forwardcreatinglogo_png_360.png" alt="Forward Creating Admin">
          </a>
            <h1><a href="index.html"><em>CMS </em>Forward Creating</a></h1>
            <span>Optimal content management system</span>
        </div> <!-- /.logo -->

      </div>

			<div class="navbar-top">
				<div class="curren-menu info-left">
					<div class="logo">

					</div><!-- /.logo -->
					<div class="top-button">
						<span style=""></span>
					</div><!-- /.top-button -->
					<div class="box-search">
						<form action="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" method="get" accept-charset="utf-8">
							<button><img src="<?php print $base_url ?>images/one_cms/search.png" alt=""></button>
							<input type="text" placeholder="Search Content..." name="Search">
						</form>
					</div><!-- /.box-search -->
				</div><!-- /.curren-menu -->
				<ul class="info-right">
					<li class="setting">
						<a href="/?storefront=envato-elements#" class="waves-effect waves-teal" title="">
							<img src="<?php print $base_url ?>images/one_cms/setting.png" alt="">
						</a>
					</li><!-- /.setting -->
					<li class="notification">
						<a href="/?storefront=envato-elements#" class="waves-effect waves-teal" title="">
							7
						</a>
					</li><!-- /.notification -->
					<li class="user">
						<div class="avatar">
							<img src="<?php print $base_url ?>images/one_cms/01.png" alt="">
						</div>
						<div class="info">
							<p class="name">MastG</p>
							<p class="address">Belgade, RS</p>
						</div>
						<div class="arrow-down">
							<i class="fa fa-angle-down" aria-hidden="true"></i>
							<i class="fa fa-angle-up" aria-hidden="true"></i>
						</div>
						<div class="dropdown-menu">
							<ul>
								<li>
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/01.png" alt="">
									</div>
									<div class="profile">
										<a href="/?storefront=envato-elements#" title="">View Profile</a>
									</div>
									<div class="clearfix"></div>
								</li>
								<li>
									<a href="/?storefront=envato-elements#" class="waves-effect" title="">My Account</a>
								</li>
								<li>
									<a href="/?storefront=envato-elements#" class="waves-effect" title="">Setting</a>
								</li>
								<li>
									<a href="/?storefront=envato-elements#" class="waves-effect" title="">Logout</a>
								</li>
							</ul>
						</div><!-- /.dropdown-menu -->
						<div class="clearfix"></div>
					</li><!-- /.user -->
					<li class="button-menu-right">
						<img src="<?php print $base_url ?>images/one_cms/menu-right.png" alt="">
					</li><!-- /.button-menu-right -->
				</ul><!-- /.info-right -->
				<div class="clearfix"></div>
			</div>	<!-- /.navbar-top -->
		</header><!-- /header <-->

		<section class="vertical-navigation left">
			<div class="user-profile">
				<div class="user-img">
					<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
						<div class="img">
							<img src="<?php print $base_url ?>images/one_cms/avatar-dashboard.png" alt="">
						</div>
						<div class="status-color blue heartbit style1"></div>
					</a>
				</div>
				<ul class="user-options">
					<li class="name"><a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">MastG</a></li>
					<li class="options">Admin</li>
				</ul>
			</div>

      <!--  sidenav tabs -->
			<ul class="sidebar-nav">
				<li class="dashboard waves-effect waves-teal active">
  					<div class="img-nav">
              <a href="<?php print $base_url ?>admin/pocetna/alpha#">
                <img src="<?php print $base_url ?>images/one_cms/monitor.png" alt="">
              </a>
            </div>
            <a href="<?php print $base_url ?>admin/pocetna/alpha#"><span style="">DASHBOARD</span></a>
				</li>
				<li class="message waves-effect waves-teal">
					<div class="img-nav">
            <a href="<?php print $base_url ?>admin/usluge">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
						<span style="">3</span>
					</div>
          <a href="<?php print $base_url ?>admin/usluge"><span style="">USLUGE</span></a>
				</li>
				<li class="calendar waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/tekstovi">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/tekstovi"><span style="">TEKSTOVI</span></a>
				</li>
				<li class="pages waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/kategorije">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/kategorije"><span style="">KATEGORIJE</span></a>
				</li>
				<li class="apps waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/slike">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/slike"><span style="">SLIKE</span></a>
				</li>
				<li class="setting waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/galerije">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/galerije"><span style="">GALERIJE</span></a>
				</li>
        <li class="setting waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/reference">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/reference"><span style="">REFERENCE</span></a>
				</li>
        <!--  -->
        <li class="setting waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/stranice">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/stranice"><span style="">STRANICE SAJTA</span></a>
				</li>
        <li class="setting waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/korisnici">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/korisnici"><span style="">KORISNICI</span></a>
				</li>
        <!--  -->
        <li class="setting waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/komentari">
              <img src="<?php print $base_url ?>images/one_cms/pages.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/komentari"><span style="">KOMENTARI</span></a>
				</li>
        <!--  UTIL -->
        <li class="setting waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>owa/" target="_blank">
              <img src="<?php print $base_url ?>images/one_cms/apps.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>owa/" target="_blank"><span style="">OWA</span></a>
				</li>
        <li class="setting waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/db_ex/" target="_blank">
              <img src="<?php print $base_url ?>images/one_cms/setting.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/db_ex/" target="_blank"><span style="">Database Export</span></a>
				</li>
        <li class="setting waves-effect waves-teal">
          <div class="img-nav">
            <a href="<?php print $base_url ?>admin/pocetna/log" target="_blank">
              <img src="<?php print $base_url ?>images/one_cms/setting.png" alt="">
            </a>
          </div>
          <a href="<?php print $base_url ?>admin/pocetna/log" target="_blank"><span style="">LOG</span></a>
				</li>
			</ul>
      <!--
        images/one_cms/monitor.png
        images/one_cms/message.png
        images/one_cms/calendar.png
        images/one_cms/apps.png
        images/one_cms/setting-02.png
      -->

    </section><!-- /.vertical-navigation -->

		<main class="">
			<!-- <section id="dashboard" style="display: none;">  -->
      <section id="dashboard" style="display:;">
				<div class="rows">
					<div class="status-bar">
						<ul>
							<li class="progres">
								<div class="icon">
									<img src="<?php print $base_url ?>images/one_cms/progress.png" alt="">
								</div>
								<div class="content">
									<div class="numb" data-from="0" data-to="38" data-speed="2000" data-waypoint-active="yes">38</div>
									<div class="text">
										TASK PROGRESS
									</div>
								</div>
							</li><!-- /.progres -->
							<li class="progres">
								<div class="icon">
									<img src="<?php print $base_url ?>images/one_cms/task.png" alt="">
								</div>
								<div class="content">
									<div class="numb" data-from="0" data-to="59" data-speed="2000" data-waypoint-active="yes">59</div>
									<div class="text">
										TASK RESEARCH
									</div>
								</div>
							</li><!-- /.progres -->
							<li class="progres">
								<div class="icon">
									<img src="<?php print $base_url ?>images/one_cms/tick.png" alt="">
								</div>
								<div class="content">
									<div class="numb" data-from="0" data-to="87" data-speed="2000" data-waypoint-active="yes">87</div>
									<div class="text">
										TASK COMPLETED
									</div>
								</div>
							</li><!-- /.progres -->
							<li class="progres">
								<div class="icon">
									<img src="<?php print $base_url ?>images/one_cms/chart.png" alt="">
								</div>
								<div class="content">
									<div class="numb" data-from="0" data-to="43" data-speed="2000" data-waypoint-active="yes">43</div>
									<div class="text">
										ONGOING PROJECT
									</div>
								</div>
							</li><!-- /.progres -->
						</ul>
					</div><!-- /.status-bar -->
				</div><!-- /.rows -->

				<div class="rows">
	        	<!-- <div class="box left">
		            <div class="box-header with-border">
		              	<div class="box-title">
		              		<h3>2 A</h3>
		              	</div>
		              	<div class="box-tools pull-right">

		              	</div>
		              	<div class="clearfix"></div>
		            </div>
	         	</div> -->
            <style media="screen">

            </style>
            <div class="box box-inbox box-inbox-mod-lists left" >
  						<div class="box-header with-border">
  							<div class="box-title">
  								<h3>2 A</h3>
  								<span style="">47</span>
  							</div>
  			              	<div class="box-tools pull-right">
  			              		<i class="zmdi zmdi-more-vert waves-effect waves-teal"></i>
  			              		<ul class="dropdown-menu">
  			              			<li>
  			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Action</a>
  			              			</li>
  			              			<li>
  			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Support</a>
  			              			</li>
  			              			<li>
  			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">FAQ</a>
  			              			</li>
  			              			<li>
  			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Message</a>
  			              			</li>
  			              		</ul>
  			              	</div><!-- /.box-tools pull-right -->
  			              	<div class="clearfix"></div>
  			            </div><!-- /.box-header -->
  			            <div class="box-content">
  			            	<ul class="inbox-list">
  			            		<li class="waves-effect">
  			            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
  			            				<div class="left">
  				            				<img src="<?php print $base_url ?>images/one_cms/inbox-01.png" alt="">
  				            				<div class="info">
  				            					<p class="name">John Alex</p>
  				            					<p>Hey! How are you?</p>
  				            				</div>
  				            			</div>
  				            			<div class="right">
  				            				12:20 PM
  				            			</div>
  				            			<div class="clearfix"></div>
  			            			</a>
  			            		</li>
  			            		<li class="waves-effect">
  			            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
  			            				<div class="left">
  				            				<img src="<?php print $base_url ?>images/one_cms/inbox-02.png" alt="">
  				            				<div class="info">
  				            					<p class="name">John Alex</p>
  				            					<p>Hey! How are you?</p>
  				            				</div>
  				            			</div>
  				            			<div class="right">
  				            				12:20 PM
  				            			</div>
  				            			<div class="clearfix"></div>
  			            			</a>
  			            		</li>
  			            		<li class="waves-effect">
  			            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
  			            				<div class="left">
  				            				<img src="<?php print $base_url ?>images/one_cms/inbox-03.png" alt="">
  				            				<div class="info">
  				            					<p class="name">John Alex</p>
  				            					<p>Hey! How are you?</p>
  				            				</div>
  				            			</div>
  				            			<div class="right">
  				            				12:20 PM
  				            			</div>
  				            			<div class="clearfix"></div>
  			            			</a>
  			            		</li>
  			            		<li class="waves-effect">
  			            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
  			            				<div class="left">
  				            				<img src="<?php print $base_url ?>images/one_cms/inbox-04.png" alt="">
  				            				<div class="info">
  				            					<p class="name">John Alex</p>
  				            					<p>Hey! How are you?</p>
  				            				</div>
  				            			</div>
  				            			<div class="right">
  				            				12:20 PM
  				            			</div>
  				            			<div class="clearfix"></div>
  			            			</a>
  			            		</li>
  			            	</ul><!-- /.inbox-list -->
  			            </div><!-- /.box-content -->
  					</div><!-- /.box box-inbox -->

            <!--  -->


	         	<div class="box box-statistics right">
              <div class="box-header with-border">
              	<div class="box-title">
              		<h3>2 B</h3>
              	</div>
              	<div class="box-tools pull-right">

              	</div>
              	<div class="clearfix"></div>
	            </div><!-- /.box-header -->
	            <div class="box-content style1">
              </div><!-- /.box-content -->
					</div><!-- /.box box-statistics -->
		         	<div class="clearfix"></div>
				</div><!-- /.rows -->

				<div class="rows">
					<div class="box box-stackedColumn left">
						<div class="box-header with-border">
            	<div class="box-title">
            		<h3>3 A</h3>
            	</div>
            	<div class="box-tools pull-right">

            	</div><!-- /.box-tools pull-right -->
            	<div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="box-content style2">
            </div><!-- /.box-content -->
					</div><!-- /.box box-stackedColumn -->
					<div class="box box-spline right">
						<div class="box-header with-border">
            	<div class="box-title">
            		<h3>3 B</h3>
            	</div>
            	<div class="box-tools pull-right">

            	</div><!-- /.box-tools pull-right -->
            	<div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="box-content">

            </div><!-- /.box-content -->
					</div><!-- /.box box-spline -->
					<div class="clearfix"></div>
				</div><!-- /.rows -->

				<div class="rows">
					<div class="box box-map left">
						<div class="box-header with-border">
            	<div class="box-title">
            		<h3>4 A</h3>
            	</div>
            	<div class="box-tools pull-right">

            	</div><!-- /.box-tools pull-right -->
            	<div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="box-content">
            </div><!-- /.box-content -->
					</div><!-- /.box box-map -->
					<div class="box box-map right">
						<div class="box-header with-border">
            	<div class="box-title">
            		<h3>4 B</h3>
            	</div>
            	<div class="box-tools pull-right">
              </div><!-- /.box-tools pull-right -->
              <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="box-content">
            </div><!-- /.box-content -->
          </div><!-- /.box-content -->

				</div><!-- /.rows -->


				<div class="rows">
					<div class="clearfix"></div>
				</div><!-- /.rows -->


				<div class="rows">
					<div class="box box-project left">
						<div class="box-header with-border">
							<div class="box-title">
								<h3>PROJECT STATUS</h3>
								<span style="">56</span>
							</div>
			              	<div class="box-tools pull-right ">
			              		<i class="zmdi zmdi-more-vert waves-effect waves-teal"></i>
			              		<ul class="dropdown-menu">
			              			<li>
			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Action</a>
			              			</li>
			              			<li>
			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Support</a>
			              			</li>
			              			<li>
			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">FAQ</a>
			              			</li>
			              			<li>
			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Message</a>
			              			</li>
			              		</ul>
			              	</div><!-- /.box-tools pull-right -->
			              	<div class="clearfix"></div>
						</div><!-- /.box-header -->
						<div class="box-content mCustomScrollbar _mCS_5"><div id="mCSB_5" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside" tabindex="0" style="max-height: 0px;"><div id="mCSB_5_container" class="mCSB_container" style="position: relative; top: 0px; left: -1px; width: 1px; min-width: 100%; overflow-x: inherit;" dir="ltr">
			            	<table class="">
			            		<thead>
			            			<tr>
			            				<th>ID</th>
			            				<th>PROJECT</th>
			            				<th>STATUS</th>
			            				<th>PROGRESS</th>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			<tr class="developing">
			            				<td>1024</td>
			            				<td>User Research</td>
			            				<td class="bg"><span data-percent="60" data-waypoint-active="yes" style="width: 60%;">Developing</span></td>
			            				<td>Ongoing</td>
			            			</tr>
			            			<tr class="design">
			            				<td>ID</td>
			            				<td>Wings Dashboard Design</td>
			            				<td class="bg"><span data-percent="60" data-waypoint-active="yes" style="width: 60%;">Design</span></td>
			            				<td>Completed</td>
			            			</tr>
			            			<tr class="cancel">
			            				<td>ID</td>
			            				<td>iOS Apps for DXSource</td>
			            				<td class="bg"><span data-percent="160" data-waypoint-active="yes" style="width: 160%;">Canceled</span></td>
			            				<td>Cenceled</td>
			            			</tr>
			            			<tr class="testing">
			            				<td>ID</td>
			            				<td>BMW Re-Design</td>
			            				<td class="bg"><span data-percent="60" data-waypoint-active="yes" style="width: 60%;">Testing</span></td>
			            				<td>PROGRESS</td>
			            			</tr>
			            		</tbody>
			            	</table><!-- /.scroll -->
			            </div><div id="mCSB_5_scrollbar_horizontal" class="mCSB_scrollTools mCSB_5_scrollbar mCS-light mCSB_scrollTools_horizontal" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_5_dragger_horizontal" class="mCSB_dragger" style="position: absolute; min-width: 30px; width: 0px; left: 0px; display: block;"><div class="mCSB_dragger_bar"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div><!-- /.box-content -->
					</div><!-- /.box box-project -->
					<div class="box box-inbox right">
						<div class="box-header with-border">
							<div class="box-title">
								<h3>INBOX</h3>
								<span style="">47</span>
							</div>
			              	<div class="box-tools pull-right">
			              		<i class="zmdi zmdi-more-vert waves-effect waves-teal"></i>
			              		<ul class="dropdown-menu">
			              			<li>
			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Action</a>
			              			</li>
			              			<li>
			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Support</a>
			              			</li>
			              			<li>
			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">FAQ</a>
			              			</li>
			              			<li>
			              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Message</a>
			              			</li>
			              		</ul>
			              	</div><!-- /.box-tools pull-right -->
			              	<div class="clearfix"></div>
			            </div><!-- /.box-header -->
			            <div class="box-content">
			            	<ul class="inbox-list">
			            		<li class="waves-effect">
			            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
			            				<div class="left">
				            				<img src="<?php print $base_url ?>images/one_cms/inbox-01.png" alt="">
				            				<div class="info">
				            					<p class="name">John Alex</p>
				            					<p>Hey! How are you?</p>
				            				</div>
				            			</div>
				            			<div class="right">
				            				12:20 PM
				            			</div>
				            			<div class="clearfix"></div>
			            			</a>
			            		</li>
			            		<li class="waves-effect">
			            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
			            				<div class="left">
				            				<img src="<?php print $base_url ?>images/one_cms/inbox-02.png" alt="">
				            				<div class="info">
				            					<p class="name">John Alex</p>
				            					<p>Hey! How are you?</p>
				            				</div>
				            			</div>
				            			<div class="right">
				            				12:20 PM
				            			</div>
				            			<div class="clearfix"></div>
			            			</a>
			            		</li>
			            		<li class="waves-effect">
			            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
			            				<div class="left">
				            				<img src="<?php print $base_url ?>images/one_cms/inbox-03.png" alt="">
				            				<div class="info">
				            					<p class="name">John Alex</p>
				            					<p>Hey! How are you?</p>
				            				</div>
				            			</div>
				            			<div class="right">
				            				12:20 PM
				            			</div>
				            			<div class="clearfix"></div>
			            			</a>
			            		</li>
			            		<li class="waves-effect">
			            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
			            				<div class="left">
				            				<img src="<?php print $base_url ?>images/one_cms/inbox-04.png" alt="">
				            				<div class="info">
				            					<p class="name">John Alex</p>
				            					<p>Hey! How are you?</p>
				            				</div>
				            			</div>
				            			<div class="right">
				            				12:20 PM
				            			</div>
				            			<div class="clearfix"></div>
			            			</a>
			            		</li>
			            	</ul><!-- /.inbox-list -->
			            </div><!-- /.box-content -->
					</div><!-- /.box box-inbox -->
					<div class="clearfix"></div>
				</div><!-- /.rows -->
			</section><!-- /#dashboard -->

			<section id="message" style="display: none;">
				<div class="box box-message">
					<div class="box-header active">
						<div class="header-title">
							<img src="<?php print $base_url ?>images/one_cms/download.png" alt="">
							<span style="display: inline-block;">INBOX</span>
						</div>
					</div><!-- /.box-header -->
					<div class="box-content" style="display: none;">
						<ul class="message-list scroll mCustomScrollbar _mCS_3 mCS_no_scrollbar"><div id="mCSB_3" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 630px;"><div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
							<li class="waves-effect waves-teal">
								<div class="left">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/message-01.png" alt="" class="mCS_img_loaded">
										<div class="status-color blue style2 heartbit"></div>
									</div>
									<div class="content">
										<div class="username">
											<div class="name">
												Jonathan Alex
											</div>
										</div>
										<div class="text">
											<p>Hi, please loock my last design</p>
											<p>I hope you like it.</p>
										</div>
									</div>
								</div><!-- /.left -->
								<div class="right">
									<div class="date">
										Today, 10:15 PM
									</div>
								</div><!-- /.right -->
								<div class="clearfix"></div>
							</li><!-- /li.waves-effect -->
							<li class="waves-effect waves-teal">
								<div class="left">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/message-02.png" alt="" class="mCS_img_loaded">
										<div class="status-color blue style2 heartbit"></div>
									</div>
									<div class="content">
										<div class="username">
											<div class="name">
												Ricky Martin
											</div>
										</div>
										<div class="text">
											<p>Hi, please loock my last design</p>
											<p>I hope you like it.</p>
										</div>
									</div>
								</div><!-- /.left -->
								<div class="right">
									<div class="date">
										Today, 10:15 PM
									</div>
								</div><!-- /.right -->
								<div class="clearfix"></div>
							</li><!-- /li.waves-effect -->
							<li class="waves-effect waves-teal">
								<div class="left">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/message-03.png" alt="" class="mCS_img_loaded">
										<div class="status-color blue style2 heartbit"></div>
									</div>
									<div class="content">
										<div class="username">
											<div class="name">
												Stuard James
											</div>
											<span style="">2</span>
										</div>
										<div class="text">
											<p>Hi, please loock my last design</p>
											<p>I hope you like it.</p>
										</div>
									</div>
								</div><!-- /.left -->
								<div class="right">
									<div class="date">
										June 15
									</div>
								</div><!-- /.right -->
								<div class="clearfix"></div>
							</li><!-- /li.waves-effect -->
							<li class="waves-effect waves-teal active">
								<div class="left">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/message-04.png" alt="" class="mCS_img_loaded">
										<div class="status-color blue style2 heartbit"></div>
									</div>
									<div class="content">
										<div class="username">
											<div class="name">
												John Alex
											</div>
										</div>
										<div class="text">
											<p>Hi, please loock my last design</p>
											<p>I hope you like it.</p>
										</div>
									</div>
								</div><!-- /.left -->
								<div class="right">
									<div class="date">
										June 12
									</div>
								</div><!-- /.right -->
								<div class="clearfix"></div>
							</li><!-- /li.waves-effect -->
							<li class="waves-effect waves-teal">
								<div class="left">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/message-05.png" alt="" class="mCS_img_loaded">
										<div class="status-color blue style2 heartbit"></div>
									</div>
									<div class="content">
										<div class="username">
											<div class="name">
												Robart K
											</div>
										</div>
										<div class="text">
											<p>Hi, please loock my last design</p>
											<p>I hope you like it.</p>
										</div>
									</div>
								</div><!-- /.left -->
								<div class="right">
									<div class="date">
										June 11
									</div>
								</div><!-- /.right -->
								<div class="clearfix"></div>
							</li><!-- /li.waves-effect -->
							<li class="waves-effect waves-teal">
								<div class="left">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/message-05.png" alt="" class="mCS_img_loaded">
										<div class="status-color blue style2 heartbit"></div>
									</div>
									<div class="content">
										<div class="username">
											<div class="name">
												Robart K
											</div>
										</div>
										<div class="text">
											<p>Hi, please loock my last design</p>
											<p>I hope you like it.</p>
										</div>
									</div>
								</div><!-- /.left -->
								<div class="right">
									<div class="date">
										June 11
									</div>
								</div><!-- /.right -->
								<div class="clearfix"></div>
							</li><!-- /li.waves-effect -->
						</div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 525px; max-height: 620px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></ul><!-- /.message-list scroll -->
						<div class="new-message">
							<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Compose New</a>
						</div><!-- /.new-message -->
					</div><!-- /.box-content -->
				</div><!-- /.box box-message -->
				<div class="message-info right">
					<div class="message-header">
						<div class="move-message">
							<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
								<span style="display: inline-block;"><img src="<?php print $base_url ?>images/one_cms/bin.png" alt=""></span>
								MOVE TO TRASH
							</a>
						</div><!-- /.move-message -->
						<div class="box-info-messager">
							<div class="message-pic">
								<img src="<?php print $base_url ?>images/one_cms/message-06.png" alt="">
								<div class="status-color purple"></div>
							</div>
							<div class="content">
								<div class="username">
									Ricky Martin
								</div>
								<div class="text">
									<p>Hi, please loock my last design</p>
									<p>I hope you like it.</p>
								</div>
							</div>
						</div><!-- /.box-info-messager -->
					</div><!-- /.message-header -->
					<div class="message-box scroll mCustomScrollbar _mCS_4 mCS_no_scrollbar"><div id="mCSB_4" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 664px;"><div id="mCSB_4_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
						<div class="message-in">
							<div class="message-pic">
								<img src="<?php print $base_url ?>images/one_cms/message-06.png" alt="" class="mCS_img_loaded">
								<div class="status-color purple"></div>
							</div>
							<div class="message-body">
								<div class="message-text">
									<p>Hi, John</p>
									<p>You have excellent dashboard design, I wanted to offer to cooprate. I can promote your design.</p>
								</div>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.message-in -->
						<div class="clearfix"></div>
						<div class="message-out">
							<div class="message-pic">
								<img src="<?php print $base_url ?>images/one_cms/message-07.png" alt="" class="mCS_img_loaded">
								<div class="status-color purple"></div>
							</div>
							<div class="message-body">
								<div class="message-text">
									<p>Hi, Martin</p>
									<p>You have excellent dashboard design, I wanted to offer to cooprate. I can promote your design. to offer to cooprate</p>
								</div>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.message-out -->
						<div class="clearfix"></div>
						<div class="message-in">
							<div class="message-pic">
								<img src="<?php print $base_url ?>images/one_cms/message-06.png" alt="" class="mCS_img_loaded">
								<div class="status-color purple"></div>
							</div>
							<div class="message-body">
								<div class="message-text">
									<p>Hi, John</p>
									<p>You have excellent dashboard design, I wanted to offer to cooprate. I can promote your design.</p>
								</div>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.message-in -->
						<div class="clearfix"></div>
						<div class="message-out">
							<div class="message-pic">
								<img src="<?php print $base_url ?>images/one_cms/message-07.png" alt="" class="mCS_img_loaded">
								<div class="status-color purple"></div>
							</div>
							<div class="message-body">
								<div class="message-text">
									<p>Hi, Martin</p>
									<p>Here is some of my best work example for ux &amp; ui design works. Reply me with your openion about my work</p>
								</div>
								<div class="message-image">
									<ul>
										<li>
											<img src="<?php print $base_url ?>images/one_cms/01(1).png" alt="" class="mCS_img_loaded">
										</li>
										<li>
											<img src="<?php print $base_url ?>images/one_cms/02.png" alt="" class="mCS_img_loaded">
										</li>
										<li>
											<img src="<?php print $base_url ?>images/one_cms/03.png" alt="" class="mCS_img_loaded">
										</li>
										<li>
											<img src="<?php print $base_url ?>images/one_cms/04.png" alt="" class="mCS_img_loaded">
										</li>
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.message-out -->
						<div class="clearfix"></div>
						<div class="message-in">
							<div class="message-pic">
								<img src="<?php print $base_url ?>images/one_cms/message-06.png" alt="" class="mCS_img_loaded">
								<div class="status-color purple"></div>
							</div>
							<div class="message-body">
								<div class="message-text">
									<p>Hi, John</p>
									<p>You have excellent dashboard design, I wanted to offer to cooprate. I can promote your design.</p>
								</div>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.message-in -->
						<div class="clearfix"></div>
						<div class="message-out">
							<div class="message-pic">
								<img src="<?php print $base_url ?>images/one_cms/message-07.png" alt="" class="mCS_img_loaded">
								<div class="status-color purple"></div>
							</div>
							<div class="message-body">
								<div class="message-text">
									<p>Hi, Martin</p>
									<p>Here is some of my best work example for ux &amp; ui design works. Reply me with your openion about my work</p>
								</div>
								<div class="message-image">
									<ul>
										<li>
											<img src="<?php print $base_url ?>images/one_cms/01(1).png" alt="" class="mCS_img_loaded">
										</li>
										<li>
											<img src="<?php print $base_url ?>images/one_cms/04.png" alt="" class="mCS_img_loaded">
										</li>
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.message-out -->
					</div><div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 519px; max-height: 654px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
					<div class="form-chat">
						<form action="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" method="get" accept-charset="utf-8">
							<div class="message-form-chat">
								<span class="pin" style="">
									<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
										<img src="<?php print $base_url ?>images/one_cms/pin.png" alt="">
									</a>
								</span><!-- /.pin -->
								<span class="message-text" style="">
									<textarea name="message" placeholder="Type your message..." required="required"></textarea>
								</span><!-- /.message-text -->
								<span class="camera" style="">
									<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
										<img src="<?php print $base_url ?>images/one_cms/camera.png" alt="">
									</a>
								</span><!-- /.camera -->
								<span class="icon-message" style="">
									<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
										<img src="<?php print $base_url ?>images/one_cms/icon-message.png" alt="">
									</a>
								</span><!-- /.icon-right -->
								<span class="btn-send" style="">
									<button class="waves-effect" type="submit">Send</button>
								</span><!-- /.btn-send -->
								<div class="icon-mobile">
									<ul>
										<li>
											<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title=""><img src="<?php print $base_url ?>images/one_cms/pin.png" alt=""></a>
										</li>
										<li>
											<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title=""><img src="<?php print $base_url ?>images/one_cms/camera.png" alt=""></a>
										</li>
										<li>
											<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title=""><img src="<?php print $base_url ?>images/one_cms/icon-message.png" alt=""></a>
										</li>
									</ul>
								</div><!-- /.icon-right -->
							</div><!-- /.message-form-chat -->
							<div class="clearfix"></div>
						</form><!-- /form -->
					</div>
				</div><!-- /.message-info -->
				<div class="clearfix"></div>
			</section><!-- /#message -->

		</main><!-- /main -->






    <!-- members -->
		<section class="member-status right">
			<div class="sidebar-member">
				<ul class="member-tab">
					<li class="">
						<i class="fa fa-users" aria-hidden="true"></i>
					</li>
					<li class="active">
						<i class="fa fa-bell" aria-hidden="true"></i>
					</li>
				</ul><!-- /.member-tab -->
				<div class="content-tab">
					<div class="scroll content mCustomScrollbar _mCS_1 mCS_no_scrollbar" style="display: none;"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 900px;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
						<ul class="member-list online">
							<li class="member-header">ONLINE</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/02(1).png" alt="" class="mCS_img_loaded">
										<div class="status-color green heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Robart Alex</p>
										<p class="options">Writer, Editor</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/03(1).png" alt="" class="mCS_img_loaded">
										<div class="status-color green heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Anthony Gomes</p>
										<p class="options">Designer</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/04(1).png" alt="" class="mCS_img_loaded">
										<div class="status-color green heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Robarto Thuan</p>
										<p class="options">UX Designer</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/05.png" alt="" class="mCS_img_loaded">
										<div class="status-color pink heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Mogen Polshin</p>
										<p class="options">UI Designer</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/06.png" alt="" class="mCS_img_loaded">
										<div class="status-color green heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Mogen Pallak</p>
										<p class="options">Writer, Editor</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/07.png" alt="" class="mCS_img_loaded">
										<div class="status-color blue style2 heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Shawon Rox</p>
										<p class="options">Writer, Editor</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/08.png" alt="" class="mCS_img_loaded">
										<div class="status-color green heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Jonathan Doe</p>
										<p class="options">UX Engineer</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/09.png" alt="" class="mCS_img_loaded">
										<div class="status-color green heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Alex Morgan</p>
										<p class="options">Writer, Editor</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
						</ul><!-- /.member-list online -->
						<ul class="member-list offline">
							<li class="member-header">OFFLINE</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/10.png" alt="" class="mCS_img_loaded">
										<div class="status-color grey heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Robart Alex</p>
										<p class="options">Writer, Editor</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/11.png" alt="" class="mCS_img_loaded">
										<div class="status-color grey heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Anthony Gomes</p>
										<p class="options">Designer</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/12.png" alt="" class="mCS_img_loaded">
										<div class="status-color grey heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Robarto Thuan</p>
										<p class="options">UX Designer</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li>
								<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
									<div class="avatar">
										<img src="<?php print $base_url ?>images/one_cms/13.png" alt="" class="mCS_img_loaded">
										<div class="status-color grey heartbit"></div>
									</div>
									<div class="info-user">
										<p class="name">Mogen Polshin</p>
										<p class="options">UI Designer</p>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
						</ul><!-- /.member-list offline -->
					</div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 786px; max-height: 890px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div><!-- /.content scroll -->
					<div class="content scroll mCustomScrollbar _mCS_2 mCS_no_scrollbar" style="display: block;"><div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: none;"><div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
						<ul class="notify">
							<li>
								<div class="avatar">
									<img src="<?php print $base_url ?>images/one_cms/02(1).png" alt="" class="mCS_img_loaded">
								</div>
								<div class="notify-content">
									Robart Alex has a news post.
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="avatar">
									<img src="<?php print $base_url ?>images/one_cms/03(1).png" alt="" class="mCS_img_loaded">
								</div>
								<div class="notify-content">
									Anthony Gomes has a news post.
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="avatar">
									<img src="<?php print $base_url ?>images/one_cms/04(1).png" alt="" class="mCS_img_loaded">
								</div>
								<div class="notify-content">
									Robarto Thuan has comment post <a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">pages</a>.
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="avatar">
									<img src="<?php print $base_url ?>images/one_cms/09.png" alt="" class="mCS_img_loaded">
								</div>
								<div class="notify-content">
									Alex Morgan liked your new image.
								</div>
								<div class="clearfix"></div>
							</li>
						</ul>
					</div><div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; height: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div><!-- /.content scroll -->
				</div><!-- /.cotnent-tab -->
			</div><!-- /.sidebar-member -->
		</section><!-- /.member-status -->

    <!-- </div> <!-- /.inner-content --> -->
</div> <!-- /.content-wrapper -->
