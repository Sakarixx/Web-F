<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_631003";
$username_surachet = "surache1_631003";
$password_surachet = "II9325JC";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

$strSQL = "SELECT tbl_lab7.* FROM tbl_lab7
                            WHERE Sname = '".mysql_real_escape_string($_POST['Username'])."' and SID = '".mysql_real_escape_string($_POST['Password'])."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
    echo "";
}
else
{

  $_SESSION['SID'] = $objResult['SID'];
  $_SESSION['Sname'] = $objResult['Sname'];

  session_write_close();

      header("location:form_member.php");
    }

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

  <form action="" class="" method="POST"  name="">

  <fieldset><legend><font color="#0000FF"><b>ล็อกอิน</b></font></legend>
    <table width="60%" border="0" cellpadding="5" cellspacing="0">


      <tr>
        <td>Username</td>
        <td align="left"><input type="text" name="Username" size="50" maxlength="50"></td>
     </tr>
     <tr>
       <td>Password</td>
       <td align="left"><input type="text" name="Password" size="50" maxlength="50"></td>
    </tr>


  	<tr>
  	  <td colspan = "2" align="center">
            <input type="hidden" name="InsertNewStudent" value="Yes">
            <input type="submit" name="submit" value ="Submit">
            <input type="reset" name="reset" value="&nbsp;Reset&nbsp;"></td>
      </tr>
    </table>
    <hr width="60%" color="red">
  </fieldset></form>
  </center>
  </body>
</html>
