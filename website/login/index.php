<?php
  session_start();
  require_once("../includes/dbconnect.php");
  require_once("../includes/config.php");

  if(!empty($_SESSION["email"])){
    header('Location:'.$config["url"].'/feedback');
    exit;
  }
  if(isset($_POST["submit"])){
    $email=htmlspecialchars($_POST["email"]);
    $password=sha1(htmlspecialchars($_POST["password"]));
    $authQuery=$mysqli->query("SELECT email,password FROM users WHERE email='".$email."' AND password='".$password."' ");
    if($authQuery->num_rows == 1){
      while($authData=$authQuery->fetch_assoc()){
        $_SESSION["email"]=$authData["email"];
      }
      echo "<script>window.location.href='../feedback';</script>";
    }else{
      echo "<script>alert('Email или пароль неверны');</script>";
    }
  }

?>
<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Войти в систему</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/floating-labels.css" rel="stylesheet">
    <style>
      .form-select{
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        height: 50px;
        margin-bottom: 0;
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
      }
    </style>
  </head>

  <body>
    <form method="post" class="form-signin">
      <div class="text-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-hexagon-half" viewBox="0 0 16 16">
          <path d="M14 4.577v6.846L8 15V1l6 3.577zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
        </svg>
        <h1 class="h3 mb-3 font-weight-normal">KazTollApp</h1>
        <p>Войдите в систему,чтобы воспользоваться услугами KazTollApp</p>
      </div>

      <div class="form-label-group">
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputEmail">Email</label>
      </div>



      <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
        <label for="inputPassword">Пароль</label>
      </div>

      <div class="form-label-group">
        <a href="./restore.php" style='font-size:80%;'>Забыли пароль?</a>
      </div>

      <div class="checkbox mb-3">
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Войти</button>
      <div class="form-label-group">
        <a href="../register">Создать новый аккаунт</a>
      </div>
      <p class="mt-5 mb-3 text-muted text-center">©hikari 2021</p>
    </form>


</body></html>
