<?php 

$username = 'root';
$dsn = 'mysql:host=localhost; dbname=registration';
$password = '';

try{
  $db = new PDO($dsn, $username, $password);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Connected to your db";
}catch (PDOException $ex){
  echo "Connection to db failed".$ex->getMessage();
}
?>