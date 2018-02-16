<?php
ini_set('display_errors', 1);
session_start();

function listAll() {
    $response = "";
    $db = new PDO('mysql:host=localhost;dbname=kap;charset=utf8', 'root', 'root');
    $res = $db->query('SELECT * FROM article INNER JOIN user ON user_idauthor = idauthor ORDER BY idarticle DESC');
    $response = $res->fetchAll();
    return $response;
};

?>
