<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g5";
$username_surachet = "surache1_room1g5";
$password_surachet = "YTZ15479";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["search"] == "Yes")
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $sql_1 = "SELECT Id_book,name_book FROM Book WHERE CONCAT(`Id_book`, `name_book`) LIKE '%".$valueToSearch."%'";

}
else {
  $sql_1 = "SELECT Id_book,name_book FROM Book ORDER BY Id_book ASC";
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["DeleteStudent"] == "Yes") {

$sid=$_POST['sid'];

$sql = "DELETE FROM Book WHERE Id_book ='$sid'";
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
</head>
<body>
  <header>
    <div class="navbar">
  <a class="active" href="index1.php"><i class="fa fa-fw fa-home"></i>Home</a>
  <a href="#"><i class="fa fa-fw fa-user"></i>หนังสือ</a>
  <div class="search-container">
      <form style="margin:0px;" class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="search">
        <input type="text" name="valueToSearch" placeholder="Search..">
        <input type="hidden" name="search" value="Yes" />
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
</div>

  </header>
  <a href="AddBook.php"><button class="btn" onclick="AddBook.php">+ หนังสือ</button></a>
  <div class="container">
    <center>
	<table style="width:40%;margin-top:50px;">
		<thead>
			<tr>
				<th>ID</th>
        <th>Book</th>
        <th></th>
        <th></th>
			</tr>
		</thead>
		<tbody>
      <?php
        $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
        while ($data_1 = mysql_fetch_array($qry_1)) {  ?>
        <tr>
          <td><?php echo $data_1['Id_book']; ?></td>
          <td><?php echo $data_1['name_book']; ?></td>
          <td><a href="showbook.php?sid=<?php echo $data_1['Id_book']; ?>"><button class="ShowBook">แสดงหนังสือ</button></a></td>
          <td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST" name="Delete">
            <div class="w3-col" style="width:100%;" align="center">
            <input class="w3-button w3-red" type="submit" name="button" id="button" value="ลบ" />
            <input type="hidden" name="sid" value="<?php echo $data_1['Id_book']; ?>" />
            <input type="hidden" name="DeleteStudent" value="Yes" />
            </div>
          </form></td>
        </tr>
      <?php } ?>

		</tbody>
	</table>
</center>
</div>
</body>
</html>
