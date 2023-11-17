<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['user']);
unset($_SESSION['pass']);
unset($_SESSION['email']);
header("Location: /login/signin.php");
?>