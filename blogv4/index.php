<?php
// $url = $_SERVER['REQUEST_URI'];
// echo $url;
// echo $_GET['action'];

require('usercontroller.php');
require('articlecontroller.php');

session_start();

if (!isset($_GET['action'])) {
  login();
} else if ($_GET['action'] == 'list') {
  $response = listArticle();
} else if ($_GET['action'] == 'add') {
  addArticle();
} else if ($_GET['action'] == 'disconnect') {
  disconnect();
}
