<?php
include('adddb.php');
ini_set('display_errors', 1);

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
    add();
  }

}
include('add.php');
?>
