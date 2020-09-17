<?php

include_once 'objects/database.php';
include_once 'objects/Crud.php';

//initiate db
$db = new Database();

//call method
$conn = $db->getConnection();

$sel = new Crud($conn);

$retrieve = $sel->Select("sp_ret_users");

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Assign</title>
  </head>
  <body>
    <form name="am.php" action="index.html" method="post">
      <select>
        <?php
        while($row = $retrieve->fetch(PDO::FETCH_ASSOC))
        {
          ?>

            <option><?php echo $row['user_firstname']; ?> </option>
        <?php
        }
        ?>

      </select>

    </form>

  </body>
</html>
