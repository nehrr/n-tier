<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <title>List</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="connecttreatment.php">Connect</a>
        <a class="nav-item nav-link" href="listtreatment.php">See all articles</a>
        <a class="nav-item nav-link" href="addtreatment.php">Add an article</a>
        <a class="nav-item nav-link" href="disconnecttreatment.php">Disconnect</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">

      <div class="col-1">
      </div>

      <div class="col-10">
        <div class="list-group">

          <?php foreach ($response as $row): ?>
          <li class="list-group-item"><h2><?php echo $row['title']; ?></h2></li>
          <li class="list-group-item"><small>Posted by : </small><?php echo $row['nickname']; ?></li>
          <li class="list-group-item"><small>Posted on : </small><?php echo $row['datesent']; ?></li>
          <li class="list-group-item"><?php echo $row['content']; ?></li>
            <br />
          <?php endforeach; ?>

        </div>
      </div>

      <div class="col-1">
      </div>

    </div>
  </div>

  </body>
  </html>
