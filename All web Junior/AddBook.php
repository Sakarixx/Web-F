<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g5";
$username_surachet = "surache1_room1g5";
$password_surachet = "YTZ15479";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertNewStudent"] == "Yes") {


$name=$_POST['name'];
$file=$_POST['file'];

$locate_img ="pic/";

// Insert File

	$filenames = $_FILES["file"]["name"];

  $allowedExts = array("doc", "docx", "pdf", "gif", "jpeg", "jpg", "png","xls","xlsx");
  $extension = end(explode(".", $_FILES["file"]["name"]));
  if (($_FILES["file"]["type"] == "application/pdf")
  || ($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/jpg")
  || ($_FILES["file"]["type"] == "application/msword")
  || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
  || ($_FILES["file"]["type"] == "image/pjpeg")
  || ($_FILES["file"]["type"] == "image/x-png")
  || ($_FILES["file"]["type"] == "image/png")
  || ($_FILES["file"]["type"] == "application/vnd.ms-excel")
  || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
  && in_array($extension, $allowedExts))

	{
	if ($_FILES["file"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{

	if (file_exists($locate_img . $_FILES["file"]["name"]))

	  {
	  echo $_FILES["file"]["name"] . " already exists. ";
	  }

	else
	  {
	  move_uploaded_file($_FILES["file"]["tmp_name"],$locate_img.$_FILES["file"]["name"]);


	  echo "Stored in: " . $locate_img . $_FILES["file"]["name"];
	  }

	 }
	 }
	else
	{
	echo "Invalid file";
	 }

// End Insert File

$sql = "INSERT INTO Book (name_book,pic) VALUES ('$name','$filenames')";
$dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

header("location:Book.php");
}

 ?>

<html>
<head>
	<title="Student">
  <link rel="stylesheet" href="stylenav.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <title>เพิ่มหนังสือ</title>
</head>
<body>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-group" method="POST" enctype="multipart/form-data" >
		<div class="container">
			<center>
	<table style="width:50%;margin-top:100px;">
		<thead>
    <tr>
      <td>ชื่อหนังสือ</td>
      <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td>ชื่อหนังสือ</td>
      <td align="left"><input class="w3-input" type="file" name="file" id="file"></td>
    </tr>
    <tr>
    <td colspan = "2" align="center">
            <input type="hidden" name="InsertNewStudent" value="Yes">
            <a href="Book.php"><button  onclick="Book.php">Back</button></a>
            <input type="reset" name="reset" value="&nbsp;Reset&nbsp;">
					<input type="submit" name="submit" value ="Submit"></td>


    </tr>
  </table>
</form>
</body>

</html>
