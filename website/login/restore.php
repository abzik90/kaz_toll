<?php
  session_start();
  $userHash=$_GET['id'];
  require_once("../includes/dbconnect.php");
  require_once("../includes/config.php");
  require_once("../includes/cipher.php");

  $email=decryptMyEmail($userHash);
  $email=substr($email,5);

  if(isset($_POST['request'])){
    $email=$_POST['email'];

      $confirmationEmail=$mysqli->query("SELECT email FROM users WHERE email='".$email."' ");
      if($confirmationEmail->num_rows===1){
        require_once "../includes/email.php";
        echo "<script>alert('Ссылка восстановления отправлена на Email');window.location.href='./'</script>";
      }else{
        echo "<script>alert('Неправильный Email');</script>";
      }

  }

  if(isset($_POST['change'])){
    $newPass=$_POST['newPass'];
    $newPassConf=$_POST['newPassConf'];

    if($newPass===$newPassConf){
      $confirmationOld=$mysqli->query("SELECT email FROM users WHERE email='".$email."' ");
      if($confirmationOld->num_rows===1){
        while($confirmationTemp=$confirmationOld->fetch_assoc()){
          if($confirmationTemp!=null){
            $mysqli->query("UPDATE students SET password='".sha1($newPass)."' WHERE email='".$email."'");
          }else{
            $mysqli->query("UPDATE teachers SET password='".sha1($newPass)."' WHERE email='".$email."'");
          }
        }

        echo "<script>alert('Пароль успешно изменен');window.location.href='./'</script>";
      }else{
        echo "<script>alert('Неправильная ссылка');window.location.href='../'</script>";
      }
    }else{
      echo "<script>alert('Пароли не совпадают');</script>";
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

    <title>Восстановление пароля</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/floating-labels.css" rel="stylesheet">
  </head>

  <body>
  <?php if(empty($_GET["id"])){?>
    <form class="form-signin" method="post">
      <div class="text-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-hexagon-half" viewBox="0 0 16 16">
          <path d="M14 4.577v6.846L8 15V1l6 3.577zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
        </svg>
        <h1 class="h3 mb-3 font-weight-normal">KazTollApp</h1>
        <p>Форма восстановления пароля</p>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputEmail">Email пользователя</label>
      </div>

      <div class="form-label-group">
        <a href="./" style='font-size:80%;'>Перейти на страницу входа</a>
      </div>

      <button class="btn btn-lg btn-primary btn-block" name="request" type="submit">Изменить пароль</button>
      <p class="mt-5 mb-3 text-muted text-center">©hikari 2021</p>
    </form>
  <?php }else{?>
    <form class="form-signin" method="post">
      <div class="text-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-kanban" viewBox="0 0 16 16">
<path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h11zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11z"/>
<path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3z"/>
</svg>
        <h1 class="h3 mb-3 font-weight-normal">KazTollApp</h1>
        <p>Форма восстановления пароля</p>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" name="newPass" class="form-control" placeholder="Password" required="" autofocus="">
        <label for="inputPassword">Новый пароль</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputConfPassword" name="newPassConf" class="form-control" placeholder="Password" required="" autofocus="">
        <label for="inputConfPassword">Повторите новый пароль</label>
      </div>

      <div class="form-label-group">
        <a href="./" style='font-size:80%;'>Перейти в форму входа</a>
      </div>

      <button class="btn btn-lg btn-primary btn-block" name="change" type="submit">Құпия сөзді алмастыру</button>
      <p class="mt-5 mb-3 text-muted text-center">©hikari 2021</p>
    </form>
  <?php }?>
</body></html>
