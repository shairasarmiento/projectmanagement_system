<?php
session_start();




include_once 'objects/database.php';
include_once 'objects/Crud.php';


$db = new Database();
$conn = $db->getConnection();
$sel = new Crud($conn);

// $retrieve = $sel->Select("sp_increment");
// $sel->v01=$_POST['proj_id'];

$retrieve = $sel->Select("sp_ret_office");

$increment = $sel->Select("sp_increment");

$row = $increment->fetch(PDO::FETCH_ASSOC);





?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project Portfolio</title>
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
          <li class="dropdown messages-menu">

            <ul class="dropdown-menu">

              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>

                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">

            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">


            <li><a href=""><i class="fa fa-circle-o"></i> Projects Assigned </a></li>


          </ul>

        </li>

        <li><a href=""><i class="fa fa-book"></i> <span>Create Project Portfolio</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
<form role="form" method="POST" action="redirect/create_project_user.php">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <p><b> Project Portfolio </b></p>

      </h1>

    </section>

    <!-- Main content -->

    <section class="content">

      <div class="col-lg-12">
        <!-- general form elements -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><b> Project Data</b></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
      <!-- <form role="form" method="POST" action="redirect/create_project.php"> -->
            <div class="box-body">

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for=""> Project Code:</label>
                    <input type="text" name="proj_code" class="form-control" id="proj_code" value="" >

                  </div>


                  <div class="col-md-6">
                    <label>Request Date:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="proj_req_date" class="form-control pull-right" id="datepicker" required>
                    </div>
                  </div>


                  </div>
              </div>

              <div class="form-group">
                <label for="">Project Title:</label>
                <input type="text" name="proj_title" class="form-control" id="" style="width: 100%;" placeholder="Enter project title" required>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>Type of Request:</label>
                    <select name="proj_request_type" class="form-control select2" style="width: 100%;" required>
                      <option value="" disabled selected>Choose Type of Request</option>
                      <option value="System Enhancement">Systems Enhancement</option>
                      <option value="Systems Development">Systems Developement</option>
                      <option value="Training Awareness">Training/Awareness</option>
                      <option value="Systems Reengineering">Systems Re-engineering</option>
                      <option value="Systems Setup">Systems Setup</option>
                      <option value="Terms of Reference Formualation">Terms of Reference Formualation</option>
                    </select>
                    </div>

                    <div class="col-md-6">
                      <label>Project Type:</label>
                      <select name="proj_type" class="form-control select2" style="width: 100%;" required>
                        <option value="" disabled selected>Choose Project Type</option>
                        <option value="In-Housed">In-Housed</option>
                        <option value="Collaboration">Collaboration</option>
                        <option value="Outsourced">Outsourced</option>
                        <option value="Managed">Managed</option>
                      </select>
                      </div>
                </div>
              </div>


              <div class="form-group">
                <label>Project Description:</label>
                <textarea class="form-control" name="proj_description" rows="2" placeholder="Enter the description of the project ..." required></textarea>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Cost:</label>
                        <input type="number" name="proj_cost" class="form-control" id="" placeholder="Enter project cost">
                      </div>
                    </div>

                  <div class="col-md-4">
                    <label>Coding Scale:</label>
                    <select id="proj_coding_scale" name="proj_coding_scale" class="proj_coding_scale" style="width: 100%;" onChange="return setScale()" required>
                      <option scale="0" value="Choose Coding Scale">Choose Coding Scale</option>
                         <option scale="Simple" value="Simple">Simple</option>
                         <option scale="Average" value="Average">Average</option>
                          <option scale="Complex" value="Complex">Complex</option>
                    </select>
                    </div>

                    <div class="col-md-4">
                      <label>Funding Source:</label>
                      <select  name="proj_funding_source" class="form-control select2" style="width: 100%;" required>
                        <option value="" disabled selected>Choose Funding Source</option>
                        <option value="MITHI">MITHI</option>
                        <option value="Regular">Regular</option>
                        <option value="Others">Others</option>
                      </select>
                      </div>
                </div>
              </div>


            </div>

        </div>

        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"> Project Roles</h3>
                </div>

            <div class="box-body">

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Project Sponsor:</label>
                    <input type="text" name="proj_sponsor" class="form-control" id="" placeholder="Enter project sponsor " required>
                  </div>

                  <div class="col-md-6">
                    <label for="">Email Address:</label>
                    <input type="email" name="proj_email" class="form-control" id="" placeholder="Enter email address" required>
                  </div>
                </div>
              </div>



              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>Office/Group</label>
                    <select name="proj_office" class="form-control select2" value="proj_office" style="width: 100%;" required>
                          <option value="pick">Choose Office:</option>
                          <?php
                        while($row_office = $retrieve->fetch(PDO::FETCH_ASSOC)){
                          echo "<option value='". $row_office['office_name']."'> " .$row_office['office_name'] ."</option>" ;

                        // <input type='' name='user".$row_users['user_id'].">

                          }
                          ?>
                          </select>
                    </div>

                    <div class="col-md-6">
                      <label for="">Point Person:</label>
                      <input type="text" name="proj_point_person" class="form-control" id="" placeholder="Enter point person" required>
                    </div>
                </div>
              </div>


            </div>

        </div>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"> Project Duration</h3>
          </div>

            <div class="box-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label for="">Days:</label>
                    <input type="text" name="proj_days" class="form-control" id="proj_days">
                  </div>

                  <div class="col-md-4">
                    <label for="">Date Begin:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="proj_date_begin"  id="proj_date_begin" required>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label for="">Date End:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="proj_date_end" id="proj_date_end" required>
                    </div>
                  </div>

                  <td>
                  <input type="hidden" name="proj_status">
                  </td>

                </div>
              </div>

            </div>


        </div>


      </div>
      <div class="row">

        <div class="col-md-2">
          <!-- <button type="submit" name="submit" value="Insert" class="text-center btn btn-primary">Submit</button> -->
        </div>

        <div class="col-md-4">
          <button type="submit" name="submit" value="Insert" class="text-center btn btn-primary" onClick="confSubmit(this.form);" style="width: 70%">Submit</button>
        </div>

        <div class="col-md-4">
              <button value="Refresh Page" onClick="window.location.reload();" type="cancel" class="text-center btn btn-primary" style="width: 70%">Cancel</button>
        </div>

        <div class="col-md-2">
          <!-- <button type="submit" name="submit" value="Insert" class="text-center btn btn-primary">Submit</button> -->
        </div>


      </div>


    </section>

    <!-- /.content -->
  </div>
    </form>
  <!-- /.content-wrapper -->


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

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
function setScale(){
    var ddl = document.getElementById("proj_coding_scale");
    var selectedOption = ddl.options[ddl.selectedIndex];
    var scaleValue = selectedOption.getAttribute("scale");
    var textBox = document.getElementById("proj_days");
    if(scaleValue=="Simple"){
    	textBox.value = "30";
    }
    else if(scaleValue=="Average"){
    	textBox.value = "60";
    }
    else if(scaleValue=="Complex"){
    	textBox.value = "100";
    }
}
</script>



