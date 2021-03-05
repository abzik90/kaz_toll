<?php
  $image = $_FILES['feedFile']['name'];
  $target = "../feedbackPhotos/" . basename($image);
  $detectedType = substr(strrchr($image, '.'), 1);

  $author=$_SESSION['email'];
  $enc = sha1($author .'a'. $config['dateUnix']);
  $enc = $enc . "." . $detectedType;
  $targetCry = "../feedbackPhotos/" . $enc;
?>
