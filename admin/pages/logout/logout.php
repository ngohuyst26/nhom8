<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['user']);
unset($_SESSION['pass']);
unset($_SESSION['email']);
unset( $_SESSION['role']);
unset( $_SESSION['role_edit']);
header("Location: /login/signin.php");
?>