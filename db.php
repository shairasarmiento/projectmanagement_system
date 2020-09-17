
  <?php
  session_start();

  include_once 'objects/database.php';
  include_once 'objects/Crud.php';

  //initiate db
  $db = new Database();

  //call method
  $conn = $db->getConnection();

  $sel = new Crud($conn);


  // $sel->v01 = $_GET['proj_id'];
  /// for System Analyst
  // $retrieve = $sel->Select("sp_ret_users");
  // $select = $sel->Select("sp_ret_task");

  // $db = $sel->Select_with_filter("sp_dash_retrieve");

  // $db1 = $sel->Select_with_filter("sp_db_developer");
  //$db1 = $sel->Select("sp_db_developer");
  // $members = $sel->Select_with_filter("sp_get_proj_members","?");
  // $db = $sel->Select("sp_dash_retrieve");


  if ($_SESSION['role'] == 'SUPERVISOR') {
  $db = $sel->Select("sp_dash_retrieve");






   }else {
  $sel->v01 = $_SESSION['id'];
  $db = $sel->Select_with_filter("sp_dash_users","?");

  }






  ?>




  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PMS | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- <style>
    .clone_container {
          display: inline-flex;
          border-right: 1px solid purple;
          padding-right: 4px;
      }

      .clone_container:last-child {
          border-right: none;
      }

    </style> -->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="dashboard.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>MS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Project</b>MS</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- Notifications: style can be found in dropdown.less -->

            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">

            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">Welcome, <?=$_SESSION['name'];?>! </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>

                    <?php $fname = $_SESSION['name'];
                          $lname = $_SESSION['name1'];
                          $c = $fname." ".$lname;
                          echo "$c";
                     ?> -

                     <?= $_SESSION['role']  ?>


                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat" onclick="return confirm('Do you want to logout your account?')" >Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p> <?php $fname = $_SESSION['name'];
                  $lname = $_SESSION['name1'];
                  $c = $fname." ".$lname;
                  echo "$c";
             ?></p>
             <?= $_SESSION['role']  ?>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->


        <ul class="sidebar-menu" data-widget="tree">

          <li class="header">MAIN NAVIGATION</li>
            <!-- SUPERVISOR NAV BAR -->
          <?php
            if ($_SESSION['role'] == 'SUPERVISOR') {
           ?>
          <li class="treeview" id="supervisor_pg">
            <a href="#">
              <i class="fa fa-fw fa-folder-o"></i> <span>Projects</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin/rp.php"><i class="fa fa-fw fa-folder-open-o"></i> Pending Projects</a></li>
              <li><a href="admin/projectstatus.php"><i class="fa fa-fw fa-thumbs-o-up"></i> Approved Projects</a></li>
              <li><a href="admin/disapprove.php"><i class="fa fa-fw fa-thumbs-o-down"></i> Disapproved Projects</a></li>
            </ul>
          </li>

        <?php }else { ?>

          <!-- SUPERVISOR NAV BAR -->

          <!-- FOR USER GUI projects-->
          <li id="staff_pg" class="treeview hidden">
            <a href="#">
              <i class="fa fa-fw fa-folder-o"></i> <span>Projects</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Projects Assigned</a></li>

            </ul>
          </li>
        <?php } ?>
          <!-- user gui projects -->

          <li>
            <a href="pp2.php">
              <i class="fa fa-fw fa-pencil-square-o"></i> <span> Create Project Portfolio</span>
            </a>
          </li>


        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        <p class="text-black text-center"><b>Project Monitoring System</b></p>
        </h1>
      </section>

      <!-- Main content -->
      <form class="" action="" method="post">
      <section class="content">

        <?php

          while($row_db = $db->fetch(PDO::FETCH_ASSOC)){  ?>

          <div class="box box-primary box-solid">
            <div class="box-header with-border bg-purple">
              <h1 class="box-title"><span class="glyphicon glyphicon-list-alt"> <?php echo $row_db['proj_title'] ?></span></h1>
            </div>

            <div class="row">

              <div class="col-md-2">

                <?php
                $sel->v01 = $row_db['proj_id'];
                $members = $sel->Select_with_filter("sp_get_proj_members","?");
                while($row_member = $members->fetch(PDO::FETCH_ASSOC)){
                ?>
                  <h4 align="justified">
                  <span class="glyphicon glyphicon-user"></span>
                  <?php echo $row_member['user_firstname'];?></h4>

                <?php
                  }
                ?>
              </div>




              <div class="col-md-2">
              <h4 class="text-center"><?php echo $row_db['proj_title'] ?></h4>
              </div>




              <div class="col-md-2">

                <div class="divider"></div>
              <h4 class="text-center"><span class="label label-danger">Plan</span></h4>
              </div>

              <div class="col-md-2">
              <h4 class="text-center"><span class="label label-success">Ongoing</span></h4>
              </div>

              <div class="col-md-2">
              <h4 class="text-center"><?php echo $row_db['proj_date_begin'] ?> to <?php echo $row_db['proj_date_end'] ?></h4>
              </div>

              <div class="col-md-2">
              <h4 class="text-center"><a href="view_details.php?proj_id=<?= $row_db['proj_id']; ?>"> View Details </a></h4>
              </div>


            </div>




            <div class="box-body">

            </div>
          </div>
           <?php } ?>







      </section>
    </form>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved. -->
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
    $(document).ready(function () {
      $('.sidebar-menu').tree()
    })
  </script>

  <script type="text/javascript">
    var type_supervisor = '[@authfield:SUPERVISOR]';
    var type_staff = '[@authfield:STAFF]';
  </script>

  <script type="text/javascript">
  if(type_supervisor == 'yes'){
    document.getElementById('supervisor_pg').style.display = 'none';
document.getElementById('supervisor_pg').style.display = 'block';
}else {
  document.getElementById('staff_pg').style.display = 'none';
document.getElementById('staff_pg').style.display = 'block';﻿
}

  </script>

  </body>
  </html>
