<?php
  session_start();
  require "../conf.inc.php";
  require "functions.php";
  redirectIfNotConnected(); 

  $connection = connectDB();
  $queryPrepared = $connection->prepare("DELETE FROM ".DB_PREFIX."user WHERE id=:id");
  $queryPrepared->execute(["id"=>$_GET['id']]);


  header("Location: ../users.php");

?>