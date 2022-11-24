<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g5";
$username_surachet = "surache1_room1g5";
$password_surachet = "YTZ15479";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["login"] == "Yes") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $strSQL = "SELECT * FROM Member WHERE (username = '$username' OR email = '$username') AND password = '$password'";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);

  if(!$objResult)
	{
			echo "Username or Password Incorrect!";
	}
	else
	{
			$_SESSION["UserID"] = $objResult["Id_member"];
			$_SESSION["Status"] = $objResult["member_type"];

			session_write_close();

			if($objResult["member_type"] == 1)
			{
				header("location:index1.php");
			}
			else
			{
				header("location:member.php?sid=".$objResult['Id_member']);
			}
	}
}
?>

<html>

<body>
  <div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="login" class="box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <h2>Log in</h2>
      <input type="text" name="username" id="username" required placeholder="Username or Email" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" id="password" required placeholder="Passsword" id="pwd" autocomplete="off">
        <input type="submit" value="Sign in" class="btn1">
        <input type="hidden" name="login" value="Yes" />
      </form>
        <center><br><br><a href="register.php" class="dnthave">Sign up</a></center>
  </div>

</div>

<script>
var pwd = document.getElementById('pwd');
var eye = document.getElementById('eye');

eye.addEventListener('click',togglePass);

function togglePass(){

   eye.classList.toggle('active');

   (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
}

// Form Validation

function checkStuff() {
  var email = document.form1.email;
  var password = document.form1.password;
  var msg = document.getElementById('msg');

  if (email.value == "") {
    msg.style.display = 'block';
    msg.innerHTML = "Please enter your email";
    email.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }

   if (password.value == "") {
    msg.innerHTML = "Please enter your password";
    password.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!re.test(email.value)) {
    msg.innerHTML = "Please enter a valid email";
    email.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
}
</script>
</body>
</html>
