<?php
ini_set('display_errors', 1);
//session_start();

function add() {
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=kap;charset=utf8', 'root', 'root');
    $query = "INSERT INTO article (title, content, datesent, user_idauthor) VALUES (:title, :content, :datesent, :user_idauthor)";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $_POST["title"]);
    $statement->bindValue(':content', $_POST["content"]);
    $statement->bindValue(':user_idauthor', $_SESSION["id"]);
    $statement->bindValue(':datesent', date('Ymd'));
    $statement->execute();
    //header("location:listtreatment.php");

  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  };
}

function listAll() {
    $response = "";
    $db = new PDO('mysql:host=localhost;dbname=kap;charset=utf8', 'root', 'root');
    $res = $db->query('SELECT * FROM article INNER JOIN user ON user_idauthor = idauthor ORDER BY idarticle DESC');
    $response = $res->fetchAll();
    return $response;
};

?>
