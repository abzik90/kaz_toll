<?php
$date=new DateTime();
$date=$date->getTimestamp();
$config=array(
    'db'=> array(
      'ip' => localhost,
      'dbname' => "kaztoll",
      'dbuser' => "root",
      'dbpassword' =>""
    )
,
    'url'=>"http://baha/",
    'dateUnix'=>$date
);

if(isset($_POST["exit"])){
  $_SESSION["email"]="";
  header('Location: '.$config["url"].'/login');
  exit;
}
?>
