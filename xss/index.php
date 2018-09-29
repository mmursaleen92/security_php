<?php require "../db_connection.php" ?>
<?php
    $commentObject = $conn->query("SELECT * FROM comment");
    $commentObject -> setfetchMode(PDO::FETCH_OBJ);
?>
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
   <table>
   <thead>
   <tr>
   <th>Name</th>
   <th>Comment</th>
   </tr>
   </thead>
   <tbody>
      <tr>
      <td>
      <?php
    //   while($comment = $commentObject->fetch())
    //   {

    //      echo "$comment->name <br />";
    //     // echo "$comment->comment <br />";

    //   }
         ?>
         </td>
         <td>
         <?php
         while($comment = $commentObject->fetch())
         {

         
            echo "$comment->comment <br />";
        }
         ?>
         </td>
         
      </tr>
   </tbody>
   </table>
   
</body>
</html>
<?php

   if(isset($_POST['done']))
   {
   	$name = trim(strip_tags($_POST['name']));
   	$comment = mysqli_real_escape_string($conn,$_POST['comment']);

   	   $query = $conn->prepare("INSERT INTO comment(name,comment) VALUES(:name,:comment)");
   	   // $query .="VALUES (:name,:comment)";
   	   $query->execute(['name' => $name, 'comment' => $comment]);

 }