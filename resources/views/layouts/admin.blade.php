<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Fjordhus</title>
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/animate-css/animate.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/intro.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/custom/custom.css')}}">
    @yield('header')
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
      <div class="navbar navbar-fixed"> 
        <nav class="navbar-main  nav-collapsible navbar-dark ">
          <div class="nav-wrapper">
            <ul class="navbar-list right">
              <li>
              	<a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown">
              		<span class="avatar-status avatar-online">
              			<img src="{{ asset('app-assets/images/avatar/avatar-7.png')}}" alt="avatar"><i></i>
              		</span>
              	</a>
              </li>
            </ul>
            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
              <li><a class="grey-text text-darken-1" href="{{ route('logout') }}"><i class="material-icons">keyboard_tab</i> Logout</a></li>
            </ul>

          </div>
        </nav>
      </div>
    </header>
    <!-- END: Header-->



    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square bg-dark" >
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><span class="logo-text hide-on-med-and-down">Fjordhus </span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>


      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class=" parent_li">
          <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)">
            <i class="material-icons">settings_input_svideo</i>
            <span class="menu-title" data-i18n="">Questions</span>
          </a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

              <li class="">
                <a class="collapsible-body" href="javascript:void(0)" data-i18n="">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span>All Question</span>
                </a>
              </li>

              <li>
                <a class="collapsible-body" href="{{ route('admin.addQuestion') }}" data-i18n="">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span>Add Question</span>
                </a>
              </li>

              <li>
                <a class="collapsible-body" href="{{ route('admin.commonQuestions') }}" data-i18n="">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span>Common Questions</span>
                </a>
              </li>

              <li>
                <a class="collapsible-body" href="{{ route('admin.individualQuestions') }}" data-i18n="">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span>Individual Questions</span>
                </a>
              </li>

            </ul>
          </div>
        </li> 

        <li class=" parent_li">
          <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)">
            <i class="material-icons">settings_input_svideo</i>
            <span class="menu-title" data-i18n="">Sections</span>
          </a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

              <li class="">
                <a class="collapsible-body " href="javascript:void(0)" data-i18n="">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span>All Sections</span>
                </a>
              </li>

              <li>
                <a class="collapsible-body" href="{{ route('admin.createSection') }}" data-i18n="">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span>Add Section</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

      </ul>




      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        <!-- Container-->		
          <div class="container">
            @yield('content')
		  </div>
		{{-- end container --}}
    </div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->

{{--     <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>&copy; 2019          <a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="https://pixinvent.com/">PIXINVENT</a></span></div>
      </div>
    </footer> --}}

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('app-assets/js/plugins.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/custom/custom-script.js')}}" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('app-assets/js/scripts/intro.js')}}" type="text/javascript"></script>

    <!-- END PAGE LEVEL JS-->
  </body>
  @yield('footer')

  <script>
    $('.sidenav a').removeClass('active');
    $('.sidenav li').removeClass('active');
    $('.sidenav li').removeClass('open');
    $('.sidenav a').each(function(){
      if( $(this).attr('href') == window.location.href ){
        $(this).addClass('active');
        $(this).parent().addClass('active');
        $(this).parents('.parent_li').addClass('active open');
        return;
      }
    })
  </script>
</html>