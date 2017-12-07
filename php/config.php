<?php
//Connect the DB
try
{

  $pdo = new PDO('mysql:host=localhost;dbname=pocket_vote', 'sizeablethink', '9qouSKVO758i');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}

?>