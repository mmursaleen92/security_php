<?php require "../db_connection.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Comment</title>
</head>
<body>
   <form method="post" action="">
   <label for="name">
   	Name
   </label>
   <input type="text" name="name"><br /><br />
   <label>
   	Comment
   </label>
   <textarea name="comment">
   	
   </textarea><br /><br />
  
   <input type="submit" name="done">
   </form>
   
</body>
</html>
<?php

   if(isset($_POST['done']))
   {
   	$name = $_POST['name'];
   	$comment = $_POST['comment'];

   	   $query = $conn->prepare("INSERT INTO comment(name,comment) VALUES(:name,:comment)");
   	   // $query .="VALUES (:name,:comment)";
   	   $query->execute(['name' => $name, 'comment' => $comment]);



   }