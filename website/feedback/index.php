<?php
session_start();
require_once("../includes/dbconnect.php");
require_once("../includes/config.php");
require_once("../classes/post.php");


function insertion_Sort($postsModified){
  $count=count($postsModified);
  for($i=0;$i<$count;$i++){
    $temp = $postsModified[$i];
    $j = $i-1;
    while($j>=0 && $postsModified[$j]->datePublished > $temp->datePublished){
      $postsModified[$j+1] = $postsModified[$j];
      $j--;
    }
    $postsModified[$j+1] = $temp;
  }
return $postsModified;
}
$posts[]=new Post("","","","","","");
$feedQuery=$mysqli->query("SELECT feedback.link,feedback.text,feedback.author,feedback.date,users.email,users.firstname,users.surname FROM feedback,users  WHERE users.email=feedback.author");
if($feedQuery->num_rows == true){
  while($feedFetchData=$feedQuery->fetch_assoc()){
    $posts[$j]=new Post($feedFetchData["author"],$feedFetchData["firstname"],$feedFetchData["surname"],$feedFetchData["link"],$feedFetchData["text"],$feedFetchData["date"]);
    $j++;
  }

  $posts=insertion_Sort($posts);
}

if(isset($_POST["submitFeedback"])){
    $feedText=$_POST["feedText"];

    if (!empty($feedText)){

      if (isset($_FILES['feedFile']['name']) && $_FILES['feedFile']['name'] != null) {
        include "../includes/imgShort.php";
        if (move_uploaded_file($_FILES['feedFile']['tmp_name'], $target)) {
            rename($target, $targetCry);
            $mysqli->query("INSERT INTO feedback (`author`,`text`, `link`,`date`) VALUES ('".$_SESSION['email']."','".$feedText."', '".$targetCry."','".$config['dateUnix']."')");
          }
      }else{
            $mysqli->query("INSERT INTO feedback (`author`,`text`, `date`) VALUES ('".$_SESSION['email']."','".$feedText."', '".$config['dateUnix']."')");
      }
            echo "<script>window.location.href='../includes/backwards.php'</script>";
    }else{
      echo "<script>alert('Нужно заполнить текст перед отправкой');</script>";
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

    <title>KazTollApp</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/album.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body>

    <header>
      <div class="bg-dark collapse" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">О платформе</h4>
              <p class="text-muted">Платформа предназначена для оценивания работы организации "КазАвтоЖол"</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Обратная связь</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Facebook</a></li>
                <li><a href="#" class="text-white">Email</a></li>
              </ul>
              <div id="loginDiv">
              <?php if(!empty($_SESSION["email"])){?>
                <form method="post">
                  <h4 class="text-white" id="login">Выход</h4>
                  <ul class="list-unstyled">
                    <li><button class="btn btn-secondary btn-lg" name="exit" type="submit">Выйти из системы <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                      <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg></button></li>


                  </ul>
                </form>
              <?php }?>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="https://getbootstrap.com/docs/4.0/examples/album/#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-hexagon-half" viewBox="0 0 16 16">
              <path d="M14 4.577v6.846L8 15V1l6 3.577zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
            </svg>
            <strong>KazTollApp</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
        <form method="post" enctype="multipart/form-data">
          <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#demo">
            Оставить отзыв
          </button>

          <div id="demo" class="collapse in">
            <div class="form-group">
              <label for="textAreaFeed">Ваш отзыв</label>
              <textarea class="form-control" id="textAreaFeed" name="feedText" rows="3"></textarea>
            </div>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Прикрепить Фото
            </button><br><br>
            <button type="submit" name="submitFeedback" class="btn btn-primary">Опубликовать отзыв</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Прикрепить Фото</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="file-loading">
                      <input id="input-b9" name="feedFile" type="file" accept="image/*">
                    </div>
                    <div id="kartik-file-errors"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="deleteFile()">Отмена</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Сохранить</button>
                  </div>
                  <img id="imgOut" src=""></div>
                </div>

              </div>
            </div>

        </form>
          </div>
      </section>

    </main>
    <section class="jumbotron text-center">
      <?php for($i=0;$i<count($posts);$i++){
      //print_r($posts);?>
      <div class="container-fluid">
          <h3><?php echo $posts[$i]->name." ".$posts[$i]->surname;?></h3>
          <h5><?php echo $posts[$i]->author;?></h5>
          <p><?php echo $posts[$i]->text;?></p>
          <img width="100%" src="<?php echo $posts[$i]->link;?>"/><br>

        </div>
    <?php }?>
    </section>
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Жоғарыға</a>
        </p>
        <p class="mt-5 mb-3 text-muted text-center">©hikari 2021</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>
    <script src="../bootstrap/holder.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#input-b9").fileinput({
            showPreview: true,
            showUpload: true,
            elErrorContainer: '#kartik-file-errors',
            allowedFileExtensions: ["jpg", "png", "gif"]
            //uploadUrl: '/site/file-upload-single'
        });
    });
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#imgOut').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#input-b9").change(function() {
      readURL(this);
    });
    function deleteFile(){
      $("#input-b9").val("");
      $('#imgOut').attr('src', "");

    }
    </script>


<svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body></html>
<?php $mysqli->close();?>
