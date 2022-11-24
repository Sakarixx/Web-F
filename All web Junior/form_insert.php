<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_631003";
$username_surachet = "surache1_631003";
$password_surachet = "II9325JC";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertNewStudent"] == "Yes") {


$initial=$_POST['initial'];
$name=$_POST['name'];
$faculty=$_POST['faculty'];
$department=$_POST['department'];
$check1=$_POST['check1'];
$check2=$_POST['check2'];
$check3=$_POST['check3'];
$email=$_POST['email'];

$sql = "INSERT INTO tbl_lab7 (Title,Sname,FacultyID,Department,Check1,Check2,Check3,Email) VALUES ('$initial','$name','$faculty','$department','$check1','$check2','$check3','$email')";
$dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

header("location:lab7menu.php");

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

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="">

  <fieldset><legend><font color="#0000FF"><b>เพิ่มนักศึกษาใหม่</b></font></legend>
    <table width="60%" border="0" cellpadding="5" cellspacing="0">
      <tr bgcolor= "#0066ff">
  	  <td colspan="2" align="center"><font color="white"><b>ประวัตินักศึกษา</b></font>
  	  </td>
      </tr>
  	<tr>
  	  <td>คำนำหน้า</td>
  	  <td align="left">
            <input type="radio" name="initial" value="1" checked>นาย
            <input type="radio" name="initial" value="2">นางสาว
  	  </td>
      </tr>

      <tr>
        <td>ชื่อ</td>
        <td align="left"><input type="text" name="name" size="50" maxlength="50"></td>
     </tr>

     <tr>
          <td>คณะ</td>
       <td>
         <select class="w3-border" name="faculty" style="width:50%;height:32px;">
         <option value="">เลือกสาขา</option>
         <?php
         $sql_1="SELECT tbl_faculty.* FROM tbl_faculty";
         $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
         $data_1 = mysql_fetch_array($qry_1);

         do {  ?>

         <option value="<?php echo $data_1['FacultyID']?>"><?php echo $data_1['Faculty']?></option>

         <?php
         } while ($data_1 = mysql_fetch_assoc($qry_1));
           $rows = mysql_num_rows($qry_1);
           if($rows > 0) {
           mysql_data_seek($qry_1, 0);
           $data_1 = mysql_fetch_assoc($qry_1);
         } ?>
         </select>

       </td>
        </tr>




  	<tr>
        <td>สาขา</td>
  	  <td>
            <select name="department">
                 <option value="1">วิทยาการคอมพิวเตอร์
                 <option value="2">สิ่งแวดล้อม
                <option value="3">วัสดุศาสตร์
            </select>
  	  </td>
      </tr>

      <tr>
    	  <td>อุปกรณ์ที่ใช้งาน</td>
    	  <td align="left">
              <input type="checkbox" name="check1" value="1" checked>PC
              <input type="checkbox" name="check2" value="1">Notebook
              <input type="checkbox" name="check3" value="1">Tablet
    	  </td>
        </tr>

  	<tr>
        <td>อีเมล์</td>
        <td align="left"><input type="text" name="email" size="50" maxlength="50"></td>
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
