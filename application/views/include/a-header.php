<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin Dashboard - ResumeGenie</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/adminwrap-lite/"
    />
    <!-- Favicon icon -->
    <link href="<?= base_url() ?>/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Bootstrap Core CSS -->
    <link
      href="<?= base_url() ?>/assets/admin/node_modules/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="<?= base_url() ?>/assets/admin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?= base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="<?= base_url() ?>/assets/admin/node_modules/c3-master/c3.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>/assets/admin/css/style.css" rel="stylesheet" />
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= base_url() ?>/assets/admin/css/pages/dashboard1.css" rel="stylesheet" />
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url() ?>/assets/admin/css/colors/default.css" id="theme" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/resume.css">
  </head>

  <body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Resume Genie</p>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url('admin') ?>">
              <!-- Logo icon --><b>
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="<?= base_url() ?>/assets/img/resume.png"
                  alt="homepage"
                  class="dark-logo img-fluid"
                />
                <!-- Light Logo icon -->
                <img
                  src="<?= base_url() ?>/assets/img/resume.png"
                  alt="homepage"
                  class="light-logo img-fluid"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text --><span>
                <!-- dark Logo text -->
                <!-- <img
                  src="<?= base_url() ?>/assets/img/resume.png"
                  alt="homepage"
                  class="dark-logo img-fluid" /> -->
                <!-- Light Logo text -->
                <img
                  src="<?= base_url() ?>/assets/img/resume.png"
                  class="light-logo img-fluid"
                  alt="homepage"
              /></span>
            </a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a
                  class="
                    nav-link nav-toggler
                    hidden-md-up
                    waves-effect waves-dark
                  "
                  href="javascript:void(0)"
                  ><i class="fa fa-bars"></i
                ></a>
              </li>
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              <li class="nav-item hidden-xs-down search-box">
                <a
                  class="nav-link hidden-sm-down waves-effect waves-dark"
                  href="javascript:void(0)"
                  ><i class="fa fa-search"></i
                ></a>
                <form class="app-search">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search & enter"
                  />
                  <a class="srh-btn"><i class="fa fa-times"></i></a>
                </form>
              </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
              <!-- ============================================================== -->
              <!-- Profile -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown u-pro">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    waves-effect waves-dark
                    profile-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  ><img
                    src="<?= base_url() ?>/assets/img/favicon.png"
                    alt="user"
                    class=""
                  />
                  <span class="hidden-md-down">Mark Sanders &nbsp;</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url("admin") ?>" aria-expanded="false">
                  <i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <?php if($this->session->userdata('role_id') != 1){ ?>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/lor') ?>" aria-expanded="false">
                  <i class="fa fa-file-text-o"></i><span class="hide-menu">Letter of Recommed</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/resume') ?>" aria-expanded="false">
                  <i class="fa fa-send-o"></i><span class="hide-menu">Resumes</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/sop') ?>" aria-expanded="false">
                  <i class="fa fa-file-pdf-o"></i><span class="hide-menu">Statement of Purpose</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/payments') ?>" aria-expanded="false">
                  <i class="fa fa-rupee"></i><span class="hide-menu">Payments</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/course_finder') ?>" aria-expanded="false">
                  <i class="fa fa-address-card-o"></i><span class="hide-menu">Course Finder</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/profile') ?>" aria-expanded="false">
                  <i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span>
                </a>
              </li>
              <?php } ?>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/coupon') ?>" aria-expanded="false">
                  <i class="fa fa-gift"></i><span class="hide-menu">Coupons</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/package') ?>" aria-expanded="false">
                  <i class="fa fa-globe"></i><span class="hide-menu">Package</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/user_payment') ?>" aria-expanded="false">
                  <i class="fa fa-rupee"></i><span class="hide-menu">User Payments List</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/template') ?>" aria-expanded="false">
                  <i class="fa fa-file-pdf-o"></i><span class="hide-menu">Template</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/role') ?>" aria-expanded="false">
                  <i class="fa fa-users"></i><span class="hide-menu">Roles</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/blog') ?>" aria-expanded="false">
                  <i class="fa fa-rss"></i><span class="hide-menu">Blog</span>
                </a>
              </li>
              <li>
                <a class="waves-effect waves-dark" href="<?= base_url('admin/profile') ?>" aria-expanded="false">
                  <i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span>
                </a>
              </li>
            </ul>
            <div class="text-center mt-4">
              <a href="<?= base_url('api/logout') ?>" class="btn waves-effect waves-light btn-info hidden-md-down text-white">
                <i class="fa fa-sign-out me-2 ms-2"></i> <span class="hide-menu me-2">Logout</span>
              </a>
            </div>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        