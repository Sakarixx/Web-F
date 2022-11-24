<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_631003";
$username_surachet = "surache1_631003";
$password_surachet = "II9325JC";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  </head>

  <body><center>

    <?php
    $sid=$_SESSION['SID'];
    $sql_1="SELECT tbl_lab7.* FROM tbl_lab7 WHERE SID='$sid'";
    $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
    $data_1 = mysql_fetch_array($qry_1);  ?>

    <div class="">
      <?php echo "สวัสดีคุณ".$data_1['Sname']; ?>
    </div>
  </center>
  </body>
</html>
