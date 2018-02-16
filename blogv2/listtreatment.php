<?php
ini_set('display_errors', 1);
session_start();
try
{
  $db = new PDO('mysql:host=localhost;dbname=kap;charset=utf8', 'root', 'root');
  $response = $db->query('SELECT * FROM article INNER JOIN user ON user_idauthor = idauthor ORDER BY idarticle DESC');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
};

include('list.php');
?>
