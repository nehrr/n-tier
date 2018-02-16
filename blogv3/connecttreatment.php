<?php
include('connectdb.php');
ini_set('display_errors', 1);

  $message = "";
  if(isset($_POST["submit"]))
  {
    if(empty($_POST["login"]) || empty($_POST["password"]))
    {
      $message = '<label>All fields are required</label>';
    }
    else
    {
      connect();
    }
  };
include('connect.php');
?>
