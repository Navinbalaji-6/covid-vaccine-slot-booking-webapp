<?php
session_start();
require('connection.php');
unset($_SESSION['user_id']);
unset($_SESSION['name']);

Redirect('index.php');
?>