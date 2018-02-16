<?php
ini_set('display_errors', 1);
session_start();

try
{
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
        header("location:list.php");
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

?>


<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <title>Connect</title>
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

<div class="container">
  <div class="row">

    <div class="col-1">
    </div>

    <div class="col-10">
      <div class="form-group">

        <form method="post">
          <label for="login">Login : </label><br />
          <input class="form-control" id="login"  name="login" type="text" /><br />
          <label for="password">Password : </label><br />
          <input class="form-control" id="password" name="password" type="password" /><br />
          <input class="btn btn-primary" name="submit" type="submit" value="Login" />
        </form>

        <?php
        if(isset($message))
        {
          echo '<label class="text-danger">'.$message.'</label>';
        }
        ?>

      </div>
    </div>

    <div class="col-1">
    </div>

  </div>
</div>


</body>
</html>
