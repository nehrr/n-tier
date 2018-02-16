<?php
ini_set('display_errors', 1);
session_start();
try
{
  $db = new PDO('mysql:host=localhost;dbname=kap;charset=utf8', 'root', 'root');
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
      $query = "INSERT INTO article (title, content, datesent, user_idauthor) VALUES (:title, :content, :datesent, :user_idauthor)";
      $statement = $db->prepare($query);
      $statement->bindValue(':title', $_POST["title"]);
      $statement->bindValue(':content', $_POST["content"]);
      $statement->bindValue(':user_idauthor', $_SESSION["id"]);
      $statement->bindValue(':datesent', date('Ymd'));
      $statement->execute();
      header("location:listtreatment.php");
    }
  }
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
};

include('add.php');
?>
