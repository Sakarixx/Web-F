<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g5";
$username_surachet = "surache1_room1g5";
$password_surachet = "YTZ15479";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);
$sid=$_GET['Id_member'];
 ?>
<html>
<head>

  <title="member">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="Text.css">
</head>
<body>
  <!-- 29-38 สำคัญ -->
  <section class="header">

       <nav class="navbar">
       <a href="#">home</a>
       <a href="#Booksss1">book</a>
   </nav>

<div id="menu-btn" class="fas fa-bars"></div>

</section>

<section class="home">


</section>

<!-- home section ends -->
<section class="Booksss" id="Booksss1" style="height:auto;">

  <section class="Booksss" id="Booksss1" style="height:auto;">
    <center>
    <table class="ta">
      <thead>
        <tr><th>Book name</th>
        <th>Picture Book</th>
      </tr></thead>
      <tbody>
                <tr>
            <td align="center">Dreamweaver CS6 Professional Guide</td>
            <td align="center"><img src="pic/3.jpg" width="50%"></td>
          </tr>
                <tr>
            <td align="center">ความลับที่คนอ่านหนังสือเท่านั้นจะรู้</td>
            <td align="center"><img src="pic/13.jpg" width="50%"></td>
          </tr>

  		</tbody>
    </table>

  <a href="selectBook.php?sid=23" class="btn"><h2>choose a book</h2></a>
  </center>


      <!-- โค้ด -->
      <?php
        $sql_1="SELECT name_book,pic FROM Member,Book,Member_Book WHERE  Member_Book.Id_member = '$' AND Member_Book.Id_book = Member.Id_member AND Member_Book.Id_book = Book.Id_book";
        $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
        while ($data_1 = mysql_fetch_array($qry_1)) {  ?>
        <tr>
          <td align="center"><?php echo $data_1['name_book'];?></td>
          <td align="center"><?php echo "<img src='pic/{$data_1['pic']}' width='50%'>";?></td>
        </tr>
      <?php } ?>

		</tbody>
  </table>

<a href="selectBook.php?sid=<?php echo $sid;?>"class="btn"><h2>เลือกหนังสือ</h2></button></a>
</center>
</section>


</body>
</html>
