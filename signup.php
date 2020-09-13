<?php 

include_once 'system/Database.php';

if(isset($_POST['email'])){
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  try{
    $sqlInsert = "INSERT INTO users (username, email, password, signup_date) VALUES (:username, :email, :password, now())";

    $statement = $db->prepare($sqlInsert);
    $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

    if($statement->rowCount() == 1){
      $result = "<p style='padding: 20px; color: green;'> Registration Succesful </p>";
    }

  }catch (PDOException $ex){
    $result = "<p style='padding: 20px; color: red;'> An Error Has Occurred: ".$ex->getMessage()."</p>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>
  <h2>User Authentication System </h2><hr>

  <h3>Registration Form</h3>

  <?php if(isset($result)) echo $result; ?>

  <form method="post" action="">
    <table>
      <tr><td>Email:</td> <td><input type="text" value="" name="email"></td></tr>
      <tr><td>Username:</td> <td><input type ="text" value="" name="username"></td></tr>
      <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
      <tr><td></td><td><input style="float: right;" type="submit" value="Sign In"></td></tr>
    </table>
  </form>


  <p><a href="index.php">Back</a></p>
</body>
</html>