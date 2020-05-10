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
