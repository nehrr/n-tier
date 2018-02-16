<?php
include('usermodel.php');
ini_set('display_errors', 1);

function login() {
  require('connect.php');
  $message = "";
  if(isset($_POST["submit"]))
  {
    if(empty($_POST["login"]) || empty($_POST["password"]))
    {
      return $message = '<label>All fields are required</label>';
    }
    else
    {
      connect();
    }
  }

};


function disconnect() {
  session_destroy();
  return $message = 'You were disconnected';
  require('disconnect.php');
};

?>
