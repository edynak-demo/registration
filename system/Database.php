<?php 
// initialize variables to hold connection parameters
$username = 'root';
$dsn = 'mysql:host=localhost; dbname=registration';
$password = '';

try{
  // create an instance of the PDO class with the required parameters
  $db = new PDO($dsn, $username, $password);

  // set pdo error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //display success message
  // echo "Connected to your db";
}catch (PDOException $ex){
  // display error message
  echo "Connection to db failed".$ex->getMessage();
}
?>