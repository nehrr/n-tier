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
        <a class="nav-item nav-link active" href="?action=connect">Connect</a>
        <a class="nav-item nav-link" href="?action=list">See all articles</a>
        <a class="nav-item nav-link" href="?action=add">Add an article</a>
        <a class="nav-item nav-link" href="?action=disconnect">Disconnect</a>
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

            <form action="" method="post">

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
