<?php
ini_set('display_errors', 1);

session_start();
session_unset();
$message = 'You were disconnected';

include('disconnect.php');
?>