<script>

$(document).ready(function(){
     $("#proj_date_begin").removeClass('hasDatepicker').datepicker(
        {
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            onSelect: function(selectedDate)
            {
                var d = new Date( selectedDate );

                if($('.proj_coding_scale').val() == 'Simple')
                {
                    d.setMonth( d.getMonth( ) + 1 );
                }

                if($('.proj_coding_scale').val() == 'Average')
                {
                  d.setMonth( d.getMonth( ) + 2 );
                }

                if($('.proj_coding_scale').val() == 'Complex')
                {
                    d.setMonth( d.getMonth( ) + 4 );
                }

                year = d.getFullYear();
                month = ("0" + (d.getMonth() + 1)).slice(-2);
                date = ("0" + d.getDate()).slice(-2);

                proj_date_end = year +'-'+month+'-'+date;

                $('#proj_date_end').val(proj_date_end);
            }
        });

});
</script>
<!--
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script> -->

<script>
var someInput = document.querySelector('#proj_code');
someInput.addEventListener('input', function () {
  someInput.value = someInput.value.toUpperCase();
});
</script>


<script type="text/javascript">

function confSubmit(form) {
if (confirm("Are you sure you want to submit the form?")) {
  alert("Wait for the approval of the supervisor!");
form.submit();

}

else {
alert("You decided to not submit the form!");
}
}
</script>
</body>
</html>
