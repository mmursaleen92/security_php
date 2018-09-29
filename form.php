<?php require"db_connection.php" ?>


<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<form method="post" action="">
	<label for="email">
		E-mail
	</label>
	<input type="email" name="email">
	<label for="password">
		Password
	</label>
	<input type="password" name="password">
	<input type="submit" name="done">
</form>
</body>
</html>
<?php
   if($_SERVER['REQUEST_METHOD'] == 'POST')
   {
   	$email = trim(strip_tags($_POST['email']));
      // $email = $_POST['email'];
   	$password = $_POST['password'];
  // 	echo "$email <br> $password ";
   	// Can DROP TABLE FROM FROM DATA BASE 
   	$query = $conn->query("SELECT * FROM users WHERE email = '$email'");
   	// ADD CHECK TO SECURE WEB APP
   	// 1- Prepare 
  	// $query = $con->prepare("SELECT * FROM users WHERE email = :email");
   	//     2- Execute
   	// $query->execute(['email' => $email]);
   //	$query = $conn->query("SELECT * FROM users WHERE email = '$email'");
   	if($query->rowCount())
   	{
   		echo 'We found you';
   	}
   	else
   	{
   		echo 'Sorry We not found you';
   	}
   }
   