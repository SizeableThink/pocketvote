<?php
//Connect the DB
try
{

  $pdo = new PDO('mysql:host=localhost;dbname=pocketvote', 'root', 'Phoneix_87');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
  echo "Success";

}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}

?>