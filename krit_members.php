<?php
  session_start();

  include_once 'objects/database.php';
  include_once 'objects/Crud.php';

  $db = new Database ();
  $conn = $db->getConnection();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Project Management System | Registration Page</title>
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
   <!-- iCheck -->
   <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 </head>
 <form method="POST" action="redirect/create_user.php">
 <body class="hold-transition register-page">
 <div class="register-box">
   <div class="register-logo">
     <a href="index2.html">Project Management System</a>
   </div>
  <form action="index.html" method="post">
 <label>Select Position in the Project</label>
       <div class="row">
         <div class="col-m-4">
           <select name="user_position"  class="form-control">
             <option value="" disabled selected>Choose Role</option>
             <option value="SYSTEM ANALYST">SYSTEM ANALYST</option>
             <option value="SYSTEM DEVELOPER">SYSTEM DEVELOPER</option>
             </select>
           </div>

             <br>
             <div class="col-m-4">
             <label>Select Member</label>
             <select class="form-control" name="user_name">
              <?php
              $sel = new Crud($conn);
                $retrieve = $sel->Select("sp_ret_users");
              ?>

              <?php
                while ($row = $retrieve->fetch(PDO::FETCH_ASSOC))
                {
                  ?>
                  <option value="user_firstname"><?php echo $row['user_firstname']; ?></option>
              <?php
                }
               ?>

             </select>
           </div>

            <br>
           <!-- <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Register</button> -->
         <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat" >Add</button
         </div>
         <!-- /.col -->
       </div>

     </form>

   </div>
   <!-- /.form-box -->
 </div>
 <!-- /.register-box -->

 <!-- jQuery 3 -->
 <script src="bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- iCheck -->
 <script src="plugins/iCheck/icheck.min.js"></script>
 <script>
   $(function () {
     $('input').iCheck({
       checkboxClass: 'icheckbox_square-blue',
       radioClass: 'iradio_square-blue',
       increaseArea: '20%' /* optional */
     });
   });
 </script>
 </body>
 </html>
