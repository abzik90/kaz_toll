<?php
session_start();
require_once("../includes/dbconnect.php");
require_once("../includes/config.php");

if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
  header('Location:'.$config["url"]);
  exit;
}

if(isset($_POST["regBtn"])){
    $surname=htmlspecialchars($_POST["surname"]);
    $firstName=htmlspecialchars($_POST["firstName"]);
    $email=htmlspecialchars($_POST["email"]);
    $driverID=htmlspecialchars($_POST["driverID"]);
    $password=sha1(htmlspecialchars($_POST["password"]));

    $confirmationQuery=$mysqli->query("SELECT email FROM users WHERE email='".$email."' ");

    if ($confirmationQuery->num_rows == 0){
          $mysqli->query("INSERT INTO users (`firstname`, `surname`, `email`,`driverid`,`password`,`date`) VALUES ('".$firstName."', '".$surname."','".$email."','".$driverID."', '".$password."','".$config['dateUnix']."')");
          echo "<script>window.location.href='../login/'</script>";
    }else{
      echo "<script>alert('Этот пользователь уже зарегестрирован');</script>";
    }

}

$mysqli->close();
?>
<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>Форма регистрации</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post">
      <div class="text-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-hexagon-half" viewBox="0 0 16 16">
          <path d="M14 4.577v6.846L8 15V1l6 3.577zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
        </svg>
        <h1 class="h3 mb-3 font-weight-normal">KazTollApp</h1>
        <p>Зарегестрируйтесь,чтобы воспользоваться услугами KazTollApp</p>
      </div>
      <div class="form-label-group">
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputEmail">Email</label>
      </div>
      <div class="form-label-group">
        <input type="text" name="surname" id="inputSurname" class="form-control" placeholder="Surname" required="" autofocus="">
        <label for="inputSurname">Фамилия</label>
      </div>
      <div class="form-label-group">
        <input type="text" name="firstName" id="inputName" class="form-control" placeholder="First Name" required="" autofocus="">
        <label for="inputName">Имя</label>
      </div>
      <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <label for="inputPassword">Пароль</label>
      </div>
      <div class="form-label-group">
        <input type="number" id="inputDriverID" name="driverID" class="form-control" placeholder="Driver ID" required="" autofocus="">
        <label for="inputDriverID">Номер водительских прав</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" name="regBtn" type="submit">Регистрация</button>
      <div class="form-label-group">
        <a href="../login">Уже есть аккаунт?</a>
      </div>
      <p class="mt-5 mb-3 text-muted text-center">©hikari 2021</p>
    </form>

</body></html>
