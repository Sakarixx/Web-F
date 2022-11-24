<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g5";
$username_surachet = "surache1_room1g5";
$password_surachet = "YTZ15479";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);
$sid=$_GET['sid'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["EditStudent"] == "Yes") {
  $sid=$_POST['sid'];
  $name=$_POST['name_std'];
  $surname=$_POST['last_std'];
  $email=$_POST['email'];
  $book=$_POST['book'];
  $sql=" UPDATE Student SET name_std='$name',last_std='$surname',email='$email',book='$book'
         WHERE Id_std ='$sid'";
  $dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

  header("location:index.php");

  }

?>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="">
<center>
  <?php
  $sql_2="SELECT * FROM Student WHERE 	Id_std ='$sid'";
  $qry_2 = mysql_query($sql_2,$surachet) or die(mysql_error());
  $data_2 = mysql_fetch_array($qry_2);
  ?>

    <table border="0" style="width:60%;">
    <tr>
        <td>ชื่อ-นามสกุล</td>
        <td><input type="text" placeholder="ชื่อ" id="Name" name="Name" value="<?php echo $data_2['name_std']?>">
          <input type="text" placeholder="นามสกุล" id="Surname" name="Surname" value="<?php echo $data_2['last_std']?>"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" placeholder="email" id="email" name="email" maxlength="10" value="<?php echo $data_2['email']?>"></td>
      </tr>
      <tr>
        <td>เลือกหนังสือที่ชอบ</td>
        <td>
          <select name="book">
          <option>เลือกหนังสือ</option>
          <?php
           $sql_1="SELECT * FROM Book";
           $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
           $data_1 = mysql_fetch_array($qry_1);
           do {  ?>
           <option value="<?php echo $data_1['Id_book']?>" <?php if (!(strcmp($data_1['Id_book'], $data_2['Id_book']))) {echo "selected=\"selected\"";} ?> > <?php echo $data_1['name_book']?> </option>

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
  	  <td colspan = "2" align="center">
        <input type="hidden" name="sid" value="<?php echo $data_2['ID']; ?>">
<input type="hidden" name="EditStudent" value="Yes">
<input type="submit" name="submit" value ="Submit">
<input type="reset" name="reset" value="&nbsp;Reset&nbsp;"></td>

      </tr>

      </table>
  </center>
</body>
</html>
