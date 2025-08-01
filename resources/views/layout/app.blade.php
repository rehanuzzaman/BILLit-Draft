<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App CSS -->
  <link href="{{ asset('assets/css2/bootstrap-creative.min.css') }}" rel="stylesheet" id="bs-default-stylesheet" />
  <link href="{{ asset('assets/css2/app-creative.min.css') }}" rel="stylesheet" id="app-default-stylesheet" />

  <link href="{{ asset('assets/css2/bootstrap-creative-dark.min.css') }}" rel="stylesheet" id="bs-dark-stylesheet" disabled />
  <link href="{{ asset('assets/css2/app-creative-dark.min.css') }}" rel="stylesheet" id="app-dark-stylesheet" disabled />

  <!-- Icons -->
  <link href="{{ asset('assets/css2/icons.min.css') }}" rel="stylesheet" />

  <!-- Custom style (if needed) -->
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body data-layout-mode="detached"
  data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

  <!-- Begin page -->
  <div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
      <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
          <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
              role="button" aria-haspopup="false" aria-expanded="false">
              <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle" />
              <span class="pro-user-name ml-1">
                Geneva <i class="mdi mdi-chevron-down"></i>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
              </div>
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-user"></i>
                <span>My Account</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-log-out"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
          <a href="{{ url('/') }}" class="logo logo-dark text-center">
            <span class="logo-sm">
              <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
              <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20" />
            </span>
          </a>
          <a href="{{ url('/') }}" class="logo logo-light text-center">
            <span class="logo-sm">
              <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
              <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20" />
            </span>
          </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
          <li>
            <button class="button-menu-mobile waves-effect waves-light">
              <i class="fe-menu"></i>
            </button>
          </li>
          <li>
            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
              <div class="lines">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- end Topbar -->

    <!-- Sidebar -->
    @include('include.sidebar')

    <!-- Start Page Content here -->
    <div class="content-page">
      <div class="content">
        @yield('content')
      </div>
    </div>
    <!-- End Page content -->
  </div>

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>

  <!-- Vendor JS -->
  <script src="{{ asset('assets/js2/vendor.min.js') }}"></script>

  <!-- Plugins JS -->
  <script src="{{ asset('assets/libs2/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/libs2/apexcharts/apexcharts.min.js') }}"></script>

  <!-- Dashboard init JS -->
  <script src="{{ asset('assets/js2/pages/dashboard-1.init.js') }}"></script>

  <!-- App JS -->
  <script src="{{ asset('assets/js2/app.min.js') }}"></script>
</body>

</html>
