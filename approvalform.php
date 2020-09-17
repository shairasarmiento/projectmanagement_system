<?php
session_start();


 function checkStatus($check) {
                    $checkstring = "";

                    switch ($check) {
                      case '':
                        $checkstring = "Open";
                        break;
                      
                      default:
                        $checkstring = $check;
                        break;
                    }

                    return $checkstring;
                  }


$error="";
include_once 'objects/database.php';
include_once 'objects/Crud.php';



//initiate db
$db = new Database();

//call method
$conn = $db->getConnection();

$sel = new Crud($conn);

$retrieve = $sel->Select("sp_retrieve_project");

?>

<!DOCTYPE html>
	<header>
		<title>Information System Request Form</title>
	</header>
	
	<body>


			
			
		<div style="padding:10px">
			<h1>List of Projects</h1>
			<hr>
			

			
			<table border="1">
				<thead>
					<tr>
						<th>Project Control Number</th>
						<th>Project Title</th>
						<th>Project Request Date</th>
						<th>Project Request Type</th>
						<th>Project Description</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					
						//include ('objects/database.php');
						//include ('objects/Crud.php');
					
						while($row = $retrieve->fetch(PDO::FETCH_ASSOC)){
							echo "<tr>
									<td>".$row['proj_ctrlno']."</td>
									<td>".$row['proj_title']."</td>
									<td>".$row['proj_req_date']."</td>
									<td>".$row['proj_req_type']."</td>
									<td>".$row['proj_description']."</td>
									<td>".checkStatus($row['proj_status'])."</td>
	
                    </tr>
                    ";
						}	
					
					
					?>
					
				</tbody>
			</table>
			
			<hr>
			
				
	<a href="form.php"><button>Create new project</button></a>
			<a href="login.php"><button>Logout</button></a>
			
		</div>
		

	</body>
	
</html>