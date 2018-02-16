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
      header("location:list.php");
    }
  }
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset=\"UTF-8\">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <title>Add</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="connect.php">Connect</a>
        <a class="nav-item nav-link" href="list.php">See all articles</a>
        <a class="nav-item nav-link" href="add.php">Add an article</a>
        <a class="nav-item nav-link" href="disconnect.php">Disconnect</a>
      </div>
    </div>
  </nav>

  <?php if (isset($_SESSION["username"])) { ?>

    <div class="container">

      <div class="row">
        <div class="col-1">
        </div>

        <div class="col-10">
          <div class="form-group">

            <form method="post" action="add.php">

              <label for="title">Title : </label><br />
              <input class="form-control" id="title" name="title" type="text" /><br />
              <textarea class="form-control" id="content" name="content" rows='4' cols='50'>Write your article here.</textarea><br />

              <input class="btn btn-primary" name="submit" type="submit" value="Send" />
            </form>

            <?php
            if(isset($message))
            {
              echo '<label class="text-danger">'.$message.'</label>';
            }
            ?>

          </div>

        <?php } else {
        echo '<label class="text-danger">'.$message.'</label>';
       } ?>

      </div>

      <div class="col-1">
      </div>
    </div>
  </div>

</body>

</html>
