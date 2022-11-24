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
  </head>
  <body>

<?php  $sql_1 = "SELECT ID_นักศึกษา,ชื่อ,นามสกุล FROM student";
       $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
       $row_total= mysql_num_rows($qry_1);

while ($data_1 = mysql_fetch_array($qry_1)) { ?>
<div class=""><?php echo $data_1['ID_นักศึกษา']; ?> <?php echo $data_1['ชื่อ']; ?> <?php echo $data_1['นามสกุล']; ?></div>
<?php } ?>

จำนวนนักศึกษา ทั้งสิ้น <?php echo $row_total; ?>

  </body>
</html>
