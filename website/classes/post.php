<?php
class Post {
  public  $author;
  public  $name;
  public  $surname;
  public  $link;
  public  $text;
  public  $datePublished;

  public function __construct( $author, $name, $surname, $link, $text, $datePublished) {
      $this->author = $author;
      $this->name = $name;
      $this->surname = $surname;
      $this->link = $link;
      $this->text = $text;
      $this->datePublished = $datePublished;
  }
}

?>
