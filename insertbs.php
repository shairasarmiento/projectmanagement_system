<?php

include_once 'objects/database.php';
include_once 'objects/Crud.php';


$db = new Database();
$conn = $db->getConnection();

$dml = new Crud($conn);

$dml->v01 = $_GET['proj_id'];

$retrieve = $dml->Select_with_filter("sp_retrieve_project_with_filter","?");

$row = $retrieve-> fetch(PDO::FETCH_ASSOC);


if(isset($_POST['submit'])){

	$dml->v01 = $_GET['proj_id'];
	$dml->v02 = $_POST['proj_ctrlno'];
	$dml->v03 = $_POST['proj_title'];
	$dml->v04 = $_POST['proj_req_date'];
  $dml->v05 = $_POST['proj_req_type'];
  $dml->v06 = $_POST['proj_description'];

	$result = $dml->UDI("sp_update","?,?,?,?,?,?");

	//return value
	if($result[0] === "00000"){
		header("location:../admin/projectstatus.php");
	}else{
		echo "";
	}
}


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
  <form action="create_project.php" method="POST">
        <div class="modal-body">

                  <div class="form-group">
                    <label>Control Number</label>
                    input type="type" class="form-control" name="proj_ctrlno" value="<?php echo $row['proj_ctrlno'] ?>">
                  </div>

                  <div class="form-group">
                    <label>Project Request Date</label>
                    <input type="date" name="proj_req_date" value="<?php echo $row['proj_req_date'] ?>">
                  </div>

                  <div class="form-group">
                    <label>Project Title</label>
                    <input type="text" class="form-control" name="proj_title" value="<?php echo $row['proj_title'] ?>">
                  </div>

                  <div class="form-group">
                    <label>Project Request Type</label>
                    <input type="text" class="form-control" name="proj_req_type" value="<?php echo $row['proj_req_type'] ?>">
                  </div>

                  <div class="form-group">
                    <label>Project Description</label>
                    <input type="text" class="form-control" name="proj_description" value="<?php echo $row['proj_description'] ?>">
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary" value="Update">Submit</button>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#projectaddModal">
          ADD DATA
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
