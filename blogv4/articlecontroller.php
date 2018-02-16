<?php
include('articlemodel.php');
ini_set('display_errors', 1);

function addArticle() {
  require('add.php');
  $message = "";
  if(empty($_SESSION)) {
    $message = 'Please connect to add an article';
  }
  if(isset($_POST["submit"]))
  {
    if(empty($_POST["title"]) || empty($_POST["content"]))
    {
      $message = '<label>All fields are required</label>';
    }
    else
    {
      return add();
    }
  }
};

function listArticle() {
  require('list.php');
  $response = listAll();
  return $response;
};

?>
