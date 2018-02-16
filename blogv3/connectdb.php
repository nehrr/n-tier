<?php
ini_set('display_errors', 1);
session_start();

function connect() {
  try {
    $db = new PDO('mysql:host=localhost;dbname=kap;charset=utf8', 'root', 'root');
    $message = "";
    if(isset($_POST["submit"]))
    {
      if(empty($_POST["login"]) || empty($_POST["password"]))
      {
        $message = '<label>All fields are required</label>';
      }
      else
      {
        $query = "SELECT * FROM user WHERE nickname = :username AND password = :password";
        $statement = $db->prepare($query);
        $statement->execute(
          array(
            'username'     =>     $_POST["login"],
            'password'     =>     $_POST["password"]
          )
        );
        $count = $statement->rowCount();
        $id = $statement->fetchColumn(0);
        if($count > 0)
        {
          $_SESSION["username"] = $_POST["login"];
          $_SESSION["id"] = $id;
          header("location:listtreatment.php");
        }
        else
        {
          $message = '<label>Wrong Data</label>';
        }
      }
    }
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  };
}

?>
