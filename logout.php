<?php
session_start();
unset($_SESSION['mid']);
header('location:index.php');
?>
