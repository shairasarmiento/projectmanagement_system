<?php
session_start();




include_once 'objects/database.php';
include_once 'objects/Crud.php';


$db = new Database();
$conn = $db->getConnection();


if(isset($_SESSION['email']) == TRUE){


?>


<!DOCTYPE html>
<header>
	<title> Create Project </title>
</header>

<body>
	<div style="padding:10px">


   <body>
       <form method="POST" action="redirect/create_project.php">
        <div>
        </div>
        <h2 align="center"> Information System Request Form</h2>
        <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">
           <tr>
                  <td  align="right" class="style1">Control Number:</td>
                  <td class="style1"><input type="text" name="proj_ctrlno" /></td>
           </tr>
           <tr>
                  <td align="right">Request Date:</td>
                  <td><input type="date" name="proj_req_date" /></td>
           </tr>
           <tr>
                  <td align="right">Project Title:</td>
                  <td><input type="text" name="proj_title" /></td>
           </tr>

           <tr>
                 <br> <td align="right">Type of Request</td>

         <br><td><input type="radio" name="type" value="implementation">Portal/Web/Application Systems development and implementation
            <br><input type="radio" name="type" value="enhancement"> System Enhancement
            <br><input type="radio" name="type" value="awareness">Training/Awareness
            <br> <input type="radio" name="type" value="reenginering">Systems Re-Engineering
			<br><input type="radio"name="type" value="setup">Systems Setup and Configuration
			<br><input type="radio" name="type" value="formulation">Terms of Reference Formulation
			<br><input type="radio" name="type" value="maintenance" />Systems Maintenanance
            </td>
           </tr>

       <tr>
              <td align="right">Project Description:</td>
              <td><textarea rows="3" cols="15" type="text" name="proj_description"></textarea>

        </td>
		<td>
		<input type="hidden" name="proj_status">
		</td>
       </tr>
       <tr>


            <tr>
            <td> <input type="submit" name="submit" value="Insert" align="center"/>
            </td>
            </tr>
    </table>
        </form>
    </body>
	</html>

<?php
}else{

}
?>
