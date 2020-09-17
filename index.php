<?php
session_start();


include_once 'objects/database.php';
include_once 'objects/Crud.php';


$db = new Database();
$conn = $db->getConnection();


if(isset($_SESSION['user_email']) == TRUE){
	
	if(isset($_POST['submit'])==TRUE){
	$check = new Crud($conn);
	
	$check->v01 = $_POST['proj_ctrlno'];
	$check->v02 = $_POST['proj_title'];
	$check->v03 = $_POST['proj_reqdate'];
	$check->v04 = $_POST['proj_reqtype'];
	$check->v05 = $_POST['proj_description'];
	
			
	$result = $check->UDI("sp_insert","?,?,?,?,?");
	
	//return value
	if($result[0] === "00000"){
		header("location:index.php");
	}else{
		echo $result[0];
	}
	
	}
	
}

?>



<!DOCTYPE html>
<header>
	<title> Create Project </title>
</header>

<body>
	<div style="padding:10px">
	<h1> Create New Project </h1>
	<hr>
<form method="POST" action="redirect/create_project.php">
	
	Control No <textarea name="project_ctrlno"></textarea>
	<br>
	Project Title <textarea name="proj_title"></textarea>
	<br>
	Request Date <input type="date" name="proj_reqdate">
	<br>
	Type of Request <br> <input type="radio" name="type" value="new"> Portal/Web/Application Systems development and implementation
	<br>
	<input type="radio" name="type" value="enhancement"> System Enhancement
	<input type="radio" name="type" value="awareness"> Training/Awareness
	<input type="radio" name="type" value="reengineering"> Systems Re-Engineering
	<input type="radio" name="type" value="setup"> Systems Setupp and Configuration
	<input type="radio" name="type" value="formulation"> Terms of Reference Formulation
	<input type="radio" name="type" value="maintenance"> Systems Maintenanance
	Project Description <textarea name="proj_desctiption"></textarea>
	<br>
	
	<input type="submit" name="submit" value="Insert">
	
</form>
</div>
</body>
</html>

// <?php	
// }else{
	// echo "Login ka muna gamit account mo";
// }



// ?>


