<?php
include('listdb.php');
ini_set('display_errors', 1);

$response = listAll();

include('list.php');
?>
