<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <h3>Students' Record</h3>

  <?php
  $initial=$_POST['initial'];
  $name=$_POST['name'];
  $id=$_POST['id'];
  $school=$_POST['school'];
  $email=$_POST['email'];
  $initial=$_POST['initial'];
  $date = date("H:i, jS F, Y.");

    switch ($school){
  	  case '1' :
  		  $s = "Electrical Engineering";
        break;
      	  case '2' :
      		  $s = 'Computer Engineering';
      		  break;
      	  case '3' :
      		  $s = 'Civil Engineering';
      		  break;
        }

        echo "Time processed at ";
        echo "$date<br>";
        echo "Name: $initial.$name<br>";
        echo "ID: $id<br>";
        echo "School: $s<br>";
        echo "Email: $email";
        ?>
        </body>

      </html>
