<?php
  require_once "config.php";
  header('Content-Type: text/html; charset=utf-8');
  $mysqli=new mysqli($config['db']['ip'],$config['db']['dbuser'],$config['db']['dbpassword'],$config['db']['dbname']);
  $mysqli->query("SET NAMES 'utf 8'");
?>
