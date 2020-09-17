<?php

include_once 'objects/database.php';
include_once 'objects/Crud.php';

//initiate db
$db = new Database();

//call method
$conn = $db->getConnection();

$sel = new Crud($conn);


/// for System Analyst
$retrieve = $sel->Select("sp_ret_users");
// $select = $sel->Select("sp_ret_task");

//for system developer 1
$retrieve1 = $sel->Select("sp_ret_users");
// $retrieve1 = $sel->Select("sp_ret_task");
// //
// //for system developer 2
$retrieve2 = $sel->Select("sp_ret_users");
// // $retrieve2 = $sel->Select("sp_ret_task");

//for system developer 3
$retrieve3 = $sel ->Select("sp_ret_users");

//for system developer 4
$retrieve4 = $sel ->Select("sp_ret_users");



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale-1.0">
  <title> Insert </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  <!-- Modal -->
  <div class="modal fade" id="projectaddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Assign Project Members</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
  <form action="task_users.php" method="POST">
        <div class="modal-body">

                <div class="form-group">
                <label>System Analyst</label>
                <div class="select">
                  <select class="form-control" style="width: 100%;">
                    <?php
                    while($row = $retrieve->fetch(PDO::FETCH_ASSOC))
                    {
                      ?>
                        <option value="user_firstname"><?php echo $row['user_firstname']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
            </div>
            </div>

            <div class="form-group">
            <label>System Developer 1</label>
            <div class="select">
              <select class="form-control" style="width: 100%;">
                <?php
                while($row = $retrieve1->fetch(PDO::FETCH_ASSOC))
                {
                  ?>
                    <option value="user_firstname"><?php echo $row['user_firstname']; ?></option>
                <?php
                }
                ?>
              </select>
              </div>
            </div>

            <div class="form-group">
            <label>System Developer 2</label>
            <div class="select">
              <select class="form-control" style="width: 100%;">
                <?php
                while($row = $retrieve2->fetch(PDO::FETCH_ASSOC))
                {
                  ?>
                    <option value="user_firstname"><?php echo $row['user_firstname']; ?></option>
                <?php
                }
                ?>
              </select>
              </div>
              </div>

              <div class="form-group">
              <label>System Developer 3</label>
              <div class="select">
                <select class="form-control" style="width: 100%;">
                  <?php
                  while($row = $retrieve3->fetch(PDO::FETCH_ASSOC))
                  {
                    ?>
                      <option value="user_firstname"><?php echo $row['user_firstname']; ?></option>
                  <?php
                  }
                  ?>
                </select>
          </div>
          </div>

          <div class="form-group">
          <label>System Developer 4</label>
          <div class="select">
            <select class="form-control" style="width: 100%;">
              <?php
              while($row = $retrieve4->fetch(PDO::FETCH_ASSOC))
              {
                ?>
                  <option value="user_firstname"><?php echo $row['user_firstname']; ?></option>
              <?php
              }
              ?>
            </select>
      </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Save data</button>
        </div>
</form>
      </div>
    </div>
  </div>



<div class="container">
  <div class="jumbotron">
    <div class="card">
      <h2>PHP CRUD POP UP MODAL</h2>
    </div>
    <div class="card">
      <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#projectaddModal">
          Primary
        </button>



      </div>
    </div>
  </div>
</div>








<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
